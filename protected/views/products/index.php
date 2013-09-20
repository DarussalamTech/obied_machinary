<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs = array(
    'Products' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Products', 'url' => array('index')),
    array('label' => 'List Rental Products', 'url' => array('indexRental')),
    array('label' => 'List Trading Products', 'url' => array('indexTrading')),
    array('label' => 'Create Products', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#products-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Products</h1>


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
    'id' => 'products-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => "category_id",
            'value' => 'isset($data->category)?$data->category->category_name:""'
        ),
        'product_service_type',
        'product_name',
        'price',
        'product_description',
        'product_overview',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
