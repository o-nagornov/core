<?php
/* @var $this StatisticsController */

$this->breadcrumbs=array(
	'Statistics'=>array('/admin/statistics'),
	'Payments',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'payment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_payment',
		'payment_date',
		'summ',
		'account_id',
		'account.login',
		'account.email',
	),
)); ?>