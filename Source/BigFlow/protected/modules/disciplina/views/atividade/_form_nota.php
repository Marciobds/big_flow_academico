<?php
/* @var $this NotaController */
/* @var $model Nota */
/* @var $form CActiveForm */
CHtml::$afterRequiredLabel = '<span class="required">obrigatório</span>';
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'nota-nota-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">obrigatório</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'disciplina'); ?>
		<?php echo $form->textField($model,'disciplina', array('value' => $model->disciplina->disciplina, 'disabled' => 'disabled')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'atividade'); ?>
		<?php echo $form->textField($model,'atividade', array('value' => $model->atividade->atividade, 'disabled' => 'disabled')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'aluno'); ?>
		<?php echo $form->textField($model,'aluno', array('value' => $model->aluno->nome, 'disabled' => 'disabled')); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'nota'); ?>
		<?php echo $form->textField($model,'nota'); ?>
		<?php echo $form->error($model,'nota'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->