<?php

class StatisticsController extends Controller
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
				'actions'=>array('payments','registrations'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionPayments()
	{
		$model = new Payment('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Account']))
		{
			$model->attributes=$_GET['Payment'];
		}

		$this->render('payments',array(
			'model'=>$model,
		));
	}

	public function actionRegistrations()
	{
		$model = new Account('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Account']))
		{
			$model->attributes=$_GET['Account'];
		}

		$this->render('registrations',array(
			'model'=>$model,
		));
	}
}