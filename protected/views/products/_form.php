<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/gridform.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/functions.js');
?>

<div class="form wide">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'products-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'category_id'); ?>
        <?php $child_cat_list = CHtml::listData($model_child_cat, 'id', 'category_name') ?>
        <?php echo $form->dropDownList($model, 'category_id', $child_cat_list, array('prompt' => 'Select Parent Category')) ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'product_name'); ?>
        <?php echo $form->textField($model, 'product_name', array('size' => 50, 'maxlength' => 50)); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'serial_number'); ?>
        <?php echo $form->textField($model, 'serial_number', array('size' => 50, 'maxlength' => 50)); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'product_service_type'); ?>
        <?php
        echo $form->dropDownList($model, 'product_service_type', array('Trading' => 'Trading', 'Rental' => 'Rental'));
        ?>

    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'price'); ?>
        <?php echo $form->textField($model, 'price', array('size' => 50, 'maxlength' => 50, 'style' => 'width:100px')); ?>
        <span id="Products_per_variable" style="display: none;">
            <?php
            echo "Per&nbsp&nbsp" . $form->dropDownList($model, 'price_per_variable', array('Day' => 'Day', 'Month' => 'Month','Year'=>'Year'), 
                    array('prompt' => 'Select', 'style' => 'width:74px;'));
            ?>
        </span>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'capacity'); ?>
        <?php echo $form->textField($model, 'capacity', array('size' => 50, 'maxlength' => 50)); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->dropDownList($model, 'status', array('available' => 'Available', 'sold' => 'Sold', 'comming soon' => 'Comming Soon'));
        ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'year'); ?>
        <?php $years = array("1999" => "1999", "2000" => "2000", "2001" => "2001", 2002 => 2002, 2003 => 2003, 2004 => 2004, 2005 => 2005, 2006 => 2006, 2007 => 2007, 2008 => 2008, 2009 => 2009, 2010 => 2010, 2011 => 2011, 2012 => 2012, 2013 => 2013); ?>
        <?php echo $form->dropDownList($model, 'year', $years); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'product_overview'); ?>
        <?php echo $form->textArea($model, 'product_overview', array('size' => 60, 'maxlength' => 255, 'style' => "width: 200px; height: 90px")); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'crane_boom'); ?>
        <?php echo $form->textField($model, 'crane_boom', array('size' => 50, 'maxlength' => 50)); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'crane_jib'); ?>
        <?php echo $form->textField($model, 'crane_jib', array('size' => 50, 'maxlength' => 50)); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'product_description'); ?>
        <?php echo $form->textArea($model, 'product_description', array('rows' => 6, 'cols' => 50)); ?>
    </div>


    <?php
    if ($this->action->id != "update") {
        $this->renderPartial('productImages/_container', array('model' => $model, "type" => "field"));
        //$this->renderPartial('quranProfile/_container', array('model' => $model, "type" => "field"));
    }
    ?>


    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array("class" => "btn")); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<script>
    jQuery('#Products_product_service_type').change(function() {

        if (jQuery('#Products_product_service_type').val() == 'Rental')
        {
            console.log(jQuery('#Products_product_service_type').val());
            jQuery('#Products_per_variable').show();
        }
        else
        {
            jQuery('#Products_per_variable').find('option:first').attr('selected', 'selected');
            jQuery('#Products_per_variable').hide();
        }

    })
</script>