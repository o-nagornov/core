<?php

class StatisticsController extends Controller
{
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

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}