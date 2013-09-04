<?php
/* @var $this AccountController */
/* @var $model Account */

$this->breadcrumbs=array(
	'Accounts'=>array('index'),
	$model->id_account,
);

$this->menu=array(
	array('label'=>'List Account', 'url'=>array('index')),
	array('label'=>'Create Account', 'url'=>array('create')),
	array('label'=>'Update Account', 'url'=>array('update', 'id'=>$model->id_account)),
	array('label'=>'Delete Account', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_account),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Account', 'url'=>array('admin')),
);
?>

<h1>View Account #<?php echo $model->id_account; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_account',
		'login',
		'email',
		'password',
		'creation_date',
		'tbl_prefix',
		'status',
		'role',
		'check_hash',
		'account',
		'tariff_id',
	),
)); ?>
