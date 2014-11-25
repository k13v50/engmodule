<?php
/**
 *
* @author francis labro
*
*	User Type Status Enum
*
* 0 - admin
* 1 - user maintenance
* 2 - permit maintenance
* 3 - view
*
*/
class UserTypeEnum extends Enum
{
	const ADMIN = 1;
	const USER_MAINTENANCE = 2;
	const PERMIT_MAINTENANCE = 3;
	const VIEW_USER = 4;

	public function _toDisplayValue($value){
		if(!$this->_isValidValue($value)){
			throw new Exception("Invalid Application Status.");
		}

		if($value == 1){
			return "SYSTEM ADMIN";
		}else if($value == 2){
			return "USER MAINTENANCE ADMIN";
		}else if($value == 3){
			return "PERMIT MAINTENANCE ADMIN";
		}else{
			return "VIEW USER";
		}

	}

	/**
	 * Returns an array ready to be used by a dropdown box with value as enum keys
	 * and texts as translated values
	 * @return array
	 */
	protected function _getLabelForDropDown()
	{
		if( !isset( $this->_dropDownValues ) )
		{
			$this->_dropDownValues = array( );
			foreach( $this->_getValidValues() as $value )
			{
				$this->_dropDownValues[$value] = $this->_toDisplayValue($value);
			}
		}
		return $this->_dropDownValues;
	}
}