<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs = array(
    'Products' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Rental', 'url' => array('index')),
    array('label' => 'Create Rental', 'url' => array('create')),
);
?>

<?php
echo $this->action->id;
if ($this->action->id == "createTrading") {
    ?><h1>Create Trading</h1>
    <?php echo $this->renderPartial('_form_trading', array('model' => $model, 'model_child_cat' => $model_child_cat)); ?>

    <?php
} else {
    ?><h1>Create Rental</h1>
    <?php echo $this->renderPartial('_form', array('model' => $model, 'model_child_cat' => $model_child_cat)); ?>
    <?php
}
?>

