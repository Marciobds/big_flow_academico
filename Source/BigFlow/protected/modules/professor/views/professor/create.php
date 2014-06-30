<?php
/* @var $this ProfessorController */
/* @var $model Professor */

$this->breadcrumbs=array(
	'Professores'=>array('admin'),
	'Cadastrar',
);

$this->menu=array(
	array('label'=>'Listar Professores', 'url'=>array('admin')),
);
?>

<h2>Cadastro de Professor</h2>

<?php $this->renderPartial('_form', array('model'=>$model, 'usuario' => $usuario)); ?>