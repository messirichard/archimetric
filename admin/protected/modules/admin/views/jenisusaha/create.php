<?php
$this->breadcrumbs=array(
	'Jenis Usaha'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-list',
	'title'=>'Jenis Usaha',
	'subtitle'=>'Tambah Jenis Usaha',
);

$this->menu=array(
	array('label'=>'List Jenis Usaha', 'icon'=>'th-list', 'url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

