<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu = array(
    array('label' => 'List Products', 'url' => array('index')),
    array('label' => 'List Rental Products', 'url' => array('indexRental')),
    array('label' => 'List Sales Products', 'url' => array('indexTrading')),
    array('label' => 'Create Products', 'url' => array('create')),
);
?>

<h1>Update Products <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'model_child_cat' => $model_child_cat)); ?>