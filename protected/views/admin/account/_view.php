<?php
/* @var $this AccountController */
/* @var $data Account */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_account')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_account), array('view', 'id'=>$data->id_account)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('login')); ?>:</b>
	<?php echo CHtml::encode($data->login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->creation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stop_date')); ?>:</b>
	<?php echo CHtml::encode($data->stop_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_prefix')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_prefix); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('locked')); ?>:</b>
	<?php echo CHtml::encode($data->locked); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('role')); ?>:</b>
	<?php echo CHtml::encode($data->role); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('check_hash')); ?>:</b>
	<?php echo CHtml::encode($data->check_hash); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tariff_id')); ?>:</b>
	<?php echo CHtml::encode($data->tariff_id); ?>
	<br />

	*/ ?>

</div>