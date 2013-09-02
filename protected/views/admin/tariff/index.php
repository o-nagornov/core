<?php
/* @var $this TariffController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tariffs',
);

$this->menu=array(
	array('label'=>'Create Tariff', 'url'=>array('create')),
	array('label'=>'Manage Tariff', 'url'=>array('admin')),
);
?>

<h1>Tariffs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
