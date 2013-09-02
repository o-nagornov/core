<?php
/* @var $this TariffController */
/* @var $model Tariff */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_tariff'); ?>
		<?php echo $form->textField($model,'id_tariff'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'users_limit'); ?>
		<?php echo $form->textField($model,'users_limit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'books_limit'); ?>
		<?php echo $form->textField($model,'books_limit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'day_cost'); ?>
		<?php echo $form->textField($model,'day_cost',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->