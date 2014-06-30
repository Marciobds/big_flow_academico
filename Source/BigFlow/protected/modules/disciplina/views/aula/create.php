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

<h2>Cadastro de Aula</h2>

<?php $this->renderPartial('_form', array('model'=>$model, 'disciplina'=>$disciplina)); ?>