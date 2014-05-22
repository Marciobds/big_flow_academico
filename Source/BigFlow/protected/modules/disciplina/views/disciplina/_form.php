<?php
/* @var $this DisciplinaController */
/* @var $model Disciplina */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'disciplina-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<span class="note">Campos com <span class="required">obrigatório</span> são obrigatórios.</span>

	<?php echo $form->errorSummary($model); ?>

	<fieldset class="row">
		<?php echo $form->labelEx($model,'disciplina'); ?>
		<?php echo $form->textField($model,'disciplina',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'disciplina'); ?>
	</fieldset>

	<fieldset class="row">
		<?php echo $form->labelEx($model,'periodo'); ?>
		<?php echo $form->textField($model,'periodo',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'periodo'); ?>
	</fieldset>

	<fieldset class="row">
		<?php echo $form->labelEx($model,'duracao_id'); ?>
		<?php echo $form->dropDownList($model, 'duracao_id', CHtml::listData(Duracao::model()->findAll(), 'id', 'duracao')); ?>
		<?php echo $form->error($model,'duracao_id'); ?>
	</fieldset>

	<fieldset class="row">
		<?php echo $form->labelEx($model,'professor_id'); ?>
		<?php echo $form->dropDownList($model, 'professor_id', CHtml::listData(Professor::model()->findAll(), 'id', 'nome')); ?>
		<?php echo $form->error($model,'professor_id'); ?>
	</fieldset>

	<fieldset class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar'); ?>
	</fieldset>

<?php $this->endWidget(); ?>

</div><!-- form -->