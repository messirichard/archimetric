<?php
$this->breadcrumbs=array(
	'Leadership'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-tags',
	'title'=>'Leadership',
	'subtitle'=>'Data Leadership',
);

$this->menu=array(
	array('label'=>'List Leadership', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>
