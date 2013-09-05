<?php
class ServiceCommand extends CConsoleCommand
{
	public function actionLock()
	{
		$time = time();
		$time -= 30 * 24 * 60 * 60;

		$accounts = Account::model()->findAll('status = :status AND creation_date < :date', array(':status'=>'demo', ':date'=>date('Y-m-d H:i:s', $time)));
		
		foreach ($accounts as $account)
		{
			$account->status = 'locked';
			$account->save();
		}
	}
	
	public function actionDebit()
	{
		$accounts = Account::model()->findAll('status = :status', array(':status'=>'user'));
		
		foreach ($accounts as $account)
		{
			$transaction=Yii::app()->db->beginTransaction();
			try
			{
				Yii::app()->db->createCommand("UPDATE tbl_account SET account = account - ".$account->tariff->day_cost." WHERE id_account = ".$account->id_account)->execute();
				$account->refresh();
				
				if ($account->account < 0)
				{
					$account->account = 0.0;
					$account->status = 'locked';
					$account->save();
				}
				
				$transaction->commit();
			}
			catch(Exception $e)
			{
				$transaction->rollback();
			}
		}
		
		
	}
}
?>