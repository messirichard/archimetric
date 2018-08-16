<?php
$this->breadcrumbs=array(
	'Area'=>array('index', 'parent'=>$_GET['parent']),
	// $model->name=>array('view','id'=>$model->id),
	// 'Edit',
);
$bread = TbArea::model()->getBreadcrump($_GET['parent']);
$bread = array_reverse($bread,true);
foreach ($bread as $key => $value) {
	$this->breadcrumbs[$key]=$value;
}
$this->breadcrumbs[]='Edit';

$this->pageHeader=array(
	'icon'=>'fa fa-thumb-tack',
	'title'=>'Area',
	'subtitle'=>'Edit Area',
);

$this->menu=array(
	array('label'=>'List Area', 'icon'=>'th-list','url'=>array('index', 'parent'=>$_GET['parent'])),
	array('label'=>'Add Area', 'icon'=>'plus-sign','url'=>array('create', 'parent'=>$_GET['parent']), 'visible'=>($_GET['parent'] == '' || $_GET['parent'] == 0) ? true : true),
	// array('label'=>'View Area', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('modelImage'=>$modelImage,'model'=>$model)); ?>