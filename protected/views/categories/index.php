<?php
/* @var $this CategoriesController */
/* @var $model Categories */

$this->breadcrumbs = array(
    'Categories' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Create Sub Categories', 'url' => array('create')),
    array('label' => 'List Sub Categories', 'url' => array('index')),
    array('label' => 'Create Categories', 'url' => array('createParent')),
    array('label' => 'List Categories', 'url' => array('indexParent')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#categories-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Categories</h1>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'categories-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'category_name',
        'category_description',
        array(
            'name' => 'parent_id',
            'value' => 'isset($data->parent_cat)?$data->parent_cat->category_name:""',
            'visible' => $model->_action == "index" ? true : false,
        ),
        array(
            'class' => 'CButtonColumn',
            'buttons' => array(
                'update' => array(
                    'url' => $model->_action != "index" ? 'Yii::app()->controller->createUrl("/categories/updateParent",array("id"=>$data->id))' : 'Yii::app()->controller->createUrl("/categories/update",array("id"=>$data->id))',
                )
            ),
        ),
    ),
));
?>
