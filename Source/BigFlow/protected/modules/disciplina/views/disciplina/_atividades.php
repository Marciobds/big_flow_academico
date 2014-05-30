<?php foreach($data->atividades as $atividade): ?>
	<div class="view">

	<b><?php echo CHtml::encode('Atividade'); ?>:</b>
	<?php echo CHtml::encode($atividade->atividade); ?>
	
	<?php echo CHtml::link(CHtml::encode('Deletar'), array('delete', 'atividade_id' => $atividade->id, 'disciplina_id' => $data->id)); ?>
	<br />

	</div>
<?php endforeach; ?>