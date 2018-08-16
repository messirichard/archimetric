<?php
$this->breadcrumbs=array(
	'Promo'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-list',
	'title'=>'Promo',
	'subtitle'=>'Tambah Promo',
);

$this->menu=array(
	array('label'=>'List Promo', 'icon'=>'th-list', 'url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

