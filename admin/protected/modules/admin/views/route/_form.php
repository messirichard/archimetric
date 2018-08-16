<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="widget">
<h4 class="widgettitle">Data Route of Shippings</h4>
<div class="widgetcontent">

	<?php echo $form->textFieldRow($model,'kapal_motor',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'grt',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'location',array('class'=>'span5','maxlength'=>100)); ?>
	<?php echo $form->dropDownListRow($model, 'aktif', array(
		'1'=>'Active',
		'0'=>'Non Active',
	)); ?>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->isNewRecord ? 'Create' : 'Save',
	)); ?>

</div>
</div>
<div class="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Warning!</strong> Fields with <span class="required">*</span> are required.
</div>

<?php $this->endWidget(); ?>
