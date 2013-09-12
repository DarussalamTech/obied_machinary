<?php
/* @var $this ConfMiscController */
/* @var $model ConfMisc */

$this->breadcrumbs=array(
	'Conf Miscs'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ConfMisc', 'url'=>array('index')),
	array('label'=>'Create ConfMisc', 'url'=>array('create')),
	array('label'=>'View ConfMisc', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ConfMisc', 'url'=>array('admin')),
);
?>

<h1>Update ConfMisc <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>