<?php
/* @var $this InstallController */

$this->breadcrumbs=array(
	'Установка'=>array('/install'),
	'Прогресс установки',
);
?>
<table>
	<tr>
		<td>Создание базы данных</td>
		<td><span id='dbStatus'><?php echo $dbStatus; ?></span></td>
		<td>
			<i>На этом этапе создается база данных для Вашей системы учета</i>
		</td>
	</tr>
	<tr>
		<td>Развертывание приложения</td>
		<td><span id='filesStatus'><?php echo $filesStatus; ?></span></td>
		<td>
			<i>На этом этапе копируются необходимые для работы Вашего приложения файлы</i>
		</td>
	</tr>
	<tr>
		<td>Настройка приложения</td>
		<td><span id='settingsStatus'><?php echo $settingsStatus; ?></span></td>
		<td>
			<i>На этом этапе производится настройка и конфигурирование приложения</i>
		</td>
	</tr>
	<tr>
		<td>Создание пользователя</td>
		<td><span id='usersStatus'><?php echo $usersStatus; ?></span></td>
		<td>
			<i>На этом этапе создается Ваш пользовательский аккаунт в приложении</i>
		</td>
	</tr>
</table>

<?php
	if ($link != null)
	{
		echo CHtml::link('Начать использование', $link);
	}
	
	if ($continue)
	{
		echo CHtml::link(CHtml::button('Продолжить установку!'), array('/install/install', 'account'=>Yii::app()->user->id));
	}
?>
