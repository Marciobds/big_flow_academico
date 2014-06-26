<?php

class AtividadeController extends Controller
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
				'actions'=>array('create','update', 'nota'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
		$model = $this->loadModel($id);

		$dataProvider = new CActiveDataProvider('Atividade', array(
			'criteria'=>array(
			    'with'=>array(
			        'notas' => array('with' => array('aluno'))
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
		$model=new Atividade;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Atividade']))
		{
			$model->attributes=$_POST['Atividade'];
			if($model->save()){
				$criteria = new CDbCriteria;
				$criteria->addCondition('t.id = '. $model->disciplina_id);
				$criteria->with = array('alunos');
				$disciplina = Disciplina::model()->find($criteria);
				foreach($disciplina->alunos as $aluno) {
					$nota = new Nota;
					$nota->aluno_id = $aluno->id;
					$nota->atividade_id = $model->id;
					$nota->disciplina_id = $model->disciplina_id;
					$nota->nota = 0;
					$nota->save();
					unset($nota);
				}
				$this->redirect(array('disciplina/view','id'=>$model->disciplina_id));
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

		if(isset($_POST['Atividade']))
		{
			$model->attributes=$_POST['Atividade'];
			if($model->save())
				$this->redirect(array('disciplina/view','id'=>$model->disciplina_id));
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('disciplina/disciplina'));
	}

	public function actionNota($aluno_id, $atividade_id)
	{
    	$criteria = new CDbCriteria;
		$criteria->addCondition('aluno_id = '. $aluno_id);
		$criteria->addCondition('atividade_id = '. $atividade_id);
	    $model = Nota::model()->find($criteria);

	    // uncomment the following code to enable ajax-based validation
	    /*
	    if(isset($_POST['ajax']) && $_POST['ajax']==='nota-nota-form')
	    {
	        echo CActiveForm::validate($model);
	        Yii::app()->end();
	    }
	    */

	    if(isset($_POST['Nota']))
	    {
	        $model->attributes=$_POST['Nota'];
	        if($model->save())
	        {
	        	$this->redirect(array('view','id'=>$model->atividade_id));   
	        }
	    }
	    $this->render('nota',array('model'=>$model));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Atividade the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Atividade::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Atividade $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='atividade-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
