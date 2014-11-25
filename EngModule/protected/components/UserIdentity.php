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

		$user = LGU_User::model()->findByAttributes(array('username'=>$this->username,));
		$password = sha1($this->password);

		if($user===null){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		} else if(trim($user->password) !== trim($password)){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		} else {
			Yii::app()->session['username'] = $user->username;
			Yii::app()->session['user_type'] = $user->user_type;
			Yii::app()->session['user_position'] = $user->position;
			Yii::app()->user->id = $user->id;
			Yii::app()->user->username = $user->username;
			Yii::app()->session['user_id'] = $user->id;
			Yii::app()->session['last_login_dt'] = $user->last_login_dt;
			Yii::app()->session['fname'] = $user->firstName;
			Yii::app()->session['mname'] = $user->middleName;
			Yii::app()->session['lname'] = $user->lastName;
			$this->errorCode=self::ERROR_NONE;
		}
			return !$this->errorCode;
	}

}