<?php
/* @var $this AlunoController */
/* @var $model Aluno */

$this->breadcrumbs=array(
	'Alunos'=>array('admin'),
	$model->nome,
);

$this->menu=array(
	array('label'=>'Listar Alunos', 'url'=>array('admin')),
	array('label'=>'Cadastrar Aluno', 'url'=>array('create')),
	array('label'=>'Atualizar Aluno', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Deletar Aluno', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Você tem certeza que deseja deletar este item?')),
);
?>

<h2>Visualizando Aluno: <?php echo $model->nome; ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
		'matricula',
	),
)); ?>
