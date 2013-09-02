<?php
/* @var $this TariffController */
/* @var $model Tariff */

$this->breadcrumbs=array(
	'Tariffs'=>array('index'),
	$model->title=>array('view','id'=>$model->id_tariff),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tariff', 'url'=>array('index')),
	array('label'=>'Create Tariff', 'url'=>array('create')),
	array('label'=>'View Tariff', 'url'=>array('view', 'id'=>$model->id_tariff)),
	array('label'=>'Manage Tariff', 'url'=>array('admin')),
);
?>

<h1>Update Tariff <?php echo $model->id_tariff; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>