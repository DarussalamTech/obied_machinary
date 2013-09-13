<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'products-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'category_id'); ?>
        <?php $child_cat_list = CHtml::listData($model_child_cat, 'id', 'category_name') ?>
        <?php echo $form->dropDownList($model, 'category_id', $child_cat_list, array('prompt' => 'Select Parent Category')) ?>
        <?php echo $form->error($model, 'category_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'product_name'); ?>
        <?php echo $form->textField($model, 'product_name', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'product_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'product_overview'); ?>
        <?php echo $form->textArea($model, 'product_overview', array('size' => 60, 'maxlength' => 255, 'style' => "width: 200px; height: 90px")); ?>
        <?php echo $form->error($model, 'product_overview'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'product_service_type'); ?>
        <?php echo $form->dropDownList($model, 'product_service_type', array('trade' => 'Trade', 'rented' => 'Rented')); ?>
        <?php echo $form->error($model, 'product_service_type'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'slug'); ?>
        <?php echo $form->textField($model, 'slug', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'slug'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'product_description'); ?>
        <?php echo $form->textArea($model, 'product_description', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'product_description'); ?>
    </div>





    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->