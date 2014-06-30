<?php

class DisciplinaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin', 'create', 'update', 'view', 'delete', 'add_aluno', 'delete_aluno'),
				'expression'=>'Yii::app()->user->isAdmin()',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index', 'view', 'aluno'),
				'expression'=>'Yii::app()->user->isProfessor()',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{

		$dataProvider = new CActiveDataProvider('Disciplina', array(
			'criteria'=>array(
			    'with'=>array(
			        'alunos'
			    ),
			    'condition' => 't.id='.$id
			),
		));

		$model_aluno = new Aluno('search');
		$model_aluno->unsetAttributes();  // clear any default values
		if(isset($_GET['Aluno']))
			$model_aluno->attributes=$_GET['Aluno'];

		$atividadesProvider = new CActiveDataProvider('Atividade', array(
			'criteria'=>array(
			    'condition' => 't.disciplina_id='.$id
			),
		));

		$aulasProvider = new CActiveDataProvider('Aula', array(
			'criteria'=>array(
			    'condition' => 't.disciplina_id='.$id
			),
		));

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'dataProvider'=>$dataProvider,
			'atividadesProvider'=>$atividadesProvider,
			'aulasProvider'=>$aulasProvider,
			'model_aluno'=>$model_aluno,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Disciplina;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Disciplina']))
		{
			$model->attributes=$_POST['Disciplina'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Disciplina']))
		{
			$model->attributes=$_POST['Disciplina'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$criteria = new CDbCriteria;
		$criteria->addCondition('professor_id = '. Yii::app()->user->getProfessor()->id);
		$dataProvider=new CActiveDataProvider('Disciplina', array('criteria'=>$criteria));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Disciplina('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Disciplina']))
			$model->attributes=$_GET['Disciplina'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Adds a particular aluno to a particular disciplina.
	 * If additions is successful, the browser will be redirected to the 'view' page.
	 * @param integer $aluno_id the ID of the model aluno to disciplina, $disciplina_id the ID of the model disciplina to add aluno to
	 */
	public function actionAdd_Aluno($aluno_id, $disciplina_id)
	{
		$criteria = new CDbCriteria;
		$criteria->addCondition('disciplina_id = '. $disciplina_id);
		$criteria->addCondition('aluno_id = '. $aluno_id);
		$model = Matricula::model()->find($criteria);
		if(!$model)
		{
			$matricula = new Matricula;
			if(Aluno::model()->findByPk($aluno_id) && Disciplina::model()->find($disciplina_id)) {
				$matricula->aluno_id = $aluno_id;
				$matricula->disciplina_id = $disciplina_id;
				if($matricula->save($matricula)) {
					$criteria = new CDbCriteria;
					$criteria->addCondition('disciplina_id = '. $matricula->disciplina_id);
					$aulas = Aula::model()->findAll($criteria);
					foreach($aulas as $aula) {
						$frequencia = new Frequencia;
						$frequencia->aluno_id = $matricula->aluno_id;
						$frequencia->aula_id = $aula->id;
						$frequencia->disciplina_id = $matricula->disciplina_id;
						$frequencia->presente = 0;
						$frequencia->save();
		
					}
					$atividades = Atividade::model()->findAll($criteria);
					foreach($atividades as $atividade) {
						$nota = new Nota;
						$nota->aluno_id = $matricula->aluno_id;
						$nota->atividade_id = $atividade->id;
						$nota->disciplina_id = $matricula->disciplina_id;
						$nota->nota = 0;
						$nota->save();
		
					}
				}
			}
		}
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view', 'id' => $disciplina_id));
	}

	/**
	 * Deletes a particular aluno from a particular disciplina.
	 * If deletion is successful, the browser will be redirected to the 'view' page.
	 * @param integer $aluno_id the ID of the model aluno to disciplina, $disciplina_id the ID of the model disciplina to add aluno to
	 */
	public function actionDelete_Aluno($aluno_id, $disciplina_id)
	{
		$criteria = new CDbCriteria;
		$criteria->addCondition('disciplina_id = '. $disciplina_id);
		$criteria->addCondition('aluno_id = '. $aluno_id);
		$model = Matricula::model()->find($criteria);
		if($model) {
			$model->delete();
			Frequencia::model()->deleteAll($criteria);
		}
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view', 'id' => $disciplina_id));
	}

	public function actionAluno($aluno_id, $disciplina_id)
	{
		$aluno = Aluno::model()->findByPk($aluno_id);
		$disciplina = Disciplina::model()->findByPk($disciplina_id);
		
		$notasProvider = new CActiveDataProvider('Nota', array(
			'criteria'=>array(
			    'condition' => 't.disciplina_id='.$disciplina_id,
			    'condition' => 't.aluno_id='.$aluno_id
			),
		));

		$frequenciaProvider = new CActiveDataProvider('Frequencia', array(
			'criteria'=>array(
			    'condition' => 't.disciplina_id='.$disciplina_id,
			    'condition' => 't.aluno_id='.$aluno_id
			),
		));

		$this->render('aluno',array(
			'aluno'=>$aluno,
			'disciplina'=>$disciplina,
			'notasProvider'=>$notasProvider,
			'frequenciaProvider'=>$frequenciaProvider
		));

	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Disciplina the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Disciplina::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Disciplina $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='disciplina-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
