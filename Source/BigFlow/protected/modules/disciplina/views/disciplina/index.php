<?php
/* @var $this DisciplinaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Disciplinas',
);

$this->menu=array(
	array('label'=>'Cadastrar Disciplina', 'url'=>array('create')),
	array('label'=>'Gerenciar Disciplina', 'url'=>array('admin')),
);
?>

<h1>Disciplinas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
