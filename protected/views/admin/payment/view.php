<?php
/* @var $this PaymentController */
/* @var $model Payment */

$this->breadcrumbs=array(
	'Payments'=>array('index'),
	$model->id_payment,
);

$this->menu=array(
	array('label'=>'List Payment', 'url'=>array('index')),
	array('label'=>'Create Payment', 'url'=>array('create')),
	array('label'=>'Update Payment', 'url'=>array('update', 'id'=>$model->id_payment)),
	array('label'=>'Delete Payment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_payment),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Payment', 'url'=>array('admin')),
);
?>

<h1>View Payment #<?php echo $model->id_payment; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_payment',
		'payment_date',
		'summ',
		'account_id',
	),
)); ?>
