<?php
/* @var $this ProfessorController */
/* @var $model Professor */

$this->breadcrumbs=array(
	'Professores'=>array('admin'),
	$model->nome,
);

$this->menu=array(
	array('label'=>'Listar Professores', 'url'=>array('admin')),
	array('label'=>'Cadastrar Professor', 'url'=>array('create')),
	array('label'=>'Atualizar Professor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Deletar Professor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Você tem certeza que deseja deletar este item?')),
);
?>

<h2>Visualizando Professor: <?php echo $model->nome; ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
	),
)); ?>
