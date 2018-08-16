<?php

/**
 * This is the model class for table "member".
 *
 * The followings are the available columns in table 'member':
 * @property integer $id
 * @property string $email
 * @property string $pass
 * @property string $first_name
 * @property string $last_name
 * @property integer $jenis_kelamin
 * @property string $tgl_lahir
 */
class Member extends CActiveRecord
{
	public $passold;
	public $passconf;

	public $hari_lahir;
	public $bln_lahir;
	public $tahun_lahir;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Member the static model class
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
		return 'member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, pass, first_name, last_name, jenis_kelamin, tgl_lahir', 'required'),
			array('jenis_kelamin', 'numerical', 'integerOnly'=>true),
			array('email', 'length', 'max'=>200),
			array('pass', 'length', 'min'=>6),
			array('pass, first_name, last_name', 'length', 'max'=>100),
			array('pass', 'compare', 'compareAttribute'=>'passconf', 'on'=>'insert'),
			array('email', 'unique', 'on'=>'insert'),

			array('hari_lahir, bln_lahir, tahun_lahir, passconf', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, pass, first_name, last_name, jenis_kelamin, tgl_lahir', 'safe', 'on'=>'search'),
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
			'email' => 'Email',
			'pass' => 'Password',
			'passconf' => 'Confirm Pass',
			'first_name' => 'Nama Depan',
			'last_name' => 'Nama Belakang',
			'jenis_kelamin' => 'Jenis Kelamin',
			'tgl_lahir' => 'Tgl Lahir',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('jenis_kelamin',$this->jenis_kelamin);
		$criteria->compare('tgl_lahir',$this->tgl_lahir,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function login($email='')
	{
		$data = $this->find('email = :email', array(':email'=>$email));
		if ($data !== null) {
			$session = new CHttpSession;
			$session->open();
			$session['login_member'] = $data->attributes;
		}
	}
	public function getEmail()
	{
		$data = $this->getDataLogin();
		if ($data) {
			return $data['email'];
		}else{
			return false;
		}
	}
	public function getId()
	{
		$data = $this->getDataLogin();
		if ($data) {
			return $data['id'];
		}else{
			return false;
		}
	}
	public function isGuest()
	{
		$data = $this->getDataLogin();
		if (is_array($data)) {
			return false;
		}else{
			return true;
		}
	}
	public function getDataLogin($value='')
	{
		$session = new CHttpSession;
		$session->open();
		if (isset($session['login_member'])) {
			return $session['login_member'];
		}else{
			return false;
		}
	}
}