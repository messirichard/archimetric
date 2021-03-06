<?php

/**
 * This is the model class for table "listing_ulasan".
 *
 * The followings are the available columns in table 'listing_ulasan':
 * @property integer $id
 * @property integer $listing_id
 * @property integer $user_id
 * @property string $title
 * @property string $ulasan
 * @property integer $rating
 * @property string $date_input
 */
class ListingUlasan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ListingUlasan the static model class
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
		return 'listing_ulasan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('listing_id, user_id, ulasan, rating, date_input', 'required'),
			array('listing_id, user_id, rating', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('status', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, listing_id, user_id, title, ulasan, rating, date_input', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'listing_id' => 'Listing',
			'user_id' => 'User',
			'title' => 'Title',
			'ulasan' => 'Ulasan',
			'rating' => 'Rating',
			'date_input' => 'Date Input',
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
		$criteria->compare('listing_id',$this->listing_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('ulasan',$this->ulasan,true);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('date_input',$this->date_input,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}