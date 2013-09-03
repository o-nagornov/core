<?php

class RegistrationController extends Controller
{
	public function actionApprove($hash, $email)
	{
		$user = Account::model()->find("email=:email", array(':email'=>$email));
		
		$status = "";
		
		if (!$user)
		{
			$status = "notregisted";
		}
		else
		{
			if ($hash = $user->check_hash)
			{
				$status = "ok";
				$user->role = 'user';
				$user->save();
			}
			else
			{
				$status = "badcode";
			}
		}
		
		$this->render('approve', array(
									  'status' => $status
									  ));
	}
	
	public function actionRegister()
	{
		$model = new Account;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Account']))
		{
			$model->attributes=$_POST['Account'];
			$model->password = md5($model->password);
			$model->login = strtolower($model->login);
			$model->check_hash = md5($model->email.$model->password);
			$model->role = 'guest';
			$model->tariff_id = 1;

			
			try
			{
				if ($model->password != md5($_POST['repeat_password']))
				{
					$model->addError('password', 'Пароли не совпадают');
					throw new Exception();
				}
				
				if (preg_match('/[^a-z0-9_]/', $model->login) == 1)
				{
					$model->addError('login', 'Можно использовать только следующие символы: a-z, 0-9, _');
					throw new Exception();
				}
				
				if (preg_match('/(assets|css|demo|images|libraries|library|protected|themes)/', $model->login) == 1)
				{
					$model->addError('login', 'Данный аккаунт зарезервирован системой');
					throw new Exception();
				}
				
				if (Account::model()->find('login=:login', array(':login'=>$model->login)))
				{
					$model->addError('login', 'Такой сайт уже зарегистрирован');
					throw new Exception();
				}
				
				if ($oldModel = Account::model()->find('email=:email', array(':email'=>$model->email)))
				{
					if ($oldModel)
					{
						if ($oldModel->role == 'guest')
						{
							$oldModel->delete();
						}
					}
				}
				
				if ($model->save())
				{
					if ($this->sendApprove($model) != 1)
					{
						Yii::app()->user->setFlash('error', 'Извините, невозможно отправить подтверждение. Попробуйте загеристироваться позже.');
						throw new Exception();
					}
					$this->redirect(array('/registration/message', 'email' => $model->email));	
				}
			}
			catch (CDbException $e)
			{
				$model->addError('email', 'Такой email уже зарегистрирован');
			}
			catch (Exception $e)
			{
			}
		}

		$model->password = '';
		
		$this->render('registration', array(
			'model'=>$model,
		));
	}
	
	public function actionIndex()
	{
		$this->redirect(array('/registration/register'));
	}

	public function actionMessage($email)
	{
		$this->render('message', array(
									   'email' => $email,
									   ));
	}
	
	protected function sendApprove($user)
	{
		$hash = $user->check_hash;
		$email = $user->email;
		
		$mailer = Yii::createComponent('application.extensions.mailer.EMailer');
				
		$mailer->Host = 'smtp.yandex.ru';
		$mailer->Port = 587;
		$mailer->Accountname = 'oin.73';
		$mailer->Password = 'farcry';
		$mailer->SMTPAuth = true;
		$mailer->IsSMTP();
		$mailer->IsHTML(true);
		$mailer->From = 'oin.73@yandex.ru';

		$mailer->AddAddress($user->email);
		
		$mailer->FromName = "Library";
		$mailer->CharSet = 'UTF-8';
		$mailer->Subject = 'Подтверждение регистрации';
		$mailer->Body = "
Для подтверждения регистрации, перейдите, пожалуйста, по ссылке:
<a href='".Yii::app()->request->hostInfo.Yii::app()->homeUrl."/registration/approve?hash=$hash&email=$email'>подтвердить регистрацию</a>";

				
		return $mailer->Send();
	}
}