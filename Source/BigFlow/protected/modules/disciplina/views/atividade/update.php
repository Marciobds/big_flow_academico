<?php
/* @var $this AtividadeController */
/* @var $model Atividade */

$this->breadcrumbs=array(
	'Disciplinas'=>array('disciplina/index'),
	'Atividades'=>array('disciplina/view', 'id'=>$model->disciplina_id),
	$model->atividade=>array('view','id'=>$model->id),
	'Atualizar',
);

$this->menu=array(
	array('label'=>'Listar Atividades', 'url'=>array('disciplina/view', 'id' => $model->disciplina_id)),
	array('label'=>'Cadastrar Atividade', 'url'=>array('create', 'disciplina_id' => $model->disciplina_id)),
	array('label'=>'Visualizar Atividade', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h2>Atualizando Atividade: <?php echo $model->atividade; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>