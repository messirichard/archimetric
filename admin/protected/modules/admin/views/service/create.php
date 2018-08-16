<?php
$this->breadcrumbs=array(
	'Service'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-tags',
	'title'=>'Service',
	'subtitle'=>'Data Service',
);

$this->menu=array(
	array('label'=>'List Service', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>
