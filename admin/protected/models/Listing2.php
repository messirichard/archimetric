<?php

/**
 * This is the model class for table "listing2".
 *
 * The followings are the available columns in table 'listing2':
 * @property integer $id
 * @property integer $member_id
 * @property integer $area_id
 * @property integer $jenis_usaha_id
 * @property string $slug
 * @property string $nama_listing
 * @property string $image
 * @property string $alamat
 * @property string $rating
 * @property string $phone
 * @property string $email
 * @property string $website
 * @property string $jam_buka
 * @property string $deskripsi
 * @property string $input_date
 * @property integer $input_member_id
 * @property integer $pemilik_member_id
 * @property integer $views
 * @property integer $status
 * @property string $siup
 * @property string $input_admin
 */
class Listing2 extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'listing2';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('member_id, area_id, jenis_usaha_id, slug, nama_listing, image, alamat, rating, phone, email, website, jam_buka, deskripsi, input_date, input_member_id, pemilik_member_id, views, status, siup, input_admin', 'required'),
			array('id, member_id, area_id, jenis_usaha_id, input_member_id, pemilik_member_id, views, status', 'numerical', 'integerOnly'=>true),
			array('slug, nama_listing, alamat, email, website', 'length', 'max'=>100),
			array('image', 'length', 'max'=>250),
			array('rating', 'length', 'max'=>2),
			array('phone', 'length', 'max'=>50),
			array('siup, input_admin', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, member_id, area_id, jenis_usaha_id, slug, nama_listing, image, alamat, rating, phone, email, website, jam_buka, deskripsi, input_date, input_member_id, pemilik_member_id, views, status, siup, input_admin', 'safe', 'on'=>'search'),
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
			'member_id' => 'Member',
			'area_id' => 'Area',
			'jenis_usaha_id' => 'Jenis Usaha',
			'slug' => 'Slug',
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
			'input_member_id' => 'Input Member',
			'pemilik_member_id' => 'Pemilik Member',
			'views' => 'Views',
			'status' => 'Status',
			'siup' => 'Siup',
			'input_admin' => 'Input Admin',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('member_id',$this->member_id);
		$criteria->compare('area_id',$this->area_id);
		$criteria->compare('jenis_usaha_id',$this->jenis_usaha_id);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('nama_listing',$this->nama_listing,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('rating',$this->rating,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('jam_buka',$this->jam_buka,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('input_date',$this->input_date,true);
		$criteria->compare('input_member_id',$this->input_member_id);
		$criteria->compare('pemilik_member_id',$this->pemilik_member_id);
		$criteria->compare('views',$this->views);
		$criteria->compare('status',$this->status);
		$criteria->compare('siup',$this->siup,true);
		$criteria->compare('input_admin',$this->input_admin,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Listing2 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
