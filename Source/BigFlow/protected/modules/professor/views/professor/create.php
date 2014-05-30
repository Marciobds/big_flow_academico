<?php
/* @var $this ProfessorController */
/* @var $model Professor */

$this->breadcrumbs=array(
	'Professors'=>array('index'),
	'Cadastrar',
);

$this->menu=array(
	array('label'=>'Listar Professores', 'url'=>array('index')),
	array('label'=>'Gerenciar Professor', 'url'=>array('admin')),
);
?>

<h1>Create Professor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>