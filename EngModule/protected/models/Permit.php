<?php
/**
 * abstract permit class
 * @author francis_labro
 *
 */
class Permit extends UniqidActiveRecord
{
	const PENDING = 0;
	const APPROVED = 1;
	const REJECTED = 2;
	const EXPIRED = 3;
	const DELETED = 4;

	function getPermitStatus(){
		return array(
				self::PENDING => 'Pending',
				self::APPROVED => 'Approved',
				self::REJECTED => 'Rejected',
				self::EXPIRED => 'Expired',
				self::DELETED => 'Deleted',
		);
	}
}