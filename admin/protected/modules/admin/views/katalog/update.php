<?php
$this->breadcrumbs=array(
	'Katalog'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-suitcase',
	'title'=>'Katalog',
	'subtitle'=>'Edit Katalog',
);

$this->menu=array(
	array('label'=>'List Katalog', 'icon'=>'th-list', 'url'=>array('index')),
	// array('label'=>'Add Katalog', 'icon'=>'plus-sign', 'url'=>array('create')),
	// array('label'=>'View Katalog', 'icon'=>'eye-open', 'url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>