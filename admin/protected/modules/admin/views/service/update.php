<?php
$this->breadcrumbs=array(
	'Service'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-tags',
	'title'=>'Service',
	'subtitle'=>'Data Service',
);

$this->menu=array(
	array('label'=>'List Service', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Service', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Service', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>
