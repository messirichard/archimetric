<?php
$this->breadcrumbs=array(
	'Jenis Usaha'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-suitcase',
	'title'=>'Jenis Usaha',
	'subtitle'=>'Edit Jenis Usaha',
);

$this->menu=array(
	array('label'=>'List Jenis Usaha', 'icon'=>'th-list', 'url'=>array('index')),
	// array('label'=>'Add Jenis Usaha', 'icon'=>'plus-sign', 'url'=>array('create')),
	// array('label'=>'View Jenis Usaha', 'icon'=>'eye-open', 'url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>