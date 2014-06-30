<?php
/* @var $this ProfessorController */
/* @var $model Professor */
/* @var $form CActiveForm */
CHtml::$afterRequiredLabel = '<span class="required">obrigatório</span>';
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'professor-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<span class="note">Campos com <span class="required">obrigatório</span> são obrigatórios.</span>

	<?php echo $form->errorSummary($model); ?>

	<fieldset class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</fieldset>

	<?php if($model->isNewRecord) $this->renderPartial('_form_user', array('usuario'=>$usuario, 'form' => $form)); ?>

	<fieldset class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar'); ?>
	</fieldset>

<?php $this->endWidget(); ?>

</div><!-- form -->