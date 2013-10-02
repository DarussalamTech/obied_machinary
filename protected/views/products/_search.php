<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>

    <div class="row">
        <?php echo $form->label($model, 'id'); ?>
        <?php echo $form->textField($model, 'id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'category_id'); ?>
        <?php echo $form->textField($model, 'category_id'); ?>
    </div>

    <div class="row">

        <?php echo $form->label($model, 'product_service_type'); ?>
        <?php
        echo $form->dropDownList($model, 'product_service_type', array('Sales' => 'Sales', 'Rental' => 'Rental'), array('prompt' => 'Select Type'));
        ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'product_name'); ?>
        <?php echo $form->textField($model, 'product_name', array('size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'product_description'); ?>
        <?php echo $form->textField($model, 'product_description', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'product_overview'); ?>
        <?php echo $form->textField($model, 'product_overview', array('size' => 60, 'maxlength' => 255)); ?>
    </div>



    <div class="row buttons">
        <?php echo CHtml::submitButton('Search', array("class" => "btn")); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->