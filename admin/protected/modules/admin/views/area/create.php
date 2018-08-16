<?php
$this->breadcrumbs=array(
	'Area'=>array('index', 'parent'=>$_GET['parent']),
	// 'Add',
);
$bread = TbArea::model()->getBreadcrump($_GET['parent']);
$bread = array_reverse($bread,true);
foreach ($bread as $key => $value) {
	$this->breadcrumbs[$key]=$value;
}
$this->breadcrumbs[]='Add';

$this->pageHeader=array(
	'icon'=>'fa fa-thumb-tack',
	'title'=>'Area',
	'subtitle'=>'Tambah Area',
);

$this->menu=array(
	array('label'=>'List Area', 'icon'=>'th-list','url'=>array('index', 'parent'=>$_GET['parent'])),
);
?>


<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('modelImage'=>$modelImage,'model'=>$model)); ?>