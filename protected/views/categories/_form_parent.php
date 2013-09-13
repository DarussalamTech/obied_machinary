<?php
/* @var $this CategoriesController */
/* @var $model Categories */
/* @var $form CActiveForm */
//$this->renderPartial("/common/_left_menu");
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'categories-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'category_name'); ?>
        <?php echo $form->textField($model, 'category_name', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'category_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'category_description'); ?>
        <?php echo $form->textArea($model, 'category_description', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'category_description'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'category_image'); ?>
        <?php echo $form->fileField($model, 'category_image', array('maxlength' => 255)); ?>
        <?php echo $form->error($model, 'category_image'); ?>
    </div>

    <?php echo $form->hiddenField($model, 'parent_id', array("value" => "0")); ?>


    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->