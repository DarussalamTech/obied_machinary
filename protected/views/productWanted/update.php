<?php
/* @var $this ProductWantedController */
/* @var $model ProductWanted */

$this->breadcrumbs = array(
    'Product Wanteds' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List Product Wanted', 'url' => array('index')),
    array('label' => 'Create Product Wanted', 'url' => array('create')),
);
?>

<h1>Update ProductWanted <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>