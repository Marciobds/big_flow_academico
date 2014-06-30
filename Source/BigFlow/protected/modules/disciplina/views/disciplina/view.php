<?php
/* @var $this DisciplinaController */
/* @var $model Disciplina */

$this->breadcrumbs=array(
	'Disciplinas'=>array((Yii::app()->user->isProfessor())?'index':'admin'),
	$model->disciplina,
);

$this->menu=array(
	array('label'=>'Listar Disciplinas', 'url'=>array('admin'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Listar Disciplinas', 'url'=>array('index'), 'visible'=>Yii::app()->user->isProfessor()),
	array('label'=>'Cadastrar Disciplina', 'url'=>array('create'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Atualizar Disciplina', 'url'=>array('update', 'id'=>$model->id), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Deletar Disciplina', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Você tem certeza que deseja deletar este item?'), 'visible'=>Yii::app()->user->isAdmin()),
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

<h2>Visualizando Disciplina: <?php echo $model->disciplina; ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'periodo',
		'duracao.duracao',
		array(
	        'name' => 'professor_id',
            'value' => $model->professor->nome,
		),
	),
)); ?>
<br />

<h3>Alunos matrículados</h3>
<?php if(Yii::app()->user->isAdmin()) { ?>
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
		'dataProvider'=>$model_aluno->searchNotEnrolled($model->id),
		'columns'=>array(
			'nome',
			'matricula',
			array(
				'class'=>'CButtonColumn',
				'template'=>'{add}',
				'buttons' => array(
					'add'=>array(
						'label' => 'Adicionar',
						'url'=>'$this->grid->controller->createUrl("/disciplina/disciplina/add_aluno", array("aluno_id"=>$data->primaryKey, "disciplina_id" => '.$model->id.'))',
					)
				)
			),
		),
	));
}
?>
<?php } ?>
<?php $this->renderPartial('_alunos',array(
	'data'=>$model
)); ?>
<?php if(Yii::app()->user->isProfessor()) { ?>
	<br />
	<h3>Atividades da disciplina</h3>
	<?php echo CHtml::link('Adicionar atividade', array('atividade/create', 'disciplina_id'=>$model->id)); ?>

	<?php
		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'atividades-grid',
			'dataProvider'=>$atividadesProvider,
			'summaryText'=>'Atividades aplicadas: {count}',
			'columns'=>array(
				'atividade',
				'peso',
				array(
					'name'=>'data',
					'value'=>'Yii::app()->dateFormatter->format("dd/MM/y",strtotime($data->data))'
				),
				array(
					'class'=>'CButtonColumn',
					'template'=>'{view}{update}{delete}',
					'buttons' => array(
						'view'=>array(
							'url'=>'$this->grid->controller->createUrl("/disciplina/atividade/view", array("id"=>$data->primaryKey))',
						),
						'update'=>array(
							'url'=>'$this->grid->controller->createUrl("/disciplina/atividade/update", array("id"=>$data->primaryKey))',
						),
						'delete'=>array(
							'url'=>'$this->grid->controller->createUrl("/disciplina/atividade/delete", array("id"=>$data->primaryKey))',
						)
					)
				),
			),
		));
	?>
	<br />
	<h3>Aulas ministradas</h3>
	<?php echo CHtml::link('Adicionar aula', array('aula/create', 'disciplina_id'=>$model->id)); ?>

	<?php
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'atividades-grid',
		'dataProvider'=>$aulasProvider,
		'summaryText'=>'Aulas Ministradas: {count}',
		'columns'=>array(
			'aula',
			array(
				'name'=>'data',
				'value'=>'Yii::app()->dateFormatter->format("dd/MM/y",strtotime($data->data))'
			),
			array(
				'class'=>'CButtonColumn',
				'template'=>'{view}{update}{delete}',
				'buttons' => array(
					'view'=>array(
						'url'=>'$this->grid->controller->createUrl("/disciplina/aula/view", array("id"=>$data->primaryKey))',
					),
					'update'=>array(
						'url'=>'$this->grid->controller->createUrl("/disciplina/aula/update", array("id"=>$data->primaryKey))',
					),
					'delete'=>array(
						'url'=>'$this->grid->controller->createUrl("/disciplina/aula/delete", array("id"=>$data->primaryKey))',
					)
				)
			),
		),
	));
}