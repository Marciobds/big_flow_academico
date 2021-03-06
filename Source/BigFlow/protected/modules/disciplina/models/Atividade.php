<?php

/**
 * This is the model class for table "atividades".
 *
 * The followings are the available columns in table 'atividades':
 * @property integer $id
 * @property string $atividade
 * @property string $descricao
 * @property string $data
 * @property double $peso
 * @property integer $disciplina_id
 *
 * The followings are the available model relations:
 * @property Disciplinas $disciplina
 */
class Atividade extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'atividades';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('atividade, data, disciplina_id', 'required'),
			array('disciplina_id', 'numerical', 'integerOnly'=>true),
			array('peso', 'numerical'),
			array('atividade', 'length', 'max'=>100),
			array('descricao', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, atividade, descricao, data, peso, disciplina_id', 'safe', 'on'=>'search'),
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
			'disciplina' => array(self::BELONGS_TO, 'Disciplina', 'disciplina_id'),
			'alunos' => array(self::MANY_MANY, 'Aluno', 'notas(atividade_id, aluno_id)'),
			'notas' => array(self::HAS_MANY, 'Nota', 'atividade_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'atividade' => 'Atividade',
			'descricao' => 'Descrição',
			'data' => 'Data',
			'peso' => 'Peso',
			'disciplina_id' => 'Disciplina',
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
		$criteria->compare('atividade',$this->atividade,true);
		$criteria->compare('descricao',$this->descricao,true);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('peso',$this->peso);
		$criteria->compare('disciplina_id',$this->disciplina_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Atividade the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
