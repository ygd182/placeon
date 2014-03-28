<?php

/**
 * This is the model class for table "state".
 *
 * The followings are the available columns in table 'state':
 * @property integer $id
 * @property integer $id_user
 * @property string $date
 * @property string $type
 * @property string $description
 * @property integer $id_position
 *
 * The followings are the available model relations:
 * @property AnnouncementData $announcementData
 * @property Position $idPosition
 * @property CrugeUser $idUser
 */
class State extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return State the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

  protected function instantiate($attributes){
    $class = $attributes['type'];
    $model=new $class(null);
    return $model;
	}
	public function beforeSave() {
    if ($this->isNewRecord) {
      $this->type = get_class($this);
    }
    return parent::beforeSave();
  }
  
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'state';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user, date, description', 'required'),
			array('id_user, id_position', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>50),
			array('description', 'length', 'max'=>140),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_user, date, type, description, id_position', 'safe', 'on'=>'search'),
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
			'announcementData' => array(self::HAS_ONE, 'AnnouncementData', 'id_state'),
			'position' => array(self::BELONGS_TO, 'Position', 'id_position'),
			'idUser' => array(self::BELONGS_TO, 'CrugeUser', 'id_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_user' => 'Id User',
			'date' => 'Date',
			'type' => 'Type',
			'description' => 'Description',
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
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('id_position',$this->id_position);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}