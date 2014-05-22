<?php
/* @var $this DisciplinaController */
/* @var $model Disciplina */
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
		<?php echo $form->label($model,'disciplina'); ?>
		<?php echo $form->textField($model,'disciplina',array('size'=>60,'maxlength'=>100)); ?>
	</fieldset>

	<fieldset class="row">
		<?php echo $form->label($model,'periodo'); ?>
		<?php echo $form->textField($model,'periodo',array('size'=>10,'maxlength'=>10)); ?>
	</fieldset>

	<fieldset class="row">
		<?php echo $form->label($model,'duracao_id'); ?>
		<?php echo $form->dropDownList($model, 'duracao_id', CHtml::listData(Duracao::model()->findAll(), 'id', 'duracao'), array('empty'=>'Todos')); ?>
	</fieldset>

	<fieldset class="row">
		<?php echo $form->label($model,'professor_id'); ?>
		<?php echo $form->dropDownList($model, 'professor_id', CHtml::listData(Professor::model()->findAll(), 'id', 'nome'), array('empty'=>'Todos')); ?>
	</fieldset>

	<fieldset class="row buttons">
		<?php echo CHtml::submitButton('Filtrar'); ?>
	</fieldset>

<?php $this->endWidget(); ?>

</div><!-- search-form -->