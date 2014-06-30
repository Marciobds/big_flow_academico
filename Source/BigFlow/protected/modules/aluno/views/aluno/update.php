<?php
/* @var $this AlunoController */
/* @var $model Aluno */

$this->breadcrumbs=array(
	'Alunos'=>array('aluno/admin'),
	$model->id=>array('view','id'=>$model->id),
	'Atualizar',
);

$this->menu=array(
	array('label'=>'Listar Alunos', 'url'=>array('admin')),
	array('label'=>'Cadastrar Aluno', 'url'=>array('create')),
	array('label'=>'Visualizar Aluno', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h2>Atualizando Aluno: <?php echo $model->nome; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>