<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs = array(
    'Products' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Products', 'url' => array('index')),
    array('label' => 'List Rental Products', 'url' => array('indexRental')),
    array('label' => 'List Trading Products', 'url' => array('indexTrading')),
);
?>

<h1>Create Products</h1>

<?php echo $this->renderPartial('_form', array('model' => $model, 'model_child_cat' => $model_child_cat)); ?>