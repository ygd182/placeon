<?php

/**
 * This is the model class for table "announcement_data".
 *
 * The followings are the available columns in table 'announcement_data':
 * @property integer $id_state
 * @property string $message
 * @property string $image
 *
 * The followings are the available model relations:
 * @property State $idState
 */
class AnnouncementData extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AnnouncementData the static model class
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
		return 'announcement_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		//	array('id_state, message, image', 'required'),
			array('id_state', 'numerical', 'integerOnly'=>true),
			array('message', 'length', 'max'=>140),
      array('image', 'file', 'types'=>'jpg, gif, png'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_state, message, image', 'safe', 'on'=>'search'),
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
			'idState' => array(self::BELONGS_TO, 'State', 'id_state'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_state' => 'Id State',
			'message' => 'Message',
			'image' => 'Image',
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

		$criteria->compare('id_state',$this->id_state);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}