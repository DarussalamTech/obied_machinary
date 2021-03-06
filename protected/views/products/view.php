<?php
/* @var $this ProductsController */
/* @var $model Products */
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/gridform.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/functions.js');

$this->breadcrumbs = array(
    'Products' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Products', 'url' => array('index')),
    array('label' => 'List Rental Products', 'url' => array('indexRental')),
    array('label' => 'List Sales Products', 'url' => array('indexTrading')),
    array('label' => 'Create Products', 'url' => array('create')),
);
?>


<div class="pading-bottom-5">
    <div class="left_float">
        <h1>View Products #<?php echo $model->id; ?></h1>
    </div>

    <?php /* Convert to Monitoring Log Buttons */ ?>
    <div class = "right_float">
        <span class="creatdate">
            <?php
            echo CHtml::link("Edit", $this->createUrl("update", array("id" => $model->primaryKey)), array('class' => "print_link_btn"));
            ?>
        </span>
    </div>
</div>
<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'name' => "category_id",
            'value' => isset($model->category) ? $model->category->category_name : ""
        ),
        'product_service_type',
        'product_name',
        'product_description',
        'product_overview',
        'year',
        'slug',
    ),
));
$this->renderPartial('productImages/_container', array('model' => $model, "type" => "form"));
?>
