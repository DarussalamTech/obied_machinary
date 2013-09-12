<?php
/* @var $this ConfMiscController */
/* @var $model ConfMisc */

$this->breadcrumbs=array(
	'Conf Miscs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConfMisc', 'url'=>array('index')),
	array('label'=>'Manage ConfMisc', 'url'=>array('admin')),
);
?>

<h1>Create ConfMisc</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>