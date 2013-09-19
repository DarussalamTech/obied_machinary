<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu = array(
    array('label' => 'List Rental', 'url' => array('index')),
    array('label' => 'Create Rental', 'url' => array('create')),
);
?>

<h1>Update Products <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'model_child_cat' => $model_child_cat)); ?>