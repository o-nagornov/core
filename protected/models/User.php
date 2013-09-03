<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id_user
 * @property string $name
 * @property string $surname
 * @property string $parentname
 * @property string $email
 * @property string $pass
 * @property string $role
 * @property string $check_hash
 *
 * The followings are the available model relations:
 * @property Query[] $queries
 * @property Recommendation[] $givenRecommendations
 * @property Recommendation[] $recivedRecommendations
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tbl_user}}';
	}
	
	public function getDbConnection()
	{
		return Yii::app()->db_library;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, surname, email, pass', 'required'),
			array('name, surname, parentname, email, pass, role, check_hash', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_user, name, surname, parentname, email, pass, role, check_hash', 'safe', 'on'=>'search'),
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
			'queries' => array(self::HAS_MANY, 'Query', 'user_id'),
			'givenRecommendations' => array(self::HAS_MANY, 'Recommendation', 'target_user_id'),
			'recivedRecommendations' => array(self::HAS_MANY, 'Recommendation', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_user' => 'Идентификатор',
			'name' => 'Имя',
			'surname' => 'Фамилия',
			'parentname' => 'Отчество',
			'email' => 'E-mail',
			'pass' => 'Пароль',
			'role' => 'Роль',
			'check_hash' => 'Проверочный ключ',
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

		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('parentname',$this->parentname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('check_hash',$this->check_hash,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
