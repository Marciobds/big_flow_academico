<?php
/* @var $this DisciplinaController */
/* @var $model Disciplina */

$this->breadcrumbs=array(
	'Disciplinas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Atualizar',
);

$this->menu=array(
	array('label'=>'Listar Disciplina', 'url'=>array('index')),
	array('label'=>'Cadastrar Disciplina', 'url'=>array('create')),
	array('label'=>'Visualizar Disciplina', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerenciar Disciplina', 'url'=>array('admin')),
);
?>

<h2>Atualizando Disciplina <?php echo $model->id; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>