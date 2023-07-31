<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

?>

<div class="position-absolute text-center top-50 start-50 translate-middle">
	<h1 class="text-orange">Login</h1>
	<div class="row items-center justify-center mt-5" style="width: 30rem;">
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
						<?php echo CHtml::submitButton('Login', array('class' => 'btn btn-primary')); ?>
					</div>
				
				<?php $this->endWidget(); ?>
			</div><!-- form -->
		</div>
	</div>

</div>
