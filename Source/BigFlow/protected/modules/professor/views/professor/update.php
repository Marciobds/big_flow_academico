<?php
/* @var $this ProfessorController */
/* @var $model Professor */

$this->breadcrumbs=array(
	'Professors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Atualizar',
);

$this->menu=array(
	array('label'=>'Listar Professor', 'url'=>array('index')),
	array('label'=>'Cadastrar Professor', 'url'=>array('create')),
	array('label'=>'Visualizar Professor', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerenciar Professor', 'url'=>array('admin')),
);
?>

<h2>Atualizando Professor <?php echo $model->id; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>