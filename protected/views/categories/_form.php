<?php
/* @var $this CategoriesController */
/* @var $model Categories */
/* @var $form CActiveForm */
//$this->renderPartial("/common/_left_menu");
?>

<div class="form wide">

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
        <?php echo $form->labelEx($model, 'parent_id'); ?>

        <?php $parent_cat_list = CHtml::listData($model_parent_cat, 'id', 'category_name') ?>
        <?php echo $form->dropDownList($model, 'parent_id', $parent_cat_list, array('prompt' => 'Select Parent Category')) ?>
        <?php echo $form->error($model, 'parent_id'); ?>
    </div>
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

        <?php
        if (!$model->isNewRecord) {
            echo CHtml::openTag('div', array('style' => 'width:100px;margin:4px 130px 4px'));
            echo CHtml::link(CHtml::image($model->show_image, "", array('width' => '150px', 'height' => '100px')), $model->show_image, array("target" => "blank", "rel" => 'lightbox[_default]'));
            echo CHtml::closeTag('div');
        }
        ?>
        <?php echo $form->labelEx($model, 'category_image'); ?>
        <?php echo $form->fileField($model, 'category_image', array('maxlength' => 255)); ?>
        <?php echo $form->error($model, 'category_image'); ?>
    </div>




    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array("class" => "btn")); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<?php
$this->widget('ext.lyiightbox.LyiightBox2', array(
));
?>