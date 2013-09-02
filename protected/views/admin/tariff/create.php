<?php
/* @var $this TariffController */
/* @var $model Tariff */

$this->breadcrumbs=array(
	'Tariffs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tariff', 'url'=>array('index')),
	array('label'=>'Manage Tariff', 'url'=>array('admin')),
);
?>

<h1>Create Tariff</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>