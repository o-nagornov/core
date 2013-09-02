<?php
/* @var $this InstallController */

$this->breadcrumbs=array(
	'Установка',
);
?>

<?php
	$this->renderPartial('progress', array(
		'dbStatus'=>'Ожидает',
		'filesStatus'=>'Ожидает',
		'settingsStatus'=>'Ожидает',
		'usersStatus'=>'Ожидает',
		'continue'=>false,
		'link'=>null,
	));
?>

<?php
	echo CHtml::link(CHtml::button('Начать установку!'), array('/install/install', 'account'=>Yii::app()->user->id));
?>