<?php

class KatalogController extends ControllerAdmin
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
			// array('admin.filter.AuthFilter', 'params'=>array(
			// 	'actionAllowOnLogin'=>array('edit'),
			// )),
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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Katalog;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Katalog']))
		{
			$model->attributes=$_POST['Katalog'];

			$image = CUploadedFile::getInstance($model,'image');
			$model->image = substr(md5(time()),0,5).'-'.$image->name;

			$pdf = CUploadedFile::getInstance($model,'pdf');
			$model->pdf = substr(md5(time()),0,5).'-'.$pdf->name;

			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$image->saveAs(Yii::getPathOfAlias('webroot').'/images/katalog/'.$model->image);
					$pdf->saveAs(Yii::getPathOfAlias('webroot').'/images/katalog/'.$model->pdf);

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

		if(isset($_POST['Katalog']))
		{
			$image = $model->image;//mengamankan nama file
			$pdf = $model->pdf;//mengamankan nama file
			$model->attributes=$_POST['Katalog'];
			$model->image = $image;//mengembalikan nama file
			$model->pdf = $pdf;//mengembalikan nama file

			$image = CUploadedFile::getInstance($model,'image');
			if ($image->name != '') {
				$model->image = substr(md5(time()),0,5).'-'.$image->name;
			}
			$pdf = CUploadedFile::getInstance($model,'pdf');
			if ($pdf->name != '') {
				$model->pdf = substr(md5(time()),0,5).'-'.$pdf->name;
			}

			if ($model->validate()) {

				if ($image->name != '') {
					$image->saveAs(Yii::getPathOfAlias('webroot').'/images/katalog/'.$model->image);
				}
				if ($pdf->name != '') {
					$pdf->saveAs(Yii::getPathOfAlias('webroot').'/images/katalog/'.$model->pdf);
				}

				$model->save();
				Log::createLog("Katalog Update $model->id $model->nama");
					Yii::app()->user->setFlash('success','Data telah terupdate');
				$this->redirect(array('index'));
			}
		}
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
			$data = $this->loadModel($id);
			unlink(Yii::getPathOfAlias('webroot').'/images/katalog/'.$data->pdf);
			unlink(Yii::getPathOfAlias('webroot').'/images/katalog/'.$data->image);
			Log::createLog("Jenis Usaha Delete $data->nama $data->id");
			$data->delete();
			$this->redirect(array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Katalog('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Katalog']))
			$model->attributes=$_GET['Katalog'];

		$this->render('index',array(
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
		$model=Katalog::model()->findByPk($id);
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
