<?php
/* @var $this AlunoController */
/* @var $model Aluno */

$this->breadcrumbs=array(
	'Disciplinas'=>array('disciplina/index'),
	$disciplina->disciplina=>array('disciplina/view', 'id'=>$disciplina->id),
	$aluno->nome,
);

$this->menu=array(
	array('label'=>'Listar Alunos', 'url'=>array('disciplina/view', 'id'=>$disciplina->id)),
);
?>

<h2>Visualizando Aluno: <?php echo $aluno->nome; ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$aluno,
	'attributes'=>array(
		'id',
		'nome',
		'matricula',
	),
)); ?>
<br />

<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'notas-grid',
	'dataProvider'=>$notasProvider,
	'summaryText'=>'',
	'columns'=>array(
		array(
			'name'=>'atividade',
			'value'=>'$data->atividade->atividade'
		),
		array(
			'name'=>'data',
			'value'=>'Yii::app()->dateFormatter->format("dd/MM/y",strtotime($data->atividade->data))'
		),
		array(
			'name'=>'peso',
			'value'=>'$data->atividade->peso'
		),
		'nota',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
			'buttons' => array(
				'update'=>array(
					'url'=>'$this->grid->controller->createUrl("/disciplina/atividade/nota", array("aluno_id"=>$data->aluno_id, "atividade_id" => $data->atividade_id))',
				),
			)
		),
	),
));
?>
<div class="view top-zero">
	<b>Média final:</b>
	<?php 
	$media = 0;
	foreach($notasProvider->data as $nota) {
		$media += ($nota->nota * $nota->atividade->peso / 10);
	}
	echo round($media, 2);
	?>
</div>
<br />

<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'frequencia-grid',
	'dataProvider'=>$frequenciaProvider,
	'summaryText'=>'',
	'columns'=>array(
		array(
			'name'=>'aula',
			'value'=>'$data->aula->aula'
		),
		array(
			'name'=>'data',
			'value'=>'Yii::app()->dateFormatter->format("dd/MM/y",strtotime($data->aula->data))'
		),
		array(
			'name'=>'presente',
			'value'=>'($data->presente ? "presente" : "ausente")'
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{presente}{ausente}',
			'buttons' => array(
				'presente'=>array(
					'url'=>'$this->grid->controller->createUrl("/disciplina/aula/presente", array("aluno_id"=>$data->aluno_id, "aula_id" => $data->aula_id))',
					'visible' => '!$data->presente'
				),
				'ausente'=>array(
					'url'=>'$this->grid->controller->createUrl("/disciplina/aula/ausente", array("aluno_id"=>$data->aluno_id, "aula_id" => $data->aula_id))',
					'visible' => '$data->presente'
				),
			)
		),
	),
));
?>
<div class="view top-zero">
	<b>Frequência:</b>
	<?php
	$presencas = 0;
	foreach($frequenciaProvider->data as $aula) {
		$presencas += $aula->presente;
	}
	echo round($presencas*100/$frequenciaProvider->totalItemCount, 2) . '%';
	?>
</div>