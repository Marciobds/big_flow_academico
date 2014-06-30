<?php
/* @var $this DisciplinaController */
/* @var $model Disciplina */

$this->breadcrumbs=array(
	'Disciplinas'=>array('admin'),
	'Cadastrar',
);

$this->menu=array(
	array('label'=>'Listar Disciplinas', 'url'=>array('admin')),
);
?>

<h2>Cadastro de Disciplina</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>