<?php
/* @var $this ProductWantedController */
/* @var $model ProductWanted */
/* @var $form CActiveForm */
?>

<div class="form wide">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'wanted-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'wanted_name'); ?>
        <?php echo $form->textField($model, 'wanted_name', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'wanted_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'wanted_description'); ?>
        <?php echo $form->textArea($model, 'wanted_description', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'wanted_description'); ?>
    </div>

    <div class="row">


        <?php
        if (!$model->isNewRecord) {
            echo CHtml::openTag('div', array('style' => 'width:100px;margin:4px 130px 4px'));
            echo CHtml::link(CHtml::image($model->show_image, "", array('width' => '150px','height'=>'100px')), $model->show_image, array("target" => "blank", "rel" => 'lightbox[_default]'));
            echo CHtml::closeTag('div');
        }
        ?>
        <?php echo $form->labelEx($model, 'wanted_image'); ?>
        <?php echo $form->fileField($model, 'wanted_image', array('maxlength' => 255)); ?>
        <?php echo $form->error($model, 'wanted_image'); ?>
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