<?php
/* @var $this CategoriesController */
/* @var $model Categories */

$this->menu = array(
    array('label' => 'Create Parent', 'url' => array('createParent')),
    array('label' => 'Create', 'url' => array('create')),
    array('label' => 'List All', 'url' => array('index')),
    array('label' => 'List Parent', 'url' => array('indexParent')),
);
?>

<h1>Update Categories <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'model_parent_cat' => $model_parent_cat)); ?>