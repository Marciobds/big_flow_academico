<?php
/* @var $this AtividadeController */
/* @var $model Atividade */

$this->breadcrumbs=array(
	'Disciplinas'=>array('disciplina/index'),
	'Atividades'=>array('index', 'disciplina_id'=>$disciplina->id),
	'Cadastrar',
);

$this->menu=array(
	array('label'=>'Listar Atividads', 'url'=>array('disciplina/view', 'id'=>$disciplina->id)),
);
?>

<h1>Create Atividade</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'disciplina'=>$disciplina)); ?>