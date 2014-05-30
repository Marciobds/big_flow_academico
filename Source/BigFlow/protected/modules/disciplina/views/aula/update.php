<?php
/* @var $this AulaController */
/* @var $model Aula */

$this->breadcrumbs=array(
	'Disciplinas'=>array('disciplina/index'),
	'Aulas'=>array('index', 'disciplina_id'=>$model->disciplina_id),
	$model->data=>array('view','id'=>$model->id),
	'Atualizar',
);

$this->menu=array(
	array('label'=>'Listar Aulas', 'url'=>array('disciplina/view', 'id' => $model->disciplina_id)),
	array('label'=>'Cadastrar Aula', 'url'=>array('create', 'disciplina_id' => $model->disciplina_id)),
	array('label'=>'Visualizar Aula', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h2>Atualizando Aula <?php echo $model->id; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>