<?php
/* @var $this CategoriesController */
/* @var $model Categories */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->id,
);

$this->menu = array(
    array('label' => 'Create Parent', 'url' => array('createParent')),
    array('label' => 'Create', 'url' => array('create')),
    array('label' => 'List All', 'url' => array('index')),
    array('label' => 'List Parent', 'url' => array('indexParent')),
);
?>

<h1>View Categories #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_name',
		'category_description',
		'category_image',
		'parent_id',
	),
)); ?>
