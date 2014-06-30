<link rel="stylesheet" type="text/css" href="/assets/52fe54ad/gridview/styles.css">
<div class="grid-view">
	<table class="items">
		<thead>
			<tr>
				<th>Aluno</th>
				<th class="button-column">Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($data->alunos as $key => $aluno): ?>
			<tr <?php if($key%2==0) echo 'class="odd"'; ?>>
				<td>
					<?php echo CHtml::encode($aluno->nome); ?>
				</td>
				<td class="button-column">
					<?php
					if(Yii::app()->user->isProfessor()) {
						echo CHtml::link('<img src="/assets/52fe54ad/gridview/view.png" alt="Visualizar">', array('aluno', 'aluno_id' => $aluno->id, 'disciplina_id' => $data->id), array('class' => 'view'));
					} else {
						echo CHtml::link('<img src="/assets/52fe54ad/gridview/delete.png" alt="Deletar">', array('delete_aluno', 'aluno_id' => $aluno->id, 'disciplina_id' => $data->id), array('class' => 'delete'));
					}
					?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>