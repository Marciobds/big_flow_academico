<?php
/* @var $this AulaController */
/* @var $model Aula */

$this->breadcrumbs=array(
	'Disciplinas'=>array('disciplina/index'),
	'Aulas'=>array('index', 'disciplina_id'=>$disciplina->id),
	'Cadastrar',
);

$this->menu=array(
	array('label'=>'Listar Aulas', 'url'=>array('index')),
);
?>

<h1>Create Aula</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'disciplina'=>$disciplina)); ?>