<?php foreach($data->frequencias as $frequencia): ?>
	<div class="view <?php echo $frequencia->presente ? 'presente' : 'ausente'; ?>">
	<?php echo CHtml::encode($frequencia->aluno->nome); ?>
	
	<?php 
	if($frequencia->presente) {
		echo CHtml::link(CHtml::encode('Ausente'), array('ausente', 'aluno_id' => $frequencia->aluno->id, 'aula_id' => $data->id));
	} else {
		echo CHtml::link(CHtml::encode('Presente'), array('presente', 'aluno_id' => $frequencia->aluno->id, 'aula_id' => $data->id));
	}
	?>
	</div>
<?php endforeach; ?>