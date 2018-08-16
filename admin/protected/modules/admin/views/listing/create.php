<?php
$this->breadcrumbs=array(
	'Listing'=>array('index'),
	'Add',
);
$this->pageHeader=array(
	'icon'=>'fa fa-list',
	'title'=>'Listing',
	'subtitle'=>'Tambah Listing',
);

$this->menu=array(
	array('label'=>'List Listing', 'icon'=>'th-list', 'url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model,'modelImage'=>$modelImage,'modelArsip'=>$modelArsip)); ?>