<?php

/**
 * This is the model class for table "disciplinas".
 *
 * The followings are the available columns in table 'disciplinas':
 * @property integer $id
 * @property string $disciplina
 * @property string $periodo
 * @property integer $duracao_id
 *
 * The followings are the available model relations:
 * @property Duracao $duracao
 */
class Disciplina extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'disciplinas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('disciplina, periodo, duracao_id, professor_id', 'required'),
			array('duracao_id', 'numerical', 'integerOnly'=>true),
			array('professor_id', 'numerical', 'integerOnly'=>true),
			array('disciplina', 'length', 'max'=>100),
			array('periodo', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, disciplina, periodo, duracao_id, professor_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'duracao' => array(self::BELONGS_TO, 'Duracao', 'duracao_id'),
			'professor' => array(self::BELONGS_TO, 'Professor', 'professor_id'),
			'alunos' => array(self::MANY_MANY, 'Aluno', 'matriculas(disciplina_id, aluno_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'disciplina' => 'Disciplina',
			'periodo' => 'Período',
			'duracao_id' => 'Duração',
			'professor_id' => 'Professor responsável',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('disciplina',$this->disciplina,true);
		$criteria->compare('periodo',$this->periodo,true);
		$criteria->compare('duracao_id',$this->duracao_id);
		$criteria->compare('professor_id',$this->professor_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Disciplina the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
