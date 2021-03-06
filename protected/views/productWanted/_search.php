<?php
/* @var $this ProductWantedController */
/* @var $model ProductWanted */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wanted_name'); ?>
		<?php echo $form->textField($model,'wanted_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wanted_description'); ?>
		<?php echo $form->textField($model,'wanted_description',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wanted_image'); ?>
		<?php echo $form->textField($model,'wanted_image',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search', array("class" => "btn")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->