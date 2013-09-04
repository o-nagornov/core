<?php

class PaymentsController extends Controller
{
	public function actionView($id)
	{
		$model = Payment::model()->findByPk($id);
		$this->render('view', array('model'=>$model));
	}
	
	public function actionCreate()
	{
		$model=new Payment;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Payment']))
		{
			$model->attributes=$_POST['Payment'];
			
			if ($model->account_id == 0)
			{
				Yii::app()->user->setFlash('error', 'Ошибка обработки платежа - выберите корректный аккаунт');
			}
			else
			{
			
				unset($_POST['Payment']);
				try
				{
					if($model->save())
					{
						$this->redirect(array('view', 'id'=>$model->id_payment));
					}
					else
					{
						Yii::app()->user->setFlash('error', 'Ошибка обработки платежа');
					}
				}
				catch (Exception $e)
				{
					Yii::app()->user->setFlash('error', 'Ошибка обработки платежа');
					echo $e;
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
		
	}
	
	public function actionAutocomplete()
	{	
		$term = Yii::app()->getRequest()->getParam('term');
		
		if (Yii::app()->request->isAjaxRequest && $term)
		{    
			$criteria = new CDbCriteria;
			$criteria->addSearchCondition("email", $term, true, 'OR', 'LIKE');
			$criteria->addSearchCondition("login", $term, true, 'OR', 'LIKE');
			
			$accouns = Account::model()->findAll($criteria);

			$result = array();
			foreach ($accouns as $account) {
				$result[] = array(
					'label' => $account->email." / ".$account->login,
					'value' => $account->email." / ".$account->login,
					'id' => $account->id_account,
				);
			}
						
			echo CJSON::encode($result);
			Yii::app()->end();
		}
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