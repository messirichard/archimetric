<?php

class LanguageController extends ControllerAdmin
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
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{

		$model = $this->loadModel($id);
		
		$criteria = new CDbCriteria;
		$criteria->addCondition('category = :category');
		$criteria->params[':category'] = 'frontend';
		$ttText = TtText::model()->findAll();
		foreach ($ttText as $key => $value) {
			$languageText = LanguageText::model()->find('language_id = :language_id AND name = :name', array(':language_id'=>$id, ':name'=>$value->message));
			if ($languageText == null) {
				$modelLanguageText = new LanguageText;
				$modelLanguageText->language_id = $id;
				$modelLanguageText->name = $value->message;
				$modelLanguageText->value = $value->message;
				$modelLanguageText->save();
			}
		}
		$languageText = LanguageText::model()->findAll('language_id = :language_id', array(':language_id'=>$id));
		if(isset($_POST['LanguageText']))
		{
			foreach ($_POST['LanguageText'] as $key => $value) {
				$criteria = new CDbCriteria;
				$criteria->addCondition('language_id = :language_id');
				$criteria->addCondition('name = :name');
				$criteria->params[':language_id'] = $id;
				$criteria->params[':name'] = $key;
				$language = LanguageText::model()->find($criteria);
				$language->value = $value;
				$language->save();
			}
			$criteria = new CDbCriteria;
			$criteria->addCondition('language_id = :language_id');
			$criteria->params[':language_id'] = $id;
			$language = LanguageText::model()->findAll($criteria);
$str = '<?php
return array(
';
			foreach ($language as $key => $value) {
$name = str_replace('"', '\"', $value->name);
$v = str_replace('"', '\"', $value->value);
$str .= '"'.$name.'"=>"'.$v.'",
';
			}
$str .= ');';
			$cfile = Yii::app()->file->set(Yii::getPathOfAlias('webroot').'/protected/messages/'.$model->code.'/frontend.php');
			if ( ! $cfile->getIsFile()) {
				$cfile->create();
			}
			$cfile->setContents($str);
			Yii::app()->user->setFlash('success','Data has been updated');
			$this->refresh();
		}
		$this->render('view',array(
			'model'=>$model,
			'languageText'=>$languageText,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Language;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Language']))
		{
			$model->attributes=$_POST['Language'];
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$model->save();
					Log::createLog("LanguageController Create $model->id");
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
		$this->performAjaxValidation($model);

		if(isset($_POST['Language']))
		{
			$model->attributes=$_POST['Language'];
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$model->save();
					Log::createLog("LanguageController Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('index'));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Language('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Language']))
			$model->attributes=$_GET['Language'];

		$dataProvider=new CActiveDataProvider('Language');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Language('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Language']))
			$model->attributes=$_GET['Language'];

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
		$model=Language::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='language-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
