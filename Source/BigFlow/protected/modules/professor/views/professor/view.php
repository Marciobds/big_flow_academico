<?php
/* @var $this ProfessorController */
/* @var $model Professor */

$this->breadcrumbs=array(
	'Professors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Professores', 'url'=>array('index')),
	array('label'=>'Cadastrar Professor', 'url'=>array('create')),
	array('label'=>'Atualizar Professor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Deletar Professor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Você tem certeza que deseja deletar este item?')),
	array('label'=>'Gerenciar Professor', 'url'=>array('admin')),
);
?>

<h2>Visualizando Professor #<?php echo $model->id; ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
	),
)); ?>
