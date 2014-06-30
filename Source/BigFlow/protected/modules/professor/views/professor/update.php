<?php
/* @var $this ProfessorController */
/* @var $model Professor */

$this->breadcrumbs=array(
	'Professores'=>array('admin'),
	$model->nome=>array('view','id'=>$model->id),
	'Atualizar',
);

$this->menu=array(
	array('label'=>'Listar Professores', 'url'=>array('admin')),
	array('label'=>'Cadastrar Professor', 'url'=>array('create')),
	array('label'=>'Visualizar Professor', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h2>Atualizando Professor: <?php echo $model->nome; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>