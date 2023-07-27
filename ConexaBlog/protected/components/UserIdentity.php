<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */

class UserIdentity extends CUserIdentity
{	
	
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
		$curl = curl_init();

		$params = array(
			'username' => $this->username,
			'password' => $this->password,
		);
		
		curl_setopt($curl, CURLOPT_URL, $_ENV['BASE_URL_MY_DB'].'users?'.http_build_query($params));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($curl);
		Yii::log("Debug: ".$response, CLogger::LEVEL_INFO, 'application');
		$response = json_decode($response, true);
		curl_close($curl);
		if(count($response) > 0){
			$this->errorCode=self::ERROR_NONE;
		}else{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		return !$this->errorCode;
	}
}