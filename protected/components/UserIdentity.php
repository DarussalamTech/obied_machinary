<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

    public $_id;
    public $name;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        //$username = $this->username;
        $criteria = new CDbCriteria();
        $condition = " (username='" . $this->username . "' OR email='" . $this->username . "') ";
        $criteria->addCondition($condition . " AND password='" . md5($this->password) . "' AND is_active=1");
        $userinfo = Users::model()->find($criteria);

        if (empty($userinfo->username))
        {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }
        else if (empty($userinfo->password) && md5($this->password) != $userinfo->password)
        {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        }
        else
        {

            $this->errorCode = self::ERROR_NONE;
            //$this->setState("id", $userinfo->id);
            $this->_id = $userinfo->id;
            $this->setState('form_key', uniqid());
            $this->setState('name', $userinfo->name);
            $this->setState('email', $userinfo->email);
            $this->setState("type", $userinfo->type);
            
        }



        return !$this->errorCode;
    }

    /**
     * Get Login User Id
     * @return <int>
     */
    public function getId()
    {
        return $this->_id;
    }

}