<?php foreach($data->alunos as $aluno): ?>
	<div class="view">

	<b><?php echo CHtml::encode('Nome'); ?>:</b>
	<?php echo CHtml::encode($aluno->nome); ?>
	
	<?php echo CHtml::link(CHtml::encode('Deletar'), array('delete_aluno', 'aluno_id' => $aluno->id, 'disciplina_id' => $data->id)); ?>
	<br />

	</div>
<?php endforeach; ?>