<?php
/* @var $this AulaController */
/* @var $model Aula */

$this->breadcrumbs=array(
	'Aulas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Aulas', 'url'=>array('disciplina/view', 'id' => $model->disciplina_id)),
	array('label'=>'Cadastrar Aulas', 'url'=>array('create', 'disciplina_id' => $model->disciplina_id)),
	array('label'=>'Atualizar Aula', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Deletar Aula', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Você tem certeza que deseja deletar este item?')),
);
?>

<h2>Visualizando Aula #<?php echo $model->id; ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'data',
		'descricao',
		'disciplina_id',
	),
)); ?>
