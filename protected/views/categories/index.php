<?php
/* @var $this CategoriesController */
/* @var $model Categories */

$this->breadcrumbs = array(
    'Categories' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Create Parent', 'url' => array('createParent')),
    array('label' => 'Create', 'url' => array('create')),
    array('label' => 'List All', 'url' => array('index')),
    array('label' => 'List Parent', 'url' => array('indexParent')),
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
        'parent_id',     
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
