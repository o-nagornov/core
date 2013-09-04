<?php
/* @var $this StatisticsController */

$this->breadcrumbs=array(
	'Statistics'=>array('/admin/statistics'),
	'Registrations',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'account-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_account',
		'login',
		'email',
		'password',
		'creation_date',
		'tbl_prefix',
		'status',
		'account',
		array(
			'header'=>'Тариф',
			'value'=>'$data->tariff->title',
		),
		'tariff_id',
	),
)); ?>