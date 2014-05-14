<?php
/* @var $this AlunoController */
/* @var $model Aluno */

$this->breadcrumbs=array(
	'Alunos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Atualizar',
);

$this->menu=array(
	array('label'=>'Listar Aluno', 'url'=>array('index')),
	array('label'=>'Cadastrar Aluno', 'url'=>array('create')),
	array('label'=>'Visualizar Aluno', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerenciar Aluno', 'url'=>array('admin')),
);
?>

<h2>Atualizando Aluno <?php echo $model->id; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>