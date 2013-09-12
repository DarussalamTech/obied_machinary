<?php
/* @var $this ProductImagesController */
/* @var $model ProductImages */

$this->breadcrumbs=array(
	'Product Images'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductImages', 'url'=>array('index')),
	array('label'=>'Create ProductImages', 'url'=>array('create')),
	array('label'=>'View ProductImages', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProductImages', 'url'=>array('admin')),
);
?>

<h1>Update ProductImages <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>