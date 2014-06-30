<?php
/* @var $this DisciplinaController */
/* @var $data Disciplina */
?>

<div class="view">
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('disciplina')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->disciplina), array('view', 'id' => $data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periodo')); ?>:</b>
	<?php echo CHtml::encode($data->periodo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('duracao_id'));?>:</b>
	<?php echo CHtml::encode($data->duracao->duracao); ?>
	<br />

</div>