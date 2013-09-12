<?php
/* @var $this ProductImagesController */
/* @var $model ProductImages */

$this->breadcrumbs=array(
	'Product Images'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProductImages', 'url'=>array('index')),
	array('label'=>'Create ProductImages', 'url'=>array('create')),
	array('label'=>'Update ProductImages', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProductImages', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductImages', 'url'=>array('admin')),
);
?>

<h1>View ProductImages #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'product_id',
		'image_small',
		'image_detail',
		'image_large',
		'is_default',
		'deleted',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
	),
)); ?>
