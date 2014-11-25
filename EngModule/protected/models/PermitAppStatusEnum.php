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
class PermitAppStatusEnum extends Enum
{
	const PENDING = 0;
	const APPROVED = 1;
	const REJECTED = 2;
	const EXPIRED = 3;
	const DELETED = 4;

	public function _toDisplayValue($value){
		if(!$this->_isValidValue($value)){
			throw new Exception("Invalid Application Status.");
		}

		if($value == 1){
			return "Approved";
		}else if($value == 2){
			return "Rejected";
		}else if ($value == 3){
			return "Expired";
		}else if ($value == 4){
			return "Deleted";
		}else{
			return "Pending";
		}

	}
}