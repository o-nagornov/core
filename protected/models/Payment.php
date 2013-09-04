<?php

/**
 * This is the model class for table "tbl_payment".
 *
 * The followings are the available columns in table 'tbl_payment':
 * @property integer $id_payment
 * @property string $payment_date
 * @property string $summ
 * @property string $account_id
 *
 * The followings are the available model relations:
 * @property Account $account
 */
class Payment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_payment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('account_id', 'required'),
			array('summ, account_id', 'length', 'max'=>10),
			array('payment_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_payment, payment_date, summ, account_id', 'safe', 'on'=>'search'),
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
			'account' => array(self::BELONGS_TO, 'Account', 'account_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_payment' => 'Id Payment',
			'payment_date' => 'Payment Date',
			'summ' => 'Summ',
			'account_id' => 'Account',
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

		$criteria->compare('id_payment',$this->id_payment);
		$criteria->compare('payment_date',$this->payment_date,true);
		$criteria->compare('summ',$this->summ,true);
		$criteria->compare('account_id',$this->account_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Payment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	protected function afterSave()
	{
		if ($this->isNewRecord)
		{
			$transaction=Yii::app()->db->beginTransaction();
			try
			{
				Yii::app()->db->createCommand("UPDATE tbl_account SET account = account + ".$this->summ." WHERE id_account = ".$this->account_id)->execute();
				$transaction->commit();
				return true;
			}
			catch(Exception $e)
			{
				$transaction->rollback();
				throw new Exception();
			}
		}
	}
}
