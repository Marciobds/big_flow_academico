<?php
/* @var $this AlunoController */
/* @var $model Aluno */

$this->breadcrumbs=array(
	'Alunos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Aluno', 'url'=>array('index')),
	array('label'=>'Manage Aluno', 'url'=>array('admin')),
);
?>

<h1>Create Aluno</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>