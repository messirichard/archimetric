<?php
$this->breadcrumbs=array(
	'Route of Shippings'=>array('index'),
	'Edit Route of Shippings',
);
$this->pageHeader=array(
	'icon'=>'fa fa-map-marker',
	'title'=>'Route of Shippings',
	'subtitle'=>'Update Route of Shippings',
);

$this->menu=array(
	array('label'=>'List Route of Shippings', 'icon'=>'th-list', 'url'=>array('index')),
	array('label'=>'Add Route of Shippings', 'icon'=>'plus-sign', 'url'=>array('create')),
	// array('label'=>'View Route of Shippings', 'icon'=>'eye-open', 'url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>