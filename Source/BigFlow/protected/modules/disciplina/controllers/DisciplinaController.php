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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'add_aluno', 'delete_aluno'),
				'users'=>array('admin'),
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
		$dataProvider=new CActiveDataProvider('Disciplina');
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
			$model = new Matricula;
			if(Aluno::model()->findByPk($aluno_id) && Disciplina::model()->find($disciplina_id)) {
				$model->aluno_id = $aluno_id;
				$model->disciplina_id = $disciplina_id;
				$model->save($model);
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
		}
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view', 'id' => $disciplina_id));
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
