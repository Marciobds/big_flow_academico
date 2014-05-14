<?php
/* @var $this ProfessorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Professors',
);

$this->menu=array(
	array('label'=>'Cadastrar Professor', 'url'=>array('create')),
	array('label'=>'Gerenciar Professor', 'url'=>array('admin')),
);
?>

<h1>Professors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
