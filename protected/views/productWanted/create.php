<?php
/* @var $this ProductWantedController */
/* @var $model ProductWanted */

$this->breadcrumbs = array(
    'Product Wanteds' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Product Wanted', 'url' => array('index')),
    array('label' => 'Create Product Wanted', 'url' => array('create')),
);
?>

<h1>Create Product Wanted</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>