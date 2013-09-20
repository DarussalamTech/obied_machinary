<?php
/* @var $this CategoriesController */
/* @var $model Categories */

$this->menu = array(
    array('label' => 'Create Sub Categories', 'url' => array('create')),
    array('label' => 'List Sub Categories', 'url' => array('index')),
    array('label' => 'Create Categories', 'url' => array('createParent')),
    array('label' => 'List Categories', 'url' => array('indexParent')),
);
?>


<?php
/**
 * for differntitating parent and childs
 */
if ($this->action->id != "updateParent") {
    echo '<h1>update Category </h1>';
    echo $this->renderPartial('_form', array('model' => $model,
        'model_parent_cat' => $model_parent_cat,
            // 'cityList' => $cityList
    ));
} else {
    echo '<h1>update Parent Category</h1>';
    echo $this->renderPartial('_form_parent', array('model' => $model,
        'model_parent_cat' => $model_parent_cat,
    ));
}
?>