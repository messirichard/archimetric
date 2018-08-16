<?php

class RouteController extends ControllerAdmin
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
			array('admin.filter.AuthFilter', 'params'=>array(
				'actionAllowOnLogin'=>array('edit'),
			)),
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
				'actions'=>array('admin','delete','index','view','create','update'),
				'users'=>array(Yii::app()->user->name),
			): array(),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Route;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Route']))
		{
			$model->attributes=$_POST['Route'];

			// $image = CUploadedFile::getInstance($model,'image');
			// if ($image->name != '') {
			// 	$model->image = substr(md5(time()),0,5).'-'.$image->name;
			// }

			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{


					// if ($image->name != '') {
					// 	$image->saveAs(Yii::getPathOfAlias('webroot').'/images/user/'.$model->image);
					// }

					$model->save();
					Log::createLog("GroupController Create $model->id");
					Yii::app()->user->setFlash('success','Data has been inserted');
				    $transaction->commit();
					$this->redirect(array('index'));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['Route']))
		{
			$model->attributes=$_POST['Route'];

			// $image = CUploadedFile::getInstance($model,'image');
			// if ($image->name != '') {
			// 	$model->image = substr(md5(time()),0,5).'-'.$image->name;
			// }

			if ($model->validate()) {

				// if ($image->name != '') {
				// 	$image->saveAs(Yii::getPathOfAlias('webroot').'/images/user/'.$model->image);
				// }

				$model->save();
				Yii::app()->user->setFlash('success',Tt::t('admin', 'Data Edited'));
				Log::createLog("Route Update $model->id");
				$this->redirect(array('index'));
			}
		}
		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionEdit()
	{
		$model=Route::model()->find('email = :email', array(':email'=>Yii::app()->user->id));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->scenario = 'updatepass';
		if(isset($_POST['Route']))
		{
			$pass = $model->pass;
			$model->attributes=$_POST['Route'];
			// $model->pass = $pass;
			if ($model->validate()) {
				//cek password lama
				if (sha1($_POST['Route']['passold'])==$pass AND $_POST['Route']['pass']==$_POST['Route']['passconf']) {
					$model->pass = sha1($_POST['Route']['pass']);
					$model->save();
					Log::createLog("Route Update Pass $model->id $model->email");
					$this->redirect(array('edit'));
				} else {
					$model->addError('pass','Incorrect password.');
				}
			}
		}
		$model->pass = '';
		$this->render('edit',array(
			'model'=>$model,
		));
	}

	public function actionAccess($id)
	{
		$model=$this->loadModel($id);
		$model2=new AuthRole;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$auth=Yii::app()->authManager;
		if(isset($_POST['AuthRole']))
		{
			$model2->attributes=$_POST['AuthRole'];
			if ($model2->validate()) {
				$dataAuth = $auth->getAuthItems('2', $model->user);
				foreach ($dataAuth as $key => $value) {
					$auth->revoke($value->name, $model->user);
				}
				$auth->assign($model2->name, $model->user);
				Log::createLog("Route Update Access $model->id $model->user");
				$this->redirect(array('access','id'=>$model->id));
			}
		}
		$dataAuth = $auth->getAuthItems('2', $model->user);
		$model2->name = $dataAuth[0];
		foreach ($dataAuth as $key => $value) {
			$model2->name =  $value->name;
		}
		$this->render('access',array(
			'model'=>$model,
			'model2'=>$model2,
		));
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		// if(Yii::app()->request->isPostRequest)
		// {
			// we only allow deletion via POST request
			$data = $this->loadModel($id);
			Log::createLog("Route Delete $data->id");
			$data->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			// if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		// }
		// else
		// 	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Route('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Route']))
			$model->attributes=$_GET['Route'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Route('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Route']))
			$model->attributes=$_GET['Route'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Route::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
