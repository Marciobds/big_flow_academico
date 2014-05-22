<?php
/* @var $this DisciplinaController */
/* @var $model Disciplina */

$this->breadcrumbs=array(
	'Disciplinas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Disciplina', 'url'=>array('index')),
	array('label'=>'Cadastrar Disciplina', 'url'=>array('create')),
	array('label'=>'Atualizar Disciplina', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Deletar Disciplina', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Você tem certeza que deseja deletar este item?')),
	array('label'=>'Gerenciar Disciplina', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#disciplina-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Visualizando Disciplina #<?php echo $model->id; ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'disciplina',
		'periodo',
		'duracao.duracao',
		array(
	        'name' => 'professor_id',
            'value' => $model->professor->nome,
		),
	),
)); ?>
<hr />

<h3>Alunos matrículados</h3>
<?php echo CHtml::link('Adicionar aluno','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search_alunos',array(
	'model'=>$model,
	'model_aluno'=>$model_aluno,
)); ?>
</div><!-- search-form -->

<?php if (isset($_GET['Aluno'])) {
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'alunos-grid',
		'dataProvider'=>$model_aluno->searchUnenrolled($model->id),
		'columns'=>array(
			'id',
			'nome',
			'matricula',
			array(
				'class'=>'CButtonColumn',
				'template'=>'{add}',
				'buttons' => array(
					'add'=>array(
						'url'=>'$this->grid->controller->createUrl("/disciplina/disciplina/add_aluno", array("aluno_id"=>$data->primaryKey, "disciplina_id" => '.$model->id.'))',
					)
				)
			),
		),
	));
}
?>

<?php $this->widget('zii.widgets.CListView', array(
	'id'=>'disciplina-grid',
	'dataProvider'=>$dataProvider,
	'itemView'=>'_alunos',
	'template'=>'{items}'
)); ?>