<?php
class WebUser extends CWebUser {

	public $user_id;
	public $username;

	public function afterLogin()
	{
		if (parent::beforeLogout()) {
			if (Yii::app()->session['user_type'] == 0){
				$user = CitizenUser::model()->findByPk(Yii::app()->session['user_id']);
				if($user != null){
					$user->last_login_dt=new CDbExpression('NOW()');
					$user->saveAttributes(array('last_login_dt'));
				}
			}else{
				$user = LGU_User::model()->findByPk(Yii::app()->session['user_id']);
				if($user != null){
					$user->last_login_dt=new CDbExpression('NOW()');
					$user->saveAttributes(array('last_login_dt'));
				}
			}
			return true;
		} else {
			return false;
		}
	}

	public function getUser_Id(){
		return $user_id;
	}

	public function getUsername(){
		return $username;
	}
}