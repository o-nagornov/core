<?php
/* @var $this AccountController */

$this->breadcrumbs=array(
	'Account',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>

<?php if ($type != 'new') : ?>
<table>
	<tr>
		<td>Адрес</td>
		<td><?php echo CHtml::link($address, Yii::app()->baseUrl."/".$address); ?></td>
	</tr>
	<tr>
		<td>Статус аккаунта</td>
		<td><?php echo $status; ?></td>
	</tr>
	<tr>
		<td>Лимит пользователей</td>
		<td><?php echo $users; ?></td>
	</tr>
	<tr>
		<td>Лимит книг</td>
		<td><?php echo $books; ?></td>
	</tr>
	<tr>
		<td>Тариф</td>
		<td><?php echo $tariff; ?></td>
	</tr>
	<tr>
		<td>Остаток на счете</td>
		<td><?php echo $account; ?></td>
	</tr>
	<tr>
		<td>Остаток дней</td>
		<td><?php echo $days; ?></td>
	</tr>
</table>

<?php
	
	if ($type != 'demo')
	{

		if ($type != 'locked')
		{
			echo CHtml::link(CHtml::button("Заблокировать", array('class'=>'btn btn-block')), array('/account/lock'), array('confirm'=>'Заблокировать аккаунт?'));
		}
		else
		{
			echo CHtml::link(CHtml::button("Разблокировать", array('class'=>'btn btn-block')), array('/account/unlock'), array('confirm'=>'Раблокировать аккаунт?'));
		}
	}
	
	echo CHtml::link(CHtml::button("Перейти к использованию", array('class'=>'btn btn-block')), Yii::app()->baseUrl."/".$address);
?>

<?php
	echo CHtml::beginForm(CHtml::normalizeUrl(array('/account/changeTariff')), 'get', array('id'=>'tariff-form', 'class'=>'form-horizontal'));
	echo CHtml::listBox('newTariff', $tariffId, CHtml::listData(Tariff::model()->findAll('id_tariff > 1 AND id_tariff != :tariff', array(':tariff'=>$tariffId)), 'id_tariff', 'title'), array('size'=>'1'));
	echo CHtml::submitButton('Сменить тариф', array('name'=>'', 'class'=>'btn'));
	echo CHtml::endForm();
?>

<?php else : ?>
<table>
	<tr>
		<td>Адрес</td>
		<td><?php echo $address; ?></td>
	</tr>
	<tr>
		<td>Статус аккаунта</td>
		<td><?php echo $status; ?></td>
	</tr>
</table>
<?php
	echo CHtml::link(CHtml::button('Развернуть решение!'), array('/install'));
?>
<?php endif;?>