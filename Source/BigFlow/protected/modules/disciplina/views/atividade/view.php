<?php
/* @var $this AtividadeController */
/* @var $model Atividade */

$this->breadcrumbs=array(
	'Disciplinas'=>array('disciplina/index'),
	'Atividades'=>array('index', 'disciplina_id'=>$model->disciplina_id),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Atividades', 'url'=>array('disciplina/view', 'id' => $model->disciplina_id)),
	array('label'=>'Cadastrar Atividade', 'url'=>array('create', 'disciplina_id' => $model->disciplina_id)),
	array('label'=>'Atualizar Atividade', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Deletar Atividade', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Você tem certeza que deseja deletar este item?')),
);
?>

<h2>Visualizando Atividade #<?php echo $model->id; ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'atividade',
		'descricao',
		'data',
		'peso',
		'disciplina_id',
	),
)); ?>

<br />
<h2>Notas dos Alunos</h2>
<?php $this->widget('zii.widgets.CListView', array(
	'id'=>'notas-grid',
	'dataProvider'=>$dataProvider,
	'itemView'=>'_notas',
	'template'=>'{items}'
)); ?>