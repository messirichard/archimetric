<?php

class AreaController extends ControllerAdmin
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
		$model=new TbArea;

		$modelImage = array();

		$model->parent_id = $_GET['parent'];

		if(isset($_POST['TbArea']))
		{
			$model->attributes=$_POST['TbArea'];

			$image = CUploadedFile::getInstance($model,'image');
			if ($image->name != '') {
				$model->image = substr(md5(time()),0,5).'-'.$image->name;
			}

			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					if ($image->name != '') {
						$image->saveAs(Yii::getPathOfAlias('webroot').'/images/area/'.$model->image);
					}

					$model->save();

					if (count($_FILES['TbAreaImage']['name']) > 0) {
						foreach ($_FILES['TbAreaImage']['name'] as $key => $value) {
							$modelImage = new TbAreaImage;
							$image = CUploadedFile::getInstance($modelImage,'['.$key.']image');
							if ($image->name != '') {
								$modelImage->image = substr(md5(time()),0,5).'-'.$image->name;
								$image->saveAs(Yii::getPathOfAlias('webroot').'/images/area/'.$modelImage->image);
								$modelImage->area_id = $model->id;
								$modelImage->save(false);
							}
							
						}
					}

					Log::createLog("TbAreaController Create $model->id");
					Yii::app()->user->setFlash('success','Data has been inserted');
				    $transaction->commit();
					$this->redirect(array('index','parent'=>$model->parent_id));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'modelImage'=>$modelImage,
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
		$modelImage = TbAreaImage::model()->findAll('area_id = :id ORDER BY id', array(':id'=>$model->id));

		if(isset($_POST['TbArea']))
		{
			$image = $model->image;//mengamankan nama file
			$model->attributes=$_POST['TbArea'];
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
						$image->saveAs(Yii::getPathOfAlias('webroot').'/images/area/'.$model->image);
					}
					$model->save();

					TbAreaImage::model()->deleteAll('area_id = :id', array(':id'=>$model->id));
					if (count($_POST['TbAreaImage2']) > 0) {
						foreach ($_POST['TbAreaImage2'] as $key => $value) {
							$modelImage = new TbAreaImage;
							if ($value != '') {
								$modelImage->area_id = $model->id;
								$modelImage->image = $value;
								$modelImage->save(false);
							}
							
						}
					}
					if (count($_FILES['TbAreaImage']['name']) > 0) {
						foreach ($_FILES['TbAreaImage']['name'] as $key => $value) {
							$modelImage = new TbAreaImage;
							$image = CUploadedFile::getInstance($modelImage,'['.$key.']image');
							if ($image->name != '') {
								$modelImage->image = substr(md5(time()),0,5).'-'.$image->name;
								$image->saveAs(Yii::getPathOfAlias('webroot').'/images/area/'.$modelImage->image);
								$modelImage->area_id = $model->id;
								$modelImage->save(false);
							}
							
						}
					}

					Log::createLog("TbAreaController Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id,'parent'=>$model->parent_id));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'modelImage'=>$modelImage,
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
		$data->delete();

		$this->redirect(array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new TbArea('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TbArea']))
			$model->attributes=$_GET['TbArea'];
		$model->parent_id=($_GET['parent']=='')?'0':$_GET['parent'];

		$dataProvider=new CActiveDataProvider('TbArea');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
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
		$model=TbArea::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='category-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
