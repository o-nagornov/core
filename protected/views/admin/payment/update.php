<?php
/* @var $this PaymentController */
/* @var $model Payment */

$this->breadcrumbs=array(
	'Payments'=>array('index'),
	$model->id_payment=>array('view','id'=>$model->id_payment),
	'Update',
);

$this->menu=array(
	array('label'=>'List Payment', 'url'=>array('index')),
	array('label'=>'Create Payment', 'url'=>array('create')),
	array('label'=>'View Payment', 'url'=>array('view', 'id'=>$model->id_payment)),
	array('label'=>'Manage Payment', 'url'=>array('admin')),
);
?>

<h1>Update Payment <?php echo $model->id_payment; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>