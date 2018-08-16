<?php
$this->breadcrumbs=array(
	'Artikel'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-suitcase',
	'title'=>'Artikel',
	'subtitle'=>'Edit Artikel',
);

$this->menu=array(
	array('label'=>'List Artikel', 'icon'=>'th-list', 'url'=>array('index')),
	// array('label'=>'Add Artikel', 'icon'=>'plus-sign', 'url'=>array('create')),
	// array('label'=>'View Artikel', 'icon'=>'eye-open', 'url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>