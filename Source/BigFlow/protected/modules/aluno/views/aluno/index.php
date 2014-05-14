<?php
/* @var $this AlunoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alunos',
);

$this->menu=array(
	array('label'=>'Cadastrar Aluno', 'url'=>array('create')),
	array('label'=>'Gerenciar Aluno', 'url'=>array('admin')),
);
?>

<h1>Alunos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
