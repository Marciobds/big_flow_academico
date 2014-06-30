<?php

class AulaController extends Controller
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
			array('allow',
				'actions'=>array('create', 'view', 'update', 'delete', 'presente', 'ausente'),
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

		$model = $this->loadModel($id);

		$dataProvider = new CActiveDataProvider('Aula', array(
			'criteria'=>array(
			    'with'=>array(
			        'frequencias' => array('with' => array('aluno'))
			    ),
			    'condition' => 't.id='.$model->id,
			),
		));

		$this->render('view',array(
			'model'=>$model,
			'dataProvider' => $dataProvider
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($disciplina_id)
	{
		$model=new Aula;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Aula']))
		{
			$model->attributes=$_POST['Aula'];
			if($model->save()){
				$criteria = new CDbCriteria;
				$criteria->addCondition('t.id = '. $disciplina_id);
				$criteria->with = array('alunos');
				$disciplina = Disciplina::model()->find($criteria);
				foreach($disciplina->alunos as $aluno) {
					$frequencia = new Frequencia;
					$frequencia->aluno_id = $aluno->id;
					$frequencia->aula_id = $model->id;
					$frequencia->disciplina_id = $disciplina_id;
					$frequencia->presente = 0;
					$frequencia->save();
					unset($frequencia);
				}
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'disciplina'=>Disciplina::model()->findByPk($disciplina_id)
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

		if(isset($_POST['Aula']))
		{
			$model->attributes=$_POST['Aula'];
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
		$model=$this->loadModel($id);
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('disciplina/disciplina/view'. 'id' => $model->disciplina_id));
	}

	/**
	 * Adds a particular aluno presence to a aula.
	 * If additions is successful, the browser will be redirected to the 'view' page.
	 * @param integer $aluno_id the ID of the model aluno to aula, $aula_id the ID of the model aula to add aluno to
	 */
	public function actionPresente($aluno_id, $aula_id)
	{
		$criteria = new CDbCriteria;
		$criteria->addCondition('aula_id='. $aula_id);
		$criteria->addCondition('aluno_id='. $aluno_id);
		$model = Frequencia::model()->find($criteria);
		if($model)
		{
			$model->presente = 1;
			$model->save($model);
		}
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view', 'id' => $aula_id));
	}

	/**
	 * Deletes a particular aluno presence from a particular aula.
	 * If deletion is successful, the browser will be redirected to the 'view' page.
	 * @param integer $aluno_id the ID of the model aluno to aula, $aula_id the ID of the model aula to add aluno to
	 */
	public function actionAusente($aluno_id, $aula_id)
	{
		$criteria = new CDbCriteria;
		$criteria->addCondition('aula_id = '. $aula_id);
		$criteria->addCondition('aluno_id = '. $aluno_id);
		$model = Frequencia::model()->find($criteria);
		
		if($model)
		{
			$model->presente = 0;
			$model->save($model);
		}
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view', 'id' => $aula_id));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Aula the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Aula::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Aula $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='aula-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
