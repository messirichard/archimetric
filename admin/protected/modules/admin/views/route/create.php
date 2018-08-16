<?php
$this->breadcrumbs=array(
	'Route of Shippings'=>array('index'),
	'Add',
);
$this->pageHeader=array(
	'icon'=>'fa fa-map-marker',
	'title'=>'Route of Shippings',
	'subtitle'=>'Tambah Route of Shippings',
);

$this->menu=array(
	array('label'=>'List User', 'icon'=>'th-list', 'url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>