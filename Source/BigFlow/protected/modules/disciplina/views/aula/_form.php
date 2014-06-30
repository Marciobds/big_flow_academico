<?php
/* @var $this AulaController */
/* @var $model Aula */
/* @var $form CActiveForm */
Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
CHtml::$afterRequiredLabel = '<span class="required">obrigatório</span>';
CHtml::$afterRequiredLabel = '<span class="required">obrigatório</span>';
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'aula-form',
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
		<?php echo $form->labelEx($model,'aula'); ?>
		<?php echo $form->textField($model,'aula'); ?>
		<?php echo $form->error($model,'aula'); ?>
	</fieldset>

	<fieldset class="row">
		<?php echo $form->labelEx($model,'data'); ?>
		<?php $this->widget('CJuiDateTimePicker',array(
                'language'=>'pt-BR',
                'model'=>$model, // Model object
                'attribute'=>'data', // Attribute name
                'mode'=>'date', // Use "time","date" or "datetime" (default)
                'options'=>array( // jquery plugin options
                	'dateFormat'=> 'yy-mm-dd'
                ),
                'htmlOptions'=>array('readonly'=>true), // HTML options
        )); ?>
		<?php echo $form->error($model,'data'); ?>
	</fieldset>

	<fieldset class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textArea($model,'descricao',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descricao'); ?>
	</fieldset>

	<fieldset class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar'); ?>
	</fieldset>

<?php $this->endWidget(); ?>

</div><!-- form -->