<?php

class AccountController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','changeTariff','lock','unlock'),
				'roles'=>array('user'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionIndex()
	{
		$user = Account::model()->findByPk(Yii::app()->user->id);
		
		$address = $user->login;
		
		$status = 'Новый';
		$type = $user->status;
		$tariffId = $user->tariff_id;
		
		switch ($user->status)
		{
			case 'demo':
				$status = 'Пробный';
				break;
			case 'user':
				$status = 'Активен';
				break;
			case 'locked':
				$status = 'Заблокирован';
				break;
		}
		
		$users = "N/A";
		$books = "N/A";
		$tariff = "N/A";
		$account = "N/A";
		$days = "N/A";
		
		if ($user->tbl_prefix)
		{
			Yii::app()->db_library->tablePrefix = $user->tbl_prefix;
		
			$users = User::model()->count()." / ".($user->tariff->users_limit == 0.0 ? '∞' : $user->tariff->users_limit);
			$books = Book::model()->count()." / ".($user->tariff->books_limit == 0.0 ? '∞' : $user->tariff->books_limit);
			
			$tariff = $user->tariff->title." (".$user->tariff->day_cost." ед. / день)";
			$account = $user->account;
			$days = ($user->tariff->day_cost == 0.0) ? '∞' : round($account / $user->tariff->day_cost);
		}
		
		$this->render('index', array(
			'type'=>$type,
			'address'=>$address,
			'status'=>$status,
			'users'=>$users,
			'books'=>$books,
			'tariff'=>$tariff,
			'account'=>$account,
			'days'=>$days,
			'tariffId'=>$tariffId,
		));	
	}
	
	public function actionChangeTariff($newTariff)
	{
		$account = Account::model()->findByPk(Yii::app()->user->id);
		$newTariff = Tariff::model()->findByPk($newTariff);
		
		if ($account->account > $newTariff->day_cost)
		{
			$account->tariff_id = $newTariff->id_tariff;
			$account->status = 'user';
			$account->save();
		}
		else
		{
			Yii::app()->user->setFlash('error', 'Недостаточно средств');
		}
			
		$this->redirect(array('/account'));
	}
	
	public function actionLock()
	{
		$account = Account::model()->findByPk(Yii::app()->user->id);
		$account->status = 'locked';
		$account->save();
		
		$this->redirect(array('/account'));
	}

	public function actionUnlock()
	{
		$account = Account::model()->findByPk(Yii::app()->user->id);
		
		if ($account->account > $account->tariff->day_cost)
		{
			$account->status = 'user';
			$account->save();
		}
		else
		{
			Yii::app()->user->setFlash('error', 'Недостаточно средств');
		}
			
		$this->redirect(array('/account'));
	}
}