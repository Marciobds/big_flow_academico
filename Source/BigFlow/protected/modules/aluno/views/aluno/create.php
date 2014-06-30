<?php
/* @var $this AlunoController */
/* @var $model Aluno */

$this->breadcrumbs=array(
	'Alunos'=>array('aluno/admin'),
	'Cadastrar',
);

$this->menu=array(
	array('label'=>'Listar Alunos', 'url'=>array('admin')),
);
?>

<h2>Cadastro de Aluno</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>