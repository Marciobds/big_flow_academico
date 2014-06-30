<?php
/* @var $this AlunoController */
/* @var $model Aluno */
/* @var $form CActiveForm */
CHtml::$afterRequiredLabel = '<span class="required">obrigatório</span>';
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route .  '&id=' . $model->id),
	'method'=>'get',
)); ?>

	<fieldset class="row">
		<?php echo $form->label($model_aluno,'id'); ?>
		<?php echo $form->textField($model_aluno,'id'); ?>
	</fieldset>

	<fieldset class="row">
		<?php echo $form->label($model_aluno,'nome'); ?>
		<?php echo $form->textField($model_aluno,'nome',array('size'=>60,'maxlength'=>100)); ?>
	</fieldset>

	<fieldset class="row">
		<?php echo $form->label($model_aluno,'matricula'); ?>
		<?php echo $form->textField($model_aluno,'matricula',array('size'=>45,'maxlength'=>45)); ?>
	</fieldset>

	<fieldset class="row buttons">
		<?php echo CHtml::submitButton('Filtrar'); ?>
	</fieldset>

<?php $this->endWidget(); ?>
</div>
