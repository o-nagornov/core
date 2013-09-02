<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	
	private $_id;
	
	/**
	 * Authenticates a user.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = null;
		if (($user = Account::model()->findByAttributes(array('email' => $this->username))) === null)
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		else if (($user = Account::model()->findByAttributes(array('email' => $this->username, 'password' => md5($this->password)))) === null)
		{
			$this->errorCode=self::ERROR_PASSWORD_INVALID;	
		}
		else
		{
			$this->_id = $user->id_account;
			$this->errorCode=self::ERROR_NONE;
			$this->setState('email', $user->email);
		}
		return !$this->errorCode;
	}
	
	public function getId()
	{
		return $this->_id;
	}
}