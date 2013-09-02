<?php
/* @var $this RegistrationController */

$this->breadcrumbs=array(
	'Регистрация'=>array('/registration'),
	'Подтверждение',
);
?>
<h3>
<?php
	switch ($status)
	{
		case 'ok':
			echo "Ваша запись успешно активирована";
			break;
		case 'notregisted':
			echo "Вам пришло ошибочное сообщение, обратитесь к администратору";
			break;
		case 'badcode':
			echo "Вам пришло ошибочное сообщение, обратитесь к администратору";
			break;
	}
?>
</h3>