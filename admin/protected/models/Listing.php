<?php

/**
 * This is the model class for table "listing".
 *
 * The followings are the available columns in table 'listing':
 * @property integer $id
 * @property string $slug
 * @property string $area
 * @property string $jenis_listing
 * @property string $nama_listing
 * @property string $alamat
 * @property string $rating
 * @property string $phone
 * @property string $email
 * @property string $website
 * @property string $jam_buka
 * @property string $deskripsi
 */
class Listing extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Listing the static model class
	 */
	public $nama_area;
	public $add_area;
	public $tag;
	public $jenis_data;
	public $area_data;
	public $parent_area_id;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'listing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('area_id, jenis_usaha_id, image, nama_listing, alamat', 'required'),
			array('siup', 'required', 'on'=>'register'),
			array('slug, nama_listing, alamat, email, website', 'length', 'max'=>100),
			array('image', 'length', 'max'=>250),
			array('rating', 'length', 'max'=>10),
			array('phone', 'length', 'max'=>50),
			array('add_area, tag, deskripsi, jam_buka, status', 'safe'),
			array('slug', 'unique'),

			array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>FALSE, 'on'=>'insert'),
			array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>TRUE, 'on'=>'update'),

			array('siup', 'file', 'types'=>'jpg, gif, png, zip, pdf', 'allowEmpty'=>FALSE, 'on'=>'register'),
			array('siup', 'file', 'types'=>'jpg, gif, png, zip, pdf', 'allowEmpty'=>TRUE, 'on'=>'update'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, slug, nama_listing, alamat, rating, phone, email, website, jam_buka, deskripsi, status, input_admin', 'safe', 'on'=>'search'),
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
			'tags'=>array(self::HAS_MANY, 'ListingTag', 'listing_id'),
			'tag'=>array(self::HAS_ONE, 'ListingTag', 'listing_id'),
			'area'=>array(self::BELONGS_TO, 'TbArea', 'area_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'area_id' => 'Area',
			'jenis_usaha_id' => 'Jenis Usaha',
			'slug' => 'Slug',
			'jenis_listing' => 'Jenis Listing',
			'nama_listing' => 'Nama Listing',
			'image' => 'Image',
			'alamat' => 'Alamat',
			'rating' => 'Rating',
			'phone' => 'Phone',
			'email' => 'Email',
			'website' => 'Website',
			'jam_buka' => 'Jam Buka',
			'deskripsi' => 'Deskripsi',
			'input_date' => 'Input Date',
			'views' => 'Views',
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
		$criteria->compare('area_id',$this->area_id);
		$criteria->compare('jenis_usaha_id',$this->jenis_usaha_id);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('nama_listing',$this->nama_listing,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('rating',$this->rating,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('jam_buka',$this->jam_buka,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('input_admin',$this->input_admin,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	// public function getAreaList($sub_kota)
	// {
	// 	$data = $this->getAreaSelect($sub_kota);
	// 	$dataArray = array();
	// 	foreach ($data as $key => $value) {
	// 		$dataArray[] = '"'.$value.'"';
	// 	}
	// 	// $dataArray['area-lain'] = 'Area Lain';

	// 	return implode(',', $dataArray);
	// }
	// public function getAreaSelect($sub_kota)
	// {
	// 	$command = Yii::app()->db->createCommand();
	// 	$command->select('area_id');
	// 	$command->from('listing');
	// 	$command->where('sub_kota=:sub_kota', array(':sub_kota'=>$sub_kota));
	// 	$command->group('area_id');
	// 	$data = $command->query();
	// 	$dataArray = array();
	// 	foreach ($data as $key => $value) {
	// 		$dataArray[] = $value['area_id'];
	// 	}
	// 	// $dataArray['area-lain'] = 'Area Lain';

	// 	return $dataArray;
	// }


	public function getTag()
	{
		$criteria = new CDbCriteria;
		$criteria->addCondition('t.status = "1"');
		$criteria->select = 't.id';

		if ($_GET['jenis'] != '') {
			$criteria->params[':jenis'] = $_GET['jenis'];
			$criteria->addCondition('jenis_usaha_id = :jenis');
		}

		if ($_GET['area'] != '') {
			$hasilq1 = TbArea::model()->findAll('parent_id = :parent_id', array(':parent_id'=>$_GET['area']));
			$hasilq1 = CHtml::listData($hasilq1, 'id', 'id');
			$hasilq1[] = $_GET['area'];
			$criteria->addInCondition('t.area_id', $hasilq1);
		}

		if ($_GET['q'] != '') {
			$criteria->addSearchCondition('nama_listing', $_GET['q']);
		}

		$data = array();
		foreach (Listing::model()->findAll($criteria) as $key => $value) {
			$data[] = $value->id;
		}

		$criteria = new CDbCriteria;
		$criteria->addInCondition('listing_id', $data);
		$criteria->group = 'tag';
		$dataTag = ListingTag::model()->findAll($criteria);

		return $dataTag;
	}

	/**
	 * Get Tag List untuk halaman detail
	 */
	public function getTagList($listing_id = '')
	{
		$command = Yii::app()->db->createCommand();
		$command->select('tag');
		$command->from('listing_tag');
		if ($listing_id != '') {
			$command->where('listing_id = :listing_id', array(':listing_id'=>$listing_id));
		}
		$command->group('tag');
		$data = $command->query();
		$dataArray = array();
		foreach ($data as $key => $value) {
			if ($listing_id != '') {
				$dataArray[] = $value['tag'];
			} else {
				$dataArray[] = '"'.$value['tag'].'"';
			}
			
		}
		// $dataArray['area-lain'] = 'Area Lain';

		return implode(',', $dataArray);
	}

	/**
	 * Mendapatkan suggestion tag di halaman result
	 */
	// public function getTag($dataId)
	// {
	// 	$data = array();
	// 	foreach ($dataId as $key => $value) {
	// 		$data[] = $value->id;
	// 	}

	// 	$criteria = new CDbCriteria;
	// 	$criteria->addInCondition('listing_id', $data);
	// 	$criteria->group = 'tag';
	// 	$dataTag = ListingTag::model()->findAll($criteria);

	// 	return $dataTag;
	// }

	/**
	 * Untuk pencarian
	 */
	public function getData()
	{
		$criteria = new CDbCriteria;
		$criteria->addCondition('t.status = "1"');
		$criteria->select = 't.*';
		$criteria->join = 'LEFT JOIN listing_tag `tag` ON `tag`.listing_id=t.id';
		$criteria->group = 't.id';

		if ($_GET['jenis'] != '') {
			$criteria->params[':jenis'] = $_GET['jenis'];
			$criteria->addCondition('jenis_usaha_id = :jenis');
		}

		if ($_GET['area'] != '') {
			$hasilq1 = TbArea::model()->findAll('parent_id = :parent_id', array(':parent_id'=>$_GET['area']));
			$hasilq1 = CHtml::listData($hasilq1, 'id', 'id');
			$hasilq1[] = $_GET['area'];
			$criteria->addInCondition('t.area_id', $hasilq1);
		}

		if ($_GET['q'] != '') {
			$criteria->addSearchCondition('nama_listing', $_GET['q']);
		}

		if ($_GET['tag'] != '') {
			$criteria->params[':tag'] = $_GET['tag'];
			$criteria->addCondition('tag.tag = :tag');
		}

		$criteriaCount = $criteria;

		// $criteria->with = array('tags');

		$criteria->order = 'input_date DESC';
		if ($_GET['order'] != '') {
			if ($_GET['order'] == 'alfabet')
				$criteria->order = 'nama_listing ASC';
			if ($_GET['order'] == 'new')
				$criteria->order = 'input_date DESC';
			if ($_GET['order'] == 'rating')
				$criteria->order = 'rating DESC';
		}

		$dataProvider=new CActiveDataProvider('Listing', array(
		    'criteria'=>$criteria,
		    'countCriteria'=>$criteriaCount,
		    'pagination'=>array(
		        'pageSize'=>6,
		    ),
		));
		// foreach ($dataProvider->getData() as $key => $value) {
		// 	print_r($value->attributes);
		// }
		// exit;

		return $dataProvider;
	}

	public function isiJenisDanArea()
	{
		$this->jenis_data = CHtml::listData(TbJenisUsaha::model()->findAll(), 'id', 'nama');
		$this->area_data = CHtml::listData(TbArea::model()->findAll(), 'id', 'nama');
	}
	public function getParentAreaId($area)
	{
		if ($this->parent_area_id == '') {
			$this->parent_area_id = $parentAreaId = TbArea::model()->findByPk($area)->parent_id;
		}
		return $this->parent_area_id;
	}

	/**
	 * Mengambil sub area
	 */
	// public function getSubArea($area=0, $jenis, $cari)
	// {
	// 	$criteria = new CDbCriteria;
	// 	$criteria->select = "t.*";


	// 	if ($area != '') {
	// 		$params[':area'] = $area;
	// 		$criteria->addCondition('parent_id = :area', 'AND');
	// 	}

	// 	$criteria->params = $params;
	// 	// $criteria->group = 'area_id';

	// 	$data = TbArea::model()->findAll($criteria);

	// 	return $data;
	// }

	// public function getArea($area, $jenis, $cari)
	// {
	// 	return TbArea::model()->findAll("parent_id=0");
	// }

	// public function getSubAreaByKota($jenis)
	// {
	// 	$jenis = ListingJenis::model()->getJenisBySlug($jenis);
	// 	$criteria = new CDbCriteria;
	// 	$criteria->condition = 'jenis_listing = :jenis';
	// 	$criteria->params = array(':jenis'=>$jenis);
	// 	$criteria->group = 'area_id';

	// 	$data = $this->findAll($criteria);

	// 	return $data;

	// }

	// public function getAreaSurabaya($cari, $jenis)
	// {
	// 	$data = array(
	// 		array(
	// 			'area'=>'Surabaya Pusat',
	// 			'sub_area'=>$this->getSubAreaByArea('Surabaya Pusat',$cari),
	// 			'jml'=>$this->getJmlDataPerArea('Surabaya Pusat',$cari),
	// 			'gambar'=>'bambu-runcing-surabaya.jpg',
	// 		),
	// 		array(
	// 			'area'=>'Surabaya Utara',
	// 			'sub_area'=>$this->getSubAreaByArea('Surabaya Utara',$cari),
	// 			'jml'=>$this->getJmlDataPerArea('Surabaya Utara',$cari),
	// 			'gambar'=>'banner-1.jpg',
	// 		),
	// 		array(
	// 			'area'=>'Surabaya Timur',
	// 			'sub_area'=>$this->getSubAreaByArea('Surabaya Timur',$cari),
	// 			'jml'=>$this->getJmlDataPerArea('Surabaya Timur',$cari),
	// 			'gambar'=>'banner-grandcity.jpg',
	// 		),
	// 		array(
	// 			'area'=>'Surabaya Selatan',
	// 			'sub_area'=>$this->getSubAreaByArea('Surabaya Selatan',$cari),
	// 			'jml'=>$this->getJmlDataPerArea('Surabaya Selatan',$cari),
	// 			'gambar'=>'hotel-penginapan.jpg',
	// 		),
	// 		array(
	// 			'area'=>'Surabaya Barat',
	// 			'sub_area'=>$this->getSubAreaByArea('Surabaya Barat',$cari),
	// 			'jml'=>$this->getJmlDataPerArea('Surabaya Barat',$cari),
	// 			'gambar'=>'medical-center-surabaya.jpg',
	// 		),
	// 	);
	// 	return $data;

	// }
	// public function getSubAreaByArea($area,$cari)
	// {
	// 	$criteria = new CDbCriteria;
	// 	$criteria->select = 'area_id';
	// 	// $criteria->condition = 'sub_kota = :sub_kota';
	// 	// $criteria->params = array(':sub_kota'=>$area_id);
	// 	$criteria->group = 'area_id';

	// 	$data = $this->findAll($criteria);
	// 	$str = array();
	// 	foreach ($data as $key => $value) {
	// 		$str[] = CHtml::link($value->area_id, array('listing/cari', 'cari'=>$cari,'area'=>$area, 'sub_area'=>$value->area));
	// 	}

	// 	return implode(', ', $str);
	// }

	// public function getJmlDataPerArea($area='', $cari)
	// {
	// 	$criteria = new CDbCriteria;
	// 	$criteria->condition = 'sub_kota = :sub_kota';
	// 	$criteria->params = array(':sub_kota'=>$area);

	// 	$data = $this->count($criteria);

	// 	return $data;

	// }

	/*	cek area */
	public function cekArea($area=0)
	{
		$data = TbArea::model()->findByPk($area);
		if ($data['parent_id'] === "0"){
			return true;
		}else{
			return false;
		}
	}

}