<?php
/* @var $this DisciplinaController */
/* @var $model Disciplina */

$this->breadcrumbs=array(
	'Disciplinas'=>array('index'),
	'Cadastrar',
);

$this->menu=array(
	array('label'=>'Listar Disciplinas', 'url'=>array('index')),
	array('label'=>'Gerenciar Disciplina', 'url'=>array('admin')),
);
?>

<h1>Create Disciplina</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>