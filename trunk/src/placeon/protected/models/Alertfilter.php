<?php

/**
 * This is the model class for table "alertfilter".
 *
 * The followings are the available columns in table 'alertfilter':
 * @property integer $id
 * @property integer $user_1
 * @property integer $user_2
 * @property integer $value
 * @property integer $id_position
 *
 * The followings are the available model relations:
 * @property Position $idPosition
 */
class Alertfilter extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Alertfilter the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'alertfilter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_1, user_2, value', 'required'),
			array('user_1, user_2, value, id_position', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_1, user_2, value, id_position', 'safe', 'on'=>'search'),
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
			'idPosition' => array(self::BELONGS_TO, 'Position', 'id_position'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_1' => 'User 1',
			'user_2' => 'User 2',
			'value' => 'Value',
			'id_position' => 'Id Position',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_1',$this->user_1);
		$criteria->compare('user_2',$this->user_2);
		$criteria->compare('value',$this->value);
		$criteria->compare('id_position',$this->id_position);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}