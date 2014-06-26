	<div class="view">
	<table>
		<thead>
			<tr>
				<th>Aluno</th>
				<th>Nota</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($data->notas as $nota): ?>
			<tr>
				<td>
					<?php echo CHtml::encode($nota->aluno->nome); ?>
				</td>
				<td>
					<?php echo CHtml::encode($nota->nota); ?>
				</td>
				<td>
					<?php
					echo CHtml::link(CHtml::encode('Editar nota'), array('nota', 'aluno_id' => $nota->aluno->id, 'atividade_id' => $data->id));
					?>
				</td>
			</tr>
			<?php endforeach; ?>
	</tbody>
	</table>
	</div>