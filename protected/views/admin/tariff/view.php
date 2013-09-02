<?php
/* @var $this TariffController */
/* @var $model Tariff */

$this->breadcrumbs=array(
	'Tariffs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Tariff', 'url'=>array('index')),
	array('label'=>'Create Tariff', 'url'=>array('create')),
	array('label'=>'Update Tariff', 'url'=>array('update', 'id'=>$model->id_tariff)),
	array('label'=>'Delete Tariff', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tariff),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tariff', 'url'=>array('admin')),
);
?>

<h1>View Tariff #<?php echo $model->id_tariff; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_tariff',
		'users_limit',
		'books_limit',
		'day_cost',
		'title',
		'description',
	),
)); ?>
