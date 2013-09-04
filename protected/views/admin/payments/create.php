<?php
/* @var $this PaymentsController */

$this->breadcrumbs=array(
	'Payments'=>array('/admin/payments'),
	'Create',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>

<div class="form">
	<?php
		echo CHtml::beginForm(CHtml::normalizeUrl(array('/admin/payments/create')), 'post', array('id'=>'payment-form', 'class'=>'form-horizontal'));
		echo CHtml::hiddenField('Payment[account_id]', '0', array('id'=>'account_id'));
	?>
	
	<?php
		echo CHtml::numberField('Payment[summ]', 0.00, array('id'=>'summ', 'placeHolder'=>'Рекомендация"', 'class'=>'input-xlarge'));
	?>
	<br />
	
	<?php
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'name'=>'account',
				'source'=>Yii::app()->createUrl('/admin/payments/autocomplete'),
				'options'=>array(
					'minLength'=>2,
					'showAnim'=>'fold',
					'select' =>'js: function(event, ui) {
						this.value = ui.item.label;
						$(\'#account_id\').val(ui.item.id);
						return false;
					}',
				),
				'htmlOptions'=>array(
					'placeHolder'=>'Email или сайт',
					'class'=>'input-xlarge',
					),
			));
		?>
		<br />
		
		<?php echo CHtml::submitButton('Зачислить!', array('name'=>'', 'class'=>'btn')); ?>

	<?php echo CHtml::endForm(); ?>
</div>