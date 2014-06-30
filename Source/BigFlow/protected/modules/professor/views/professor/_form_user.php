<?php
/* @var $this UsuarioController */
/* @var $usuario Usuario */
/* @var $form CActiveForm */
?>

<fieldset class="row">
	<?php echo $form->labelEx($usuario,'email'); ?>
	<?php echo $form->textField($usuario,'email'); ?>
	<?php echo $form->error($usuario,'email'); ?>
</fieldset>

<fieldset class="row">
	<?php echo $form->labelEx($usuario,'senha'); ?>
	<?php echo $form->passwordField($usuario,'senha'); ?>
	<?php echo $form->error($usuario,'senha'); ?>
</fieldset>