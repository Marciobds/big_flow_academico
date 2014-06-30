<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	private $_username;
	private $_admin;
 
	public function getName()
	{
		return $this->_username;
	}
 
	public function getId()
	{
		return $this->_id;
	}
 
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
		$usuario = Usuario::model()->find('email=?', array($this->username));

		if($usuario === null) {
			$this->errorCode= self::ERROR_UNKNOWN_IDENTITY;
		} elseif($usuario->senha !== md5($this->password)) {
			$this->errorCode= self::ERROR_PASSWORD_INVALID;
		} else {
			$this->_id = $usuario->id;
			$this->_username = $usuario->email;
			
			if($usuario->professor_id != null)
				$this->_username = $usuario->professor->nome;

			$this->errorCode= self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
}