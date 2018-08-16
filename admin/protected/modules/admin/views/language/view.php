<?php
$this->breadcrumbs=array(
	'Languages'=>array('index'),
	// $model->name=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-language',
	'title'=>'Language',
	'subtitle'=>'Edit Language '.$model->name,
);

$this->menu=array(
	array('label'=>'List Language', 'icon'=>'th-list','url'=>array('index')),
	// array('label'=>'Add Language', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Language', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'language-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>

<div class="widget">
<h4 class="widgettitle">Edit Word</h4>
<div class="widgetcontent">
	<?php if(Yii::app()->user->hasFlash('success')): ?>
	
	    <?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'alerts'=>array('success'),
	    )); ?>
	
	<?php endif; ?>
	<?php
	$criteria = new CDbCriteria;
	$criteria->addCondition('category = :category');
	$criteria->params[':category'] = 'frontend';
	?>
	<?php foreach ($languageText as $key => $value): ?>
		<label><?php echo $value->name ?></label>
		<?php echo CHtml::textField('LanguageText['.$value->name.']', $value->value, array('class'=>'input-block-level')); ?>
		<div class="divider10"></div>
	<?php endforeach ?>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Save',
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		// 'buttonType'=>'submit',
		// 'type'=>'info',
		'url'=>CHtml::normalizeUrl(array('index')),
		'label'=>'Batal',
	)); ?>

</div>
</div>
<div class="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Warning!</strong> Fields with <span class="required">*</span> are required.
</div>

<?php $this->endWidget(); ?>
