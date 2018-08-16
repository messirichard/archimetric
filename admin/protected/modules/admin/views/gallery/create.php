<?php
$this->breadcrumbs=array(
	'Project'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-tag',
	'title'=>'Project',
	'subtitle'=>'Data Project',
);

$this->menu=array(
	array('label'=>'List Project', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDesc'=>$modelDesc, 'modelImage'=>$modelImage, 'modelCategory'=>$modelCategory)); ?>
