<?php
/* @var $this ProductImagesController */
/* @var $model ProductImages */

$this->breadcrumbs=array(
	'Product Images'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductImages', 'url'=>array('index')),
	array('label'=>'Manage ProductImages', 'url'=>array('admin')),
);
?>

<h1>Create ProductImages</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>