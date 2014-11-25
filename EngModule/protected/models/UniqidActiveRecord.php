<?php
/**
 *
 * @author francis labro
 *
 * This class generates an automated id for class extending this class.
 * UUID is used for the generation ID.
 *
 */
class UniqidActiveRecord extends CActiveRecord {

	protected function beforeSave() {
		if($this->isNewRecord) {
			$this->id = $this->guid();
		}
		return true;
	}

	protected function guid(){
		if (function_exists('com_create_guid')){
			return com_create_guid();
		}else{
			mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
			$charid = strtoupper(md5(uniqid(rand(), true)));
			$hyphen = chr(45);// "-"
			$uuid = //chr(123)// "{"
			substr($charid, 0, 8)
			.substr($charid, 8, 4)
			.substr($charid,12, 4)
			.substr($charid,16, 4)
			.substr($charid,20,12);
			//.chr(125);// "}"
			return $uuid;
		}
	}

	 public function behaviors()
	{
		return array(
				'LoggableBehavior'=>
				'application.modules.auditTrail.behaviors.LoggableBehavior',
		);
	}
}

