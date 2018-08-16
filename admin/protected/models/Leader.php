<?php

/**
 * This is the model class for table "leader".
 *
 * The followings are the available columns in table 'leader':
 * @property integer $id
 * @property string $image
 * @property integer $active
 * @property string $date_input
 * @property string $date_update
 * @property string $insert_by
 * @property string $last_update_by
 */
class Leader extends CActiveRecord
{
	public $title;
	public $content;
	public $writer_name;
	public $writer_image;
	public $writer_avatar;
	public $year;
	public $month;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Leader the static model class
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
		return 'leader';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('image, active', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('image, insert_by, last_update_by', 'length', 'max'=>255),
			
			array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>FALSE, 'on'=>'insert'),
			array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>TRUE, 'on'=>'update'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('title, writer_name ,id, active, date_input, date_update, insert_by, last_update_by', 'safe', 'on'=>'search'),
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
			'images'=>array(self::HAS_MANY, 'LeaderImage', 'leader_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'writer_name' => 'writer_name',
			'active' => 'Status',
			'date_input' => 'Date Input',
			'date_update' => 'Date Update',
			'insert_by' => 'Insert By',
			'last_update_by' => 'Last Update By',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($language_id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->select = "t.*,leader_description.title";
		$criteria->join = "
		LEFT JOIN leader_description ON leader_description.leader_id=t.id
		";
		$criteria->addCondition('leader_description.language_id = :language_id');
		$criteria->params = array(':language_id'=>$language_id);

		$criteria->compare('id',$this->id);
		$criteria->compare('active',$this->active);
		$criteria->compare('date_input',$this->date_input,true);
		$criteria->compare('date_update',$this->date_update,true);
		$criteria->compare('insert_by',$this->insert_by,true);
		$criteria->compare('last_update_by',$this->last_update_by,true);

		$criteria->compare('title',$this->title, true);
		$criteria->compare('pastor_description.title',$this->writer_name, true);

		$criteria->order = "date_input DESC";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getData($id, $languageId=1)
	{
		$criteria=new CDbCriteria;

		$criteria->select = "t.*, leader_description.title, leader_description.content";
		$criteria->join = "
		LEFT JOIN leader_description ON leader_description.leader_id=t.id
		";
		$criteria->addCondition('leader_description.language_id = :language_id');
		$criteria->addCondition('t.id = :id');
		$criteria->params = array(
			':language_id'=>$languageId,
			':id'=>$id,
		);

		$model = Leader::model()->find($criteria);

		return $model;
	}

	public function getDataDesc($id, $languageId=1)
	{
		$criteria=new CDbCriteria;

		$criteria->addCondition('language_id = :language_id');
		$criteria->addCondition('leader_id = :id');
		$criteria->params = array(
			':language_id'=>$languageId,
			':id'=>$id,
		);

		$model = LeaderDescription::model()->find($criteria);

		return $model;
	}

	public function getAllData($languageId=1)
	{
		$criteria=new CDbCriteria;

		$criteria->select = "t.*, leader_description.title, leader_description.content";
		$criteria->join = "
		LEFT JOIN leader_description ON leader_description.leader_id=t.id
		";
		$criteria->addCondition('leader_description.language_id = :language_id');
		$criteria->addCondition('t.id = :id');
		$criteria->params = array(
			':language_id'=>$languageId,
		);

		$model = Leader::model()->find($criteria);

		return $model;
	}

}