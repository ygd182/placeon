<?php

/**
 * This is the model class for table "position".
 *
 * The followings are the available columns in table 'position':
 * @property double $latitude
 * @property string $date
 * @property integer $id
 * @property double $longitude
 *
 * The followings are the available model relations:
 * @property Alertfilter[] $alertfilters
 * @property State[] $states
 * @property CrugeUser[] $crugeUsers
 */
class Position extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Position the static model class
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
		return 'position';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('latitude, date, longitude', 'required'),
			array('latitude, longitude', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('latitude, date, id, longitude', 'safe', 'on'=>'search'),
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
			'alertfilters' => array(self::HAS_MANY, 'Alertfilter', 'id_position'),
			'states' => array(self::HAS_MANY, 'State', 'id_position'),
			'crugeUsers' => array(self::MANY_MANY, 'CrugeUser', 'user_position_relation(id_position, id_user)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'latitude' => 'Latitude',
			'date' => 'Date',
			'id' => 'ID',
			'longitude' => 'Longitude',
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

		$criteria->compare('latitude',$this->latitude);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('longitude',$this->longitude);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}