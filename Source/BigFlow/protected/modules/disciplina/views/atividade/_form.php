<?php
/* @var $this AtividadeController */
/* @var $model Atividade */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'atividade-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<span class="note">Campos com <span class="required">obrigatório</span> são obrigatórios.</span>

	<?php echo $form->errorSummary($model); ?>

	<?php
		if(!$model->id){
			echo $form->hiddenField($model,'disciplina_id', array('value' => $disciplina->id));
		}
	?>
	
	<fieldset class="row">
		<?php echo $form->labelEx($model,'atividade'); ?>
		<?php echo $form->textField($model,'atividade',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'atividade'); ?>
	</fieldset>

	<fieldset class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textArea($model,'descricao',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descricao'); ?>
	</fieldset>

	<fieldset class="row">
		<?php echo $form->labelEx($model,'data'); ?>
		<?php echo $form->textField($model,'data'); ?>
		<?php echo $form->error($model,'data'); ?>
	</fieldset>

	<fieldset class="row">
		<?php echo $form->labelEx($model,'peso'); ?>
		<?php echo $form->textField($model,'peso'); ?>
		<?php echo $form->error($model,'peso'); ?>
	</fieldset>

	<fieldset class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar'); ?>
	</fieldset>

<?php $this->endWidget(); ?>

</div><!-- form -->