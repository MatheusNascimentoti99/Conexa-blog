<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

?>

<div id="header">
	<div id="logo" class="text-primary"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	
</div>
<div class="position-absolute text-center top-50 start-50 translate-middle">
	<h2 class="text-primary">Login</h2>
	<div class="card row items-center justify-center" style="width: 30rem;">
		<div class="card-body">
			
			<p>Por favor, preencha os campos com seu usuário e senha:</p>
			
			<div class="form">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'login-form',
					'enableClientValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
				)); ?>
				
					<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>
				
					<div class="row">
						<?php echo $form->labelEx($model,'username'); ?>
						<?php echo $form->textField($model,'username'); ?>
						<?php echo $form->error($model,'username'); ?>
					</div>
				
					<div class="row">
						<?php echo $form->labelEx($model,'password'); ?>
						<?php echo $form->passwordField($model,'password'); ?>
						<?php echo $form->error($model,'password'); ?>
					</div>
				
					<div class="column rememberMe">
						<?php echo $form->checkBox($model,'rememberMe'); ?>
						<?php echo $form->label($model,'rememberMe'); ?>
						<?php echo $form->error($model,'rememberMe'); ?>
					</div>
				
					<div class="row buttons">
						<?php echo CHtml::submitButton('Login'); ?>
					</div>
				
				<?php $this->endWidget(); ?>
			</div><!-- form -->
		</div>
	</div>

</div>
