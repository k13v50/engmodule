<?php
class UserTypeDBEnum extends DBEnum
{
	const ADMIN = 1;
	const USER_MAINTENANCE = 2;
	const PERMIT_MAINTENANCE = 3;
	const VIEW_USER = 0;

	protected function getDBField()
	{
		return 'user_type_id';
	}

	protected function getDBTable()
	{
		return 'user_type';
	}

	// Optionally define a condition if only some values of
	//the table are to be taken into consideration
	/*
	 protected function getDBCondition()
	 {
	 return "other_field=value";
	 }*/

}