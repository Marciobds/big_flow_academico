<?php
/* @var $this DisciplinaController */
/* @var $model Disciplina */

$this->breadcrumbs=array(
	'Disciplinas'=>array('admin'),
	$model->disciplina=>array('view','id'=>$model->id),
	'Atualizar',
);

$this->menu=array(
	array('label'=>'Listar Disciplinas', 'url'=>array('admin')),
	array('label'=>'Cadastrar Disciplina', 'url'=>array('create')),
	array('label'=>'Visualizar Disciplina', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h2>Atualizando Disciplina: <?php echo $model->disciplina; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>