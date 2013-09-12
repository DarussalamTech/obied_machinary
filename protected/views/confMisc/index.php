<?php
/* @var $this ConfMiscController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Conf Miscs',
);

$this->menu=array(
	array('label'=>'Create ConfMisc', 'url'=>array('create')),
	array('label'=>'Manage ConfMisc', 'url'=>array('admin')),
);
?>

<h1>Conf Miscs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
