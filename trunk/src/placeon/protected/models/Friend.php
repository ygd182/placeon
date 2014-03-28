<?php

/**
 * This is the model class for table "friend".
 *
 * The followings are the available columns in table 'friend':
 * @property integer $id_user1
 * @property integer $id_user2
 * @property string $date
 */
class Friend extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Friend the static model class
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
		return 'friend';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user1, id_user2, date', 'required'),
			array('id_user1, id_user2', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_user1, id_user2, date', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_user1' => 'Id User1',
			'id_user2' => 'Id User2',
			'date' => 'Date',
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

		$criteria->compare('id_user1',$this->id_user1);
		$criteria->compare('id_user2',$this->id_user2);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function isFriend($id1, $id2) {
		$friendResult = Friend::model()->findAllByAttributes(array('id_user1'=>$id1, 'id_user2'=>$id2));
		if ($friendResult)
			return true;
		else
			return false;
	}
	
}