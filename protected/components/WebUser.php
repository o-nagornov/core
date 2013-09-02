<?php

class WebUser extends CWebUser {
    private $_model = null;
 
    public function getRole()
    {
        if ($user = $this->getModel())
        {
            return $user->role;
        }
    }
	
	public function getAccount()
	{
		if ($user = $this->getModel())
        {
            return $user;
        }
		return false;
	}
 
    private function getModel()
    {
        if (!$this->isGuest && $this->_model === null)
        {
            $this->_model = Account::model()->findByPk($this->id, array('select' => 'role'));
        }
        return $this->_model;
    }
    	
	public function isRoot()
	{
		if ($user = $this->getModel())
        {
            return $user->role == 'root';
        }
        return false;
	}
	
	public function isAdmin()
	{
		if ($user = $this->getModel())
        {
            return ($user->role == 'admin') || ($user->role == 'root');
        }
        return false;
	}
}
?>