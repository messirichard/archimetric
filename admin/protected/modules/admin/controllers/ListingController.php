<?php

class ListingController extends ControllerAdmin
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layoutsAdmin/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			//'accessControl', // perform access control for CRUD operations
			array('admin.filter.AuthFilter'),
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			(!Yii::app()->user->isGuest)?
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete','index','view','create','update'),
				'users'=>array(Yii::app()->user->name),
			):array(),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Listing;

		$modelImage = array();
		$modelArsip = array();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Listing']))
		{
			$model->attributes=$_POST['Listing'];

			$image = CUploadedFile::getInstance($model,'image');
			$model->image = substr(md5(time()),0,5).'-'.$image->name;

			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$image->saveAs(Yii::getPathOfAlias('webroot').'/images/listing/'.$model->image);

					$model->input_date = date("Y-m-d H:i:s");
					$model->input_admin = Yii::app()->user->name;
					$model->save();

					// save tag
					$tag = explode(',', $_POST['Listing']['tag']);
					foreach ($tag as $key => $value) {
						$modelTag = new ListingTag;
						$modelTag->listing_id = $model->id;
						$modelTag->tag = $value;
						$modelTag->save();
					}

					// save data arsip
					ListingArsip::model()->deleteAll('listing_id = :id', array(':id'=>$model->id));
					if (count($_POST['ListingArsip2']['arsip']) > 0) {
						foreach ($_POST['ListingArsip2']['arsip'] as $key => $value) {
							$modelArsip = new ListingArsip;
							if ($value != '') {
								$modelArsip->listing_id = $model->id;
								$modelArsip->arsip = $value;
								$modelArsip->title = $_POST['ListingArsip2']['title'][$key];
								$modelArsip->save(false);
							}
							
						}
					}
					if (count($_FILES['ListingArsip']['name']['arsip']) > 0) {
						foreach ($_FILES['ListingArsip']['name']['arsip'] as $key => $value) {
							$modelArsip = new ListingArsip;
							$arsip = CUploadedFile::getInstance($modelArsip,'[arsip]'.$key.'');
							if ($arsip->name != '') {
								$modelArsip->arsip = substr(md5(time()),0,5).'-'.$arsip->name;
								$arsip->saveAs(Yii::getPathOfAlias('webroot').'/images/listing_arsip/'.$modelArsip->arsip);
								$modelArsip->listing_id = $model->id;
								$modelArsip->title = $_POST['ListingArsip']['title'][$key];
								$modelArsip->save(false);
							}
							
						}
					}

					if (count($_FILES['ListingGallery']['name']) > 0) {
						foreach ($_FILES['ListingGallery']['name'] as $key => $value) {
							$modelImage = new ListingGallery;
							$image = CUploadedFile::getInstance($modelImage,'['.$key.']image');
							if ($image->name != '') {
								$modelImage->image = substr(md5(time()),0,5).'-'.$image->name;
								$image->saveAs(Yii::getPathOfAlias('webroot').'/images/listing/'.$modelImage->image);
								$modelImage->listing_id = $model->id;
								$modelImage->save(false);
							}
							
						}
					}

					Log::createLog("Listing Controller Create $model->id");
					Yii::app()->user->setFlash('success','Data has been inserted');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id));
				}
				catch(Exception $ce)
				{
					echo $ce;
					exit;
				    $transaction->rollback();
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'modelImage'=>$modelImage,
			'modelArsip'=>$modelArsip,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$modelImage = array();
		$modelImage = ListingGallery::model()->findAll('listing_id = :id ORDER BY id', array(':id'=>$model->id));

		if(isset($_POST['Listing']))
		{
			$image = $model->image;//mengamankan nama file
			$model->attributes=$_POST['Listing'];
			$model->image = $image;//mengembalikan nama file

			$image = CUploadedFile::getInstance($model,'image');
			if ($image->name != '') {
				$model->image = substr(md5(time()),0,5).'-'.$image->name;
			}

			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					if ($image->name != '') {
						$image->saveAs(Yii::getPathOfAlias('webroot').'/images/listing/'.$model->image);
					}

					$model->input_date = date("Y-m-d H:i:s");
					$model->save();

					ListingGallery::model()->deleteAll('listing_id = :id', array(':id'=>$model->id));
					if (count($_POST['ListingGallery2']) > 0) {
						foreach ($_POST['ListingGallery2'] as $key => $value) {
							$modelImage = new ListingGallery;
							if ($value != '') {
								$modelImage->listing_id = $model->id;
								$modelImage->image = $value;
								$modelImage->save(false);
							}
							
						}
					}
					if (count($_FILES['ListingGallery']['name']) > 0) {
						foreach ($_FILES['ListingGallery']['name'] as $key => $value) {
							$modelImage = new ListingGallery;
							$image = CUploadedFile::getInstance($modelImage,'['.$key.']image');
							if ($image->name != '') {
								$modelImage->image = substr(md5(time()),0,5).'-'.$image->name;
								$image->saveAs(Yii::getPathOfAlias('webroot').'/images/listing/'.$modelImage->image);
								$modelImage->listing_id = $model->id;
								$modelImage->save(false);
							}
							
						}
					}

					// save tag
					ListingTag::model()->deleteAll('listing_id = :listing_id', array(':listing_id'=>$model->id));
					$tag = explode(',', $_POST['Listing']['tag']);
					foreach ($tag as $key => $value) {
						$modelTag = new ListingTag;
						$modelTag->listing_id = $model->id;
						$modelTag->tag = $value;
						$modelTag->save();
					}

					// save data arsip
					ListingArsip::model()->deleteAll('listing_id = :id', array(':id'=>$model->id));
					if (count($_POST['ListingArsip2']['arsip']) > 0) {
						foreach ($_POST['ListingArsip2']['arsip'] as $key => $value) {
							$modelArsip = new ListingArsip;
							if ($value != '') {
								$modelArsip->listing_id = $model->id;
								$modelArsip->arsip = $value;
								$modelArsip->title = $_POST['ListingArsip2']['title'][$key];
								$modelArsip->save(false);
							}
							
						}
					}
					if (count($_FILES['ListingArsip']['name']['arsip']) > 0) {
						foreach ($_FILES['ListingArsip']['name']['arsip'] as $key => $value) {
							$modelArsip = new ListingArsip;
							$arsip = CUploadedFile::getInstance($modelArsip,'[arsip]'.$key.'');
							if ($arsip->name != '') {
								$modelArsip->arsip = substr(md5(time()),0,5).'-'.$arsip->name;
								$arsip->saveAs(Yii::getPathOfAlias('webroot').'/images/listing_arsip/'.$modelArsip->arsip);
								$modelArsip->listing_id = $model->id;
								$modelArsip->title = $_POST['ListingArsip']['title'][$key];
								$modelArsip->save(false);
							}
							
						}
					}

					Log::createLog("ListingController Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$model->tag = Listing::model()->getTagList($model->id);

		$modelArsip = ListingArsip::model()->findAll('listing_id = :listing_id', array(':listing_id'=>$model->id));

		$this->render('update',array(
			'model'=>$model,
			'modelImage'=>$modelImage,
			'modelArsip'=>$modelArsip,
		));
	}

	public function actionUpload($type = 'edit')
	{
	    $session = Yii::app()->session;
	    $session->open();

		// menyiapkan directory
		$dir = Yii::getPathOfAlias('webroot').'/images/listing/';
		// if ( ! is_dir($dir)) {
		// 	mkdir($dir, 0755, true);
		// }
		$sessionVariabel = 'upload_foto';
		if ($type == 'update') {
			$type = 'edit';
			$sessionVariabel = 'upload_foto_edit';
		}
		if ($type == 'edit') {
		
			$_FILES['upload_foto']['type'] = strtolower($_FILES['upload_foto']['type']);

			// cek file type
			if (
			   $_FILES['upload_foto']['type'] == 'image/jpg'
			|| $_FILES['upload_foto']['type'] == 'image/jpeg'
			|| $_FILES['upload_foto']['type'] == 'image/pjpeg')
			{
			    // setting file's mysterious name
			    $file = substr(md5(date('YmdHis').rand(0,10000000000000)), 0, 10).$_FILES['upload_foto']['name'];

			    // copying
			    move_uploaded_file($_FILES['upload_foto']['tmp_name'], $dir.$file);

			    // Simpan di session
			    $sessionData = $session[$sessionVariabel];

			    $sessionData[$_POST['upload_foto_urutan']] = $file;

			    // $session['upload_foto'] = $sessionData;
			    $session->add($sessionVariabel, $sessionData);


			    // displaying file
			    $array = array(
			    	'status'=>'success',
			        'thumb' => Yii::app()->baseUrl.ImageHelper::thumb(100,100, '/images/listing/'.$file , array('method' => 'adaptiveResize', 'quality' => '90')),
			        'name' => $file,
			        'urutan' => $_POST['upload_foto_urutan'],
			    );

			}else{
			    $array = array(
			    	'status'=>'error',
			        'msg' => 'File harus berxtensi JPG',
			    );
			}
			// $session->close();

	    	echo json_encode($array);

		} else {
		    $sessionData = $session['upload_foto'];
		    unlink($dir.$sessionData[$_POST['id']]);
		    $sessionData[$_POST['id']] = '';

		    // $session['upload_foto'] = $sessionData;
		    $session->add('upload_foto', $sessionData);
		}

	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		// we only allow deletion via POST request
		$data = $this->loadModel($id);
		$data->delete();


		$this->redirect(array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Listing('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Listing'])){
			$model->attributes=$_GET['Listing'];
		}
		$model->status = 1;
		if ($this->login_member['group_id'] != 8) {
			$model->input_admin = Yii::app()->user->name;
		}

		$model2=new Listing2('search');
		$model2->unsetAttributes();  // clear any default values
		if(isset($_GET['Listing2'])){
			$model2->attributes=$_GET['Listing2'];
		}
		$model2->status = 0;
		if ($this->login_member['group_id'] != 8) {
			$model2->input_admin = Yii::app()->user->name;
		}

		$this->render('index',array(
			'model'=>$model,
			'model2'=>$model2,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Listing::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='listing-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
