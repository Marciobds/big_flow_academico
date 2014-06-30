<?php
/* @var $this AtividadeController */
/* @var $model Atividade */

$this->breadcrumbs=array(
	'Disciplinas'=>array('disciplina/index'),
	'Atividades'=>array('disciplina/view', 'id'=>$disciplina->id),
	'Cadastrar',
);

$this->menu=array(
	array('label'=>'Listar Atividades', 'url'=>array('disciplina/view', 'id'=>$disciplina->id)),
);
?>

<h2>Cadastro de Atividade</h2>

<?php $this->renderPartial('_form', array('model'=>$model, 'disciplina'=>$disciplina)); ?>