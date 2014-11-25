<?php

/**
 * This is the model class for table "gov_user".
 *
 * The followings are the available columns in table 'gov_user':
 * @property string $id
 * @property string $employee_no
 * @property string $firstName
 * @property string $middleName
 * @property string $lastName
 * @property string $salary_type
 * @property string $salary
 * @property string $civil_status
 * @property string $tin
 * @property string $gender
 * @property string $position
 * @property string $username
 * @property string $password
 */
class LGU_User extends UniqidActiveRecord
{
	public $_verifyPassword;
	public $verifyCode; //for captcha
	public $userType_temp;
	public $newPassword;
	public $verifyNewPassword;

	const admin = "ADMIN";
	const user_admin = "USER_MAINTENANCE";
	const permit_admin = "PERMIT_MAINTENANCE";
	const view_admin = "VIEW_USER";

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_lgu_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tin, username, password, _verifyPassword, firstName, lastName, employee_no, position', 'required', 'on'=>'insert'),
			array('tin, firstName, lastName, employee_no, position', 'required', 'on'=>'update'),
			array('password, username', 'length', 'max'=>40),
			array('employee_no, firstName, middleName, lastName, position', 'length', 'max'=>25),
			array('civil_status, tin, gender', 'length', 'max'=>50),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(),'on'=>'insert'),
			//array for safe variables
			array('userType_temp, newPassword, verifyNewPassword, update_dt, updated_by, created_by','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('employee_no, firstName, middleName, lastName, salary_type, salary, civil_status, tin, gender, position, username', 'safe', 'on'=>'search'),
			//change password
			array('password, newPassword, verifyNewPassword', 'required', 'on'=>'change_password'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	public function _getUserTypes(){
		return array(UserTypeEnum::getLabelForDropDown());
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'tin' => 'TIN',
			'employee_no' => 'Employee Number',
			'firstName' => 'First Name',
			'middleName' => 'Middle Name',
			'lastName' => 'Last Name',
			'civil_status' => 'Civil Status',
			'gender' => 'Gender',
			'position' => 'Position',
			'verifyCode'=>'Verification Code',
			'user_type'=>'User Type',
			'create_dt' => 'User create date',
			'last_login_dt' => 'Last login date',
			'newPassword' => 'New Password',
			'verifyNewPassword' => 'Verify New Password',
			'update_dt' => 'Last Update Date',
			'updated_by' => 'Updated By',
			'created_by' => 'Created By',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('employee_no',$this->employee_no,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('middleName',$this->middleName,true);
		$criteria->compare('lastName',$this->lastName,true);
		$criteria->compare('civil_status',$this->civil_status,true);
		$criteria->compare('tin',$this->tin,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('user_type',$this->user_type,true);
		$criteria->compare('create_dt',$this->create_dt,true);
		$criteria->compare('last_login_dt',$this->last_login_dt,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getRoleOptions(){
		return array(
				self::admin => 'ADMIN',
				self::user_admin => 'USER_MAINTENANCE',
				self::permit_admin => 'PERMIT_MAINTENANCE',
				self::view_admin => 'VIEW_USER');
	}

	public function findByUsername($username){
		return $this->findByAttributes(array('username'=>$this->username,))[0];
	}

	public function getGender(){
		return array(
				'Male' => 'Male',
				'Female' => 'Female');
	}

}
