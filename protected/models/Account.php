<?php

/**
 * This is the model class for table "tbl_account".
 *
 * The followings are the available columns in table 'tbl_account':
 * @property string $id_account
 * @property string $login
 * @property string $email
 * @property string $password
 * @property string $creation_date
 * @property string $stop_date
 * @property string $tbl_prefix
 * @property integer $locked
 * @property string $status
 * @property string $role
 * @property string $check_hash
 * @property integer $tariff_id
 *
 * The followings are the available model relations:
 * @property Tariff $tariff
 * @property Payment[] $payments
 */
class Account extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_account';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('login, email, tariff_id', 'required'),
			array('locked, tariff_id', 'numerical', 'integerOnly'=>true),
			array('login, email, password, stop_date, tbl_prefix, status, role, check_hash', 'length', 'max'=>45),
			array('creation_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_account, login, email, password, creation_date, stop_date, tbl_prefix, locked, status, role, check_hash, tariff_id', 'safe', 'on'=>'search'),
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
			'tariff' => array(self::BELONGS_TO, 'Tariff', 'tariff_id'),
			'payments' => array(self::HAS_MANY, 'Payment', 'account_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_account' => 'Id Account',
			'login' => 'Login',
			'email' => 'Email',
			'password' => 'Password',
			'creation_date' => 'Creation Date',
			'stop_date' => 'Stop Date',
			'tbl_prefix' => 'Tbl Prefix',
			'locked' => 'Locked',
			'status' => 'Status',
			'role' => 'Role',
			'check_hash' => 'Check Hash',
			'tariff_id' => 'Tariff',
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

		$criteria->compare('id_account',$this->id_account,true);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('stop_date',$this->stop_date,true);
		$criteria->compare('tbl_prefix',$this->tbl_prefix,true);
		$criteria->compare('locked',$this->locked);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('check_hash',$this->check_hash,true);
		$criteria->compare('tariff_id',$this->tariff_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Account the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
