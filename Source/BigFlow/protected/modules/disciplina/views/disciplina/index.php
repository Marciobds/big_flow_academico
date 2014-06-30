<?php
/* @var $this DisciplinaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Minhas Disciplinas',
);

$this->menu=array(
	
);
?>

<h2>Minhas Disciplinas</h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
