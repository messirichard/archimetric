<?php
$this->breadcrumbs=array(
	'Katalog'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-list',
	'title'=>'Katalog',
	'subtitle'=>'Tambah Katalog',
);

$this->menu=array(
	array('label'=>'List Katalog', 'icon'=>'th-list', 'url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

