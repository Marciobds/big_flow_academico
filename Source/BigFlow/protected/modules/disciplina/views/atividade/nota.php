<?php
/* @var $this AtividadeController */
/* @var $model Atividade */

$this->breadcrumbs=array(
	'Disciplinas'=>array('disciplina/index'),
	'Atividades'=>array('view', 'id'=>$model->atividade_id),
	'Cadastrar',
);

$this->menu=array(
	array('label'=>'Listar Atividads', 'url'=>array('disciplina/view', 'id'=>$model->disciplina_id)),
);
?>

<h1>Create Atividade</h1>

<?php $this->renderPartial('_form_nota', array('model'=>$model)); ?>