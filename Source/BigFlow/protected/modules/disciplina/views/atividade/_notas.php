<link rel="stylesheet" type="text/css" href="/assets/52fe54ad/gridview/styles.css">
<div class="grid-view">
	<table class="items">
		<thead>
			<tr>
				<th>Aluno</th>
				<th>Nota</th>
				<th class="button-column">Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($data->notas as $key=> $nota): ?>
			<tr <?php if($key%2==0) echo 'class="odd"'; ?>>
				<td>
					<?php echo CHtml::encode($nota->aluno->nome); ?>
				</td>
				<td>
					<?php echo CHtml::encode($nota->nota); ?>
				</td>
				<td class="button-column">
					<?php
					echo CHtml::link('<img src="/assets/52fe54ad/gridview/update.png" alt="Editar">', array('nota', 'aluno_id' => $nota->aluno->id, 'atividade_id' => $data->id), array('class' => 'update'));
					?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>