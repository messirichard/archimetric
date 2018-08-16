<?php

class ProfileController extends Controller
{

	public function filters()
	{
		return array(
			// 'accessControl', // perform access control for CRUD operations
			//array('auth.filters.AuthFilter'),
		);
	}

	// public function accessRules()
	// {
	// 	return array(
	// 		array('allow',  // deny all users
	// 			'actions'=>array('login', 'facebook', 'facebooktoken', 'registerbusiness'),
	// 			'users'=>array('*'),
	// 		),
	// 		(!Yii::app()->user->isGuest)?
	// 		array('allow', // allow admin user to perform 'admin' and 'delete' actions
	// 			'actions'=>array('index', 'logout', 'vieworder'),
	// 			'users'=>array(Yii::app()->user->name),
	// 		): array(),
	// 		array('deny',  // deny all users
	// 			'users'=>array('*'),
	// 		),
	// 	);
	// }

	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}	

	public function actionIndex()
	{
		$modelUser = MeMember::model()->find('email = :email', array(':email'=>MeMember::model()->getEmail()));

		$this->render('dashboard', array(
			// 'order'=>$order,
			'model'=>$modelUser,
			// 'modelDelivery'=>$modelDelivery,
		));
	}

	public function actionLogin(){

		$model = new MeMember;
		$modelLogin = new LoginForm2;

		if(isset($_POST['LoginForm2']))
		{
			$modelLogin->attributes=$_POST['LoginForm2'];
			// validate user input and redirect to the previous page if valid
			if($modelLogin->validate()){
				$session = new CHttpSession;
				$session->open();
				$data = MeMember::model()->find('email = :email', array(':email' => $modelLogin->username));
				$session['login_member3'] = $data->attributes;
			    if ($_GET['ret']) {
					$this->redirect($_GET['ret']);
			    }else{
					$this->redirect(array('index'));
			    }
			}
		}
		if(isset($_POST['MeMember']))
		{
			$model->attributes=$_POST['MeMember'];
			if ($model->tahun_lahir != '' AND $model->bln_lahir != '' AND $model->hari_lahir != '') {
				$model->tgl_lahir = $model->tahun_lahir.'-'.$model->bln_lahir.'-'.$model->hari_lahir;
			}
			// validate user input and redirect to the previous page if valid
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$pass = $model->pass;
					$model->pass = sha1($model->pass);
					$model->passconf = sha1($model->passconf);
					$model->save();

					$transaction->commit();

					MeMember::model()->login($model->email);
					
				    if ($_GET['ret']) {
						$this->redirect($_GET['ret']);
				    }else{
						$this->redirect(array('index'));
				    }
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('login_design', array(
			'model'=>$model,
			'modelLogin'=>$modelLogin,
		));	
	}

	public function actionRegisterbusiness()
	{
		if (MeMember::model()->isGuest())
			$this->redirect(array('login'));

		$model = new Listing;
		$model->scenario = 'register';

		if(isset($_POST['Listing']))
		{
			$model->attributes=$_POST['Listing'];
			// $model->kota = 'surabaya';

			$image = CUploadedFile::getInstance($model,'image');
			$model->image = substr(md5(time()),0,5).'-'.$image->name;

			$siup = CUploadedFile::getInstance($model,'siup');
			$model->siup = substr(md5(time()),0,5).'-'.$siup->name;

			$model->slug = Slug::create($model->area_id.' '.$model->nama_listing);

			// validate user input and redirect to the previous page if valid
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
			
					$image->saveAs(Yii::getPathOfAlias('webroot').'/images/listing/'.$model->image);

					$siup->saveAs(Yii::getPathOfAlias('webroot').'/images/siup/'.$model->siup);

					$model->member_id = MeMember::model()->getId();
					$model->save();

					$model->save();
					$transaction->commit();
					
					Yii::app()->user->setFlash('success','Registrasi sikses silahkan login');

					$this->redirect(array('index'));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('register_business', array(
			'model'=>$model, 
		));
	}

	public function actionLogout()
	{
		$session = new CHttpSession;
		$session->open();
		unset($session['login_member3']);
		$this->redirect(array('/main/index'));
	}
	
	public function actionDaftarusaha()
	{
		$modelUser = MeMember::model()->find('email = :email', array(':email'=>MeMember::model()->getEmail()));

		$this->render('df_usaha', array(
			// 'order'=>$order,
			'model'=>$modelUser,
			// 'modelDelivery'=>$modelDelivery,
		));
	}

	public function actionKontribusi()
	{
		$modelMall = JbJobs::model()->findAll('area_id != "0"');
		$modelJenis = JbJobs::model()->findAll('jenis_usaha_id != "0"');
		$this->render('kontribusi', array(
			'modelMall'=>$modelMall,
			'modelJenis'=>$modelJenis,
		));
	}

	public function actionkontribusiPost()
	{
		$model = JbJobsListing::model()->findAll('jobs_id = :jobs_id AND status = "0"', array(':jobs_id'=>$_GET['id']));
		$this->render('kontribusiPost', array(
			'model'=>$model,
		));
	}

	public function actionKontribusiTambah()
	{
		$model=new JbJobsListing;

		$modelImage = array();

		if(isset($_POST['JbJobsListing']))
		{
			$model->attributes=$_POST['JbJobsListing'];

			$image = CUploadedFile::getInstance($model,'image');
			$model->image = substr(md5(time()),0,5).'-'.$image->name;

			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$image->saveAs(Yii::getPathOfAlias('webroot').'/images/listing/'.$model->image);

					$model->input_date = date("Y-m-d H:i:s");
					$model->jobs_id = $_GET['id'];
					$model->input_member_id = MeMember::model()->getId();
					$model->save();

					// save tag
					$tag = explode(',', $_POST['JbJobsListing']['tag']);
					foreach ($tag as $key => $value) {
						$modelTag = new JbJobsListingTag;
						$modelTag->listing_id = $model->id;
						$modelTag->tag = $value;
						$modelTag->save();
					}

					if (count($_FILES['JbJobsListingGallery']['name']) > 0) {
						foreach ($_FILES['JbJobsListingGallery']['name'] as $key => $value) {
							$modelImage = new JbJobsListingGallery;
							$image = CUploadedFile::getInstance($modelImage,'['.$key.']image');
							if ($image->name != '') {
								$modelImage->image = substr(md5(time()),0,5).'-'.$image->name;
								$image->saveAs(Yii::getPathOfAlias('webroot').'/images/listing/'.$modelImage->image);
								$modelImage->listing_id = $model->id;
								$modelImage->save(false);
							}
							
						}
					}

					// Log::createLog("JbJobsListing Controller Create $model->id");
					Yii::app()->user->setFlash('success','Listing anda telah di simpan, kami akan cek untuk mempublikasikannya');
				    $transaction->commit();
					$this->refresh();
				}
				catch(Exception $ce)
				{
					echo $ce;
					exit;
				    $transaction->rollback();
				}
			}
		}
		if ($_GET['area'] != '') {
			$model->area_id = $_GET['area'];
		}
		if ($_GET['jenis'] != '') {
			$model->jenis_usaha_id = $_GET['jenis'];
		}

		$this->render('kontribusiTambah',array(
			'model'=>$model,
			'modelImage'=>$modelImage,
		));
	}

	public function actionAccountinfo()
	{
		$modelUser = MeMember::model()->findByPk(MeMember::model()->getId());

		$modelUser->scenario = 'editMember';

		if(isset($_POST['MeMember']))
		{
			$pass = $modelUser->pass;
			$modelUser->attributes = $_POST['MeMember'];
			if ($modelUser->passold != '') {
				$modelUser->scenario = 'editPass';
			}

			if ($modelUser->tahun_lahir != '' AND $modelUser->bln_lahir != '' AND $modelUser->hari_lahir != '') {
				$modelUser->tgl_lahir = $modelUser->tahun_lahir.'-'.$modelUser->bln_lahir.'-'.$modelUser->hari_lahir;
			}

			if ($modelUser->validate()) {
				$transaction=$modelUser->dbConnection->beginTransaction();
				try
				{
					if ($modelUser->scenario == 'editPass') {
						$modelUser->pass = sha1($modelUser->pass);
						$modelUser->passconf = sha1($modelUser->passconf);
					}else{
						$modelUser->pass = $pass;
					}
					$modelUser->save();

					$transaction->commit();

					Yii::app()->user->setFlash('success','Data user updated');

					$this->redirect('accountinfo');
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}

			}
				
		}

		$modelUser->pass = '';
		$modelUser->tahun_lahir = date("Y", strtotime($modelUser->tgl_lahir));
		$modelUser->bln_lahir = date("n", strtotime($modelUser->tgl_lahir));
		$modelUser->hari_lahir = date("j", strtotime($modelUser->tgl_lahir));

		$this->render('account_info', array(
			// 'order'=>$order,
			'model'=>$modelUser,
			// 'modelDelivery'=>$modelDelivery,
		));
	}
	public function actionChangepass()
	{
		$modelUser = MeMember::model()->findByPk(MeMember::model()->getId());

		if(isset($_POST['MeMember']))
		{
			$pass = $modelUser->pass;
			$modelUser->attributes = $_POST['MeMember'];
			if ($modelUser->passold != '') {
				$modelUser->scenario = 'editPass';
			}

			if ($modelUser->validate()) {
				if ($pass == sha1($modelUser->passold)) {
					$transaction=$modelUser->dbConnection->beginTransaction();
					try
					{
						if ($modelUser->scenario == 'editPass') {
							$modelUser->pass = sha1($modelUser->pass);
							$modelUser->passconf = sha1($modelUser->passconf);
						}else{
							$modelUser->pass = $pass;
						}
						$modelUser->save();

						$transaction->commit();

						Yii::app()->user->setFlash('success','Data user updated');

						$this->refresh();
					}
					catch(Exception $ce)
					{
					    $transaction->rollback();
					}
				} else {
					$modelUser->addError('passold','Incorrect password.');
				}
			}
				
		}

		$modelUser->pass = '';

		$this->render('changepass', array(
			'model'=>$modelUser,
		));
	}

}