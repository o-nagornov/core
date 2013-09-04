<?php
/* @var $this DashboardController */

$this->breadcrumbs=array(
	'Dashboard',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>

<?php
	echo CHtml::link('Статистика регистраций', array('/admin/statistics/registrations'))."<br/>";
	echo CHtml::link('Статистика платежей', array('/admin/statistics/registrations'))."<br/>";
	echo CHtml::link('Добавить платеж', array('/admin/payments/create'))."<br/>";
	
	if (Yii::app()->user->isRoot())
	{
		echo "<br/><br/><br/>";
		echo CHtml::link('Управление аккаунтами', array('/admin/account'))."<br/>";
		echo CHtml::link('Управление тарифами', array('/admin/tariff'))."<br/>";
		echo CHtml::link('Управление платежами', array('/admin/payment'))."<br/>";
		
	}
?>