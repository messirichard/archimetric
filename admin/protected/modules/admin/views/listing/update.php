<?php
$this->breadcrumbs=array(
	'Listings'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);
$this->pageHeader=array(
	'icon'=>'fa fa-list',
	'title'=>'Listing',
	'subtitle'=>'Edit Listing',
);

$this->menu=array(
	array('label'=>'List Listing', 'icon'=>'th-list', 'url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model,'modelImage'=>$modelImage,'modelArsip'=>$modelArsip)); ?>