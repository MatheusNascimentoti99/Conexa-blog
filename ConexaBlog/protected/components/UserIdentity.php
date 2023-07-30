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
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = new User();
		$params = array(
			'username' => $this->username,
			'password' => $this->password,
		);

		$response = $user->all($params);

		if (count($response) > 0) {
			$this->_id = $response[0]['id'];
			$this->setState('title', $response[0]['name']);
			$this->setState('photo', $response[0]['photo'] ?? '');
			$this->errorCode = self::ERROR_NONE;
		} else {
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		}
		return !$this->errorCode;
	}

	public function getId()
	{
		return $this->_id;
	}
}