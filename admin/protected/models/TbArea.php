<?php

/**
 * This is the model class for table "tb_area".
 *
 * The followings are the available columns in table 'tb_area':
 * @property integer $id
 * @property integer $parent_id
 * @property string $type
 * @property string $nama
 * @property string $deskripsi
 * @property string $alamat
 * @property string $jam_buka
 * @property string $map_location
 * @property integer $status
 */
class TbArea extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TbArea the static model class
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
		return 'tb_area';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, deskripsi, status', 'required'),
			array('parent_id, status', 'numerical', 'integerOnly'=>true),
			array('type, nama', 'length', 'max'=>225),
			array('image', 'length', 'max'=>200),
			array('alamat, jam_buka, map_location', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, type, nama, deskripsi, alamat, jam_buka, map_location, status', 'safe', 'on'=>'search'),
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
			'subArea'=>array(self::HAS_MANY, 'TbArea', 'parent_id'),
			'images'=>array(self::HAS_MANY, 'TbAreaImage', 'area_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent_id' => 'Parent',
			'type' => 'Type',
			'nama' => 'Nama',
			'deskripsi' => 'Deskripsi',
			'alamat' => 'Alamat',
			'jam_buka' => 'Jam Buka',
			'map_location' => 'Map Location',
			'status' => 'Status',
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('jam_buka',$this->jam_buka,true);
		$criteria->compare('map_location',$this->map_location,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getBreadcrump($id = 0)
	{
		$data=array();
		$query = $this->findAll('id = :id', array(':id'=>$id));
		foreach ($query as $key => $value) {
			$data[$value->nama]=array('index','parent'=>$value->id);
			$data2 = $this->getBreadcrump($value->parent_id);
			foreach ($data2 as $k => $v) {
				$data[$k]=$v;
			}
		}
		return $data;
	}

	public function getMenu($id = 0, $name = '')
	{
		$data=array();
		if ($id==0) {
			// $data['0']='[Kontent Utama]';
		}
		$query = $this->findAll('parent_id = :parent', array(':parent'=>$id));
		foreach ($query as $key => $value) {
			if ($id==0) {
				$data[$value->id]=$value->nama;
			} else {
				$data[$value->id]=' --- '.$value->nama;
			}
			$data2 = $this->getMenu($value->id, $data[$value->id]);
			foreach ($data2 as $k => $v) {
				$data[$k]=$v;
			}
		}
		return $data;
	}

	public function getAreaF()
	{
		$parent_id = 0;

		$criteria=new CDbCriteria;

		$criteria->select = "t.*";

		$criteria->addCondition('t.parent_id = :parent_id');
		$criteria->params = array(
			':parent_id'=>$parent_id,
		);

		$model = $this->findAll($criteria);

		return $model;
	}

	public function getAreaMl()
	{
		$parent_id = 0;

		$criteria=new CDbCriteria;

		$criteria->select = "t.*";

		$criteria->addCondition('t.parent_id != :parent_id');
		$criteria->params = array(
			':parent_id'=>$parent_id,
		);

		$model = $this->findAll($criteria);

		return $model;
	}

	public function getMenu_subfront($id = 0, $name = '')
	{
		$data=array();
		if ($id==0) {
			// $data['0']='[Kontent Utama]';
		}
		$query = $this->findAll('parent_id = :parent', array(':parent'=>$id));
		foreach ($query as $key => $value) {
			if ($id==0) {
				$data[$value->id]=$value->nama;
			} else {
				$data[$value->id]='&nbsp;&nbsp;&gt; '.$value->nama;
			}
			$data2 = $this->getMenu_subfront($value->id, $data[$value->id]);
			foreach ($data2 as $k => $v) {
				$data[$k]=$v;
			}
		}
		return $data;
	}

}