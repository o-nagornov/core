<?php
/* @var $this InstallController */

$this->breadcrumbs=array(
	'Install',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>

<?php
	echo CHtml::link('DB creation', array('/install/databaseCreation', 'account'=>'1'));

?>