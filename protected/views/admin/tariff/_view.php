<?php
/* @var $this TariffController */
/* @var $data Tariff */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tariff')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tariff), array('view', 'id'=>$data->id_tariff)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('users_limit')); ?>:</b>
	<?php echo CHtml::encode($data->users_limit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('books_limit')); ?>:</b>
	<?php echo CHtml::encode($data->books_limit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('day_cost')); ?>:</b>
	<?php echo CHtml::encode($data->day_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>