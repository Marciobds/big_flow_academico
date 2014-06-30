<?php
/* @var $this AtividadeController */
/* @var $model Atividade */

$this->breadcrumbs=array(
	'Disciplinas'=>array('disciplina/index'),
	'Atividades'=>array('disciplina/view', 'id'=>$model->disciplina_id),
	$model->atividade->atividade=>array('view', 'id'=>$model->atividade_id),
	'Cadastrar nota',
);

$this->menu=array(
	array('label'=>'Listar Atividades', 'url'=>array('disciplina/view', 'id'=>$model->disciplina_id)),
);
?>

<h2>Cadastro de nota</h2>

<?php $this->renderPartial('_form_nota', array('model'=>$model)); ?>