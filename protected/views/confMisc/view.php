<?php
/* @var $this ConfMiscController */
/* @var $model ConfMisc */

$this->breadcrumbs=array(
	'Conf Miscs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List ConfMisc', 'url'=>array('index')),
	array('label'=>'Create ConfMisc', 'url'=>array('create')),
	array('label'=>'Update ConfMisc', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ConfMisc', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConfMisc', 'url'=>array('admin')),
);
?>

<h1>View ConfMisc #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'param',
		'value',
		'field_type',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
	),
)); ?>
