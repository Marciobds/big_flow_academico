<?php

/**
 * This is the model class for table "frequencia".
 *
 * The followings are the available columns in table 'frequencia':
 * @property integer $aluno_id
 * @property integer $aula_id
 * @property integer $presente
 * @property integer $disciplina_id
 */
class Frequencia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'frequencia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('aluno_id, aula_id, disciplina_id', 'required'),
			array('aluno_id, aula_id, presente, disciplina_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('aluno_id, aula_id, presente, disciplina_id', 'safe', 'on'=>'search'),
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
			'aluno' => array( self::BELONGS_TO, 'Aluno', 'aluno_id' ),
    		'aula' => array( self::BELONGS_TO, 'Aula', 'aula_id' ),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'aluno_id' => 'Aluno',
			'aula_id' => 'Aula',
			'presente' => 'Presente',
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

		$criteria->compare('aluno_id',$this->aluno_id);
		$criteria->compare('aula_id',$this->aula_id);
		$criteria->compare('presente',$this->presente);
		$criteria->compare('disciplina_id',$this->disciplina_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Frequencia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
