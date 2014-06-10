<?php foreach($data->frequencias as $aluno): ?>
	<div class="view">
	<?php echo CHtml::encode($aluno->nome); ?>
	
	<?php echo CHtml::link(CHtml::encode('Presente'), array('presente', 'aluno_id' => $aluno->id, 'aula_id' => $data->id)); ?>
	<?php echo CHtml::link(CHtml::encode('Ausente'), array('ausente', 'aluno_id' => $aluno->id, 'aula_id' => $data->id)); ?>
	<br />

	</div>
<?php endforeach; ?>