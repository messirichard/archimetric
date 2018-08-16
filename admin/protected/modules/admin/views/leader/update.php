<?php
$this->breadcrumbs=array(
	'Leadership'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-tags',
	'title'=>'Leadership',
	'subtitle'=>'Data Leadership',
);

$this->menu=array(
	array('label'=>'List Leadership', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Leadership', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Leadership', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>
