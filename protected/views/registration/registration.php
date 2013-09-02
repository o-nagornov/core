<?php
/* @var $this RegistrationController */

$this->breadcrumbs=array(
	'Регистрация',
);
?>
<div class="signin">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'user-form',
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array(
							 'class'=>'form-horizontal'
							),
	)); ?>
		<div class="row">
			<div class="span1"></div>
			<div class="span3">
				<p class="note">Поля, отмеченные <span class="required">*</span> - обязательные</p>
				<?php echo $form->errorSummary($model); ?>
			</div>
		</div>
		<div class="row">
			<div class="span3">
				<div class="control-group">
					<?php echo $form->labelEx($model,'login', array('class'=>'control-label')); ?>
					<div class="controls">
						<?php echo $form->textField($model,'login',array('size'=>45,'maxlength'=>45)); ?>
						<?php echo $form->error($model,'login'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<?php echo $form->labelEx($model,'email', array('class'=>'control-label')); ?>
					<div class="controls">
						<?php echo $form->textField($model,'email', array('size'=>45,'maxlength'=>45)); ?>
						<?php echo $form->error($model,'email'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<?php echo $form->labelEx($model,'password', array('class'=>'control-label')); ?>
					<div class="controls">	  
						<?php echo $form->textField($model,'password',array('size'=>45,'maxlength'=>45)); ?>
						<?php echo $form->error($model,'password'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<?php echo CHtml::label('Повторите пароль', 'repeat_password', array('class'=>'control-label')); ?>
					<div class="controls">	  
						<?php echo CHtml::textField('repeat_password', '', array('size'=>45,'maxlength'=>45)); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="span4">
				<div class="control-group">
					<div class="controls">
						<?php echo CHtml::submitButton('Зарегистрироваться', array('class'=>'btn')); ?>
					</div>
				</div>
			</div>
		</div>
		
	<?php $this->endWidget(); ?>
</div>