<?php

/* @var $this CategoriesController */
/* @var $model Categories */

$this->breadcrumbs = array(
    'Categories' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Categories', 'url' => array('index')),
    array('label' => 'Manage Categories', 'url' => array('admin')),
);
?>

<?php

/**
 * for differntitating parent and childs
 */
if ($this->action->id != "createParent") {
    echo '<h1>Create Categories</h1>';
    echo $this->renderPartial('_form', array('model' => $model,
        'model_parent_cat' => $model_parent_cat,
            // 'cityList' => $cityList
    ));
} else {
    echo '<h1>Create Parent Categories</h1>';
    echo $this->renderPartial('_form_parent', array('model' => $model,
        'model_parent_cat' => $model_parent_cat,
    ));
}
?>