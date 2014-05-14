<?php
/* @var $this AlunoController */
/* @var $model Aluno */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<fieldset class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</fieldset>

	<fieldset class="row">
		<?php echo $form->label($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>60,'maxlength'=>100)); ?>
	</fieldset>

	<fieldset class="row">
		<?php echo $form->label($model,'matricula'); ?>
		<?php echo $form->textField($model,'matricula',array('size'=>45,'maxlength'=>45)); ?>
	</fieldset>

	<fieldset class="row buttons">
		<?php echo CHtml::submitButton('Filtrar'); ?>
	</fieldset>

<?php $this->endWidget(); ?>

</div><!-- search-form -->