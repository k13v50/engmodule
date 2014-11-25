<?php
/**
 *
 * @author francis labro
 *
 *	Application Status Enum
 *
 * 0 - pending
 * 1 - approved
 * 2 - deleted
 *
 */
class AppStatusEnum extends Enum
{
	const PENDING = 0;
	const ACTIVE = 1;
	const DELETED = 2;

	public function _toDisplayValue($value){
		if(!$this->_isValidValue($value)){
			throw new Exception("Invalid Application Status.");
		}

		if($value == 1){
			return "Active";
		}else if($value == 2){
			return "Deleted";
		}else{
			return "Pending";
		}

	}
}