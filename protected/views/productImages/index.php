<?php
/* @var $this ProductImagesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Images',
);

$this->menu=array(
	array('label'=>'Create ProductImages', 'url'=>array('create')),
	array('label'=>'Manage ProductImages', 'url'=>array('admin')),
);
?>

<h1>Product Images</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
