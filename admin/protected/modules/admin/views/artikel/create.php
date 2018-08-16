<?php
$this->breadcrumbs=array(
	'Artikel'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-list',
	'title'=>'Artikel',
	'subtitle'=>'Tambah Artikel',
);

$this->menu=array(
	array('label'=>'List Artikel', 'icon'=>'th-list', 'url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

