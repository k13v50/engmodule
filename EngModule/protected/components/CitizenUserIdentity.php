<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class CitizenUserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	const ERROR_PENDING_USER=3;

	public function authenticate()
	{

		$user = CitizenUser::model()->findByAttributes(array('username'=>$this->username));
		$password = sha1($this->password);

		if($user===null){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		} else if(trim($user->password) !== trim($password)){ //validate password
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		} else {
			if($user->app_status == AppStatusEnum::ACTIVE){
				Yii::app()->session['username'] = $user->username;
				Yii::app()->session['user_type'] = 0;//default user type for citizenuser
				Yii::app()->session['user_position'] = '';//default user type for citizenuser
				Yii::app()->user->id = $user->id;
				Yii::app()->user->username = $user->username;
				Yii::app()->session['user_id'] = $user->id;
				Yii::app()->session['last_login_dt'] = $user->last_login_dt;
				$this->errorCode=self::ERROR_NONE;
			}else{
				$this->errorCode=self::ERROR_PENDING_USER;
			}
		}
		return $this->errorCode;
	}
}