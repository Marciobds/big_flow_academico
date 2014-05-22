<?php
/* @var $this DisciplinaController */
/* @var $data Disciplina */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disciplina')); ?>:</b>
	<?php echo CHtml::encode($data->disciplina); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periodo')); ?>:</b>
	<?php echo CHtml::encode($data->periodo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('duracao_id'));?>:</b>
	<?php echo CHtml::encode($data->duracao->duracao); ?>
	<br />
 
 	<b><?php echo CHtml::encode($data->getAttributeLabel('professor_id'));?>:</b>
	<?php echo CHtml::encode($data->professor->nome); ?>
	<br />

</div>