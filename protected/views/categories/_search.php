<?php
/* @var $this CategoriesController */
/* @var $model Categories */
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
        <?php echo $form->label($model, 'category_name'); ?>
        <?php echo $form->textField($model, 'category_name', array('size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'category_description'); ?>
        <?php echo $form->textField($model, 'category_description', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'category_image'); ?>
        <?php echo $form->textField($model, 'category_image', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'parent_id'); ?>
        <?php
        $criteria =new CDbCriteria();
        $criteria->condition = "parent_id = 0";
        $list = array(""=>"All")+CHtml::listData(Categories::model()->findAll($criteria),"id","category_name");
        echo $form->dropDownList($model, 'parent_id',$list);
        ?>
    </div>



    <div class="row buttons">
        <?php echo CHtml::submitButton('Search', array("class" => "btn")); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->