<?php

/**
 * This is the model class for table "tbl_citizen_user".
 *
 * The followings are the available columns in table 'tbl_citizen_user':
 * @property string $id
 * @property string $education
 * @property string $employment_info
 * @property integer $tin
 * @property string $firstName
 * @property string $middleName
 * @property string $lastName
 * @property string $password
 * @property string $addr_street
 * @property string $addr_brgy
 * @property string $addr_city_mun
 * @property string $addr_num
 * @property string $username
 * @property integer $app_status
 * @property string $remarks
 * @property string $email_add
 * @property string $create_dt
 * @property string $update_dt
 * @property string $updated_by
 * @property string $approval_dt
 * @property string $tin
 * @property string $approved_by
 * @property string $last_login_dt
 * @property string $mobile_num
 */
class CitizenUser extends UniqidActiveRecord
{

	public $_verifyPassword; //for password verification
	public $verifyCode; //for captcha
	public $newPassword;
	public $verifyNewPassword;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_citizen_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//field validations
			array('password', 'length', 'max'=>64, 'min'=>7),
			array('username', 'length', 'max'=>15, 'min'=>7),
			array('firstName,lastName', 'length', 'max'=>25),
			array('middleName,addr_num', 'length', 'max'=>20),
			array('addr_street,addr_brgy,addr_city_mun,email_add','length', 'max'=>50),
			array('tin', 'length','max'=>15, 'min'=>12),
			array('employment_info,education','length', 'max'=>75),
			array('mobile_num','length','max'=>13),

			//required fields
			array('tin,username, password,_verifyPassword,firstName,lastName,addr_num,addr_street,addr_brgy,addr_city_mun,email_add,mobile_num', 'required', 'on'=>'create'),
			array('firstName,lastName,addr_num,addr_street,addr_brgy,addr_city_mun,email_add,mobile_num', 'required', 'on'=>'update'),
			//scenario
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'on'=>'create'),
			array('_verifyPassword', 'length', 'max'=>40, 'on'=>'create'),
			array('password, newPassword, verifyNewPassword', 'required', 'on'=>'change_password'),
			// array for setting of safe variables
			array('create_dt, update_dt, approval_dt, approved_by, mobile_num, newPassword, verifyNewPassword', 'safe'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, education, employment_info, tin, firstName, middleName, lastName, addr_street, addr_brgy, addr_city_mun, addr_num, username, app_status, email_add, create_dt, update_dt, updated_by, approval_dt, approved_by, mobile_num', 'safe', 'on'=>'search'),

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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'education' => 'Educational Background',
			'employment_info' => 'Employment Information',
			'tin' => 'TIN',
			'firstName' => 'First Name',
			'middleName' => 'Middle Name',
			'lastName' => 'Last Name',
			'password' => 'Password',
			'verifyPassword' => 'Verify Password',
			'newPassword' => 'New Password',
			'verifyNewPassword' => 'Verify New Password',
			'addr_num' => 'Address Number',
			'addr_street' => 'Street',
			'addr_brgy' => 'Barangay',
			'addr_city_mun' => 'City/Municipality',
			'username' => 'Username',
			'app_status' => 'User Status',
			'remarks' => 'Remarks',
			'email_add' => 'Email Address',
			'create_dt' => 'Create Date',
			'update_dt' => 'Last Update Date',
			'updated_by' => 'Updated By',
			'approval_dt' => 'Approval Date',
			'approved_by' => 'Approved By',
			'verifyCode'=>'Verification Code',
			'last_login_dt' => 'Last Login Dt',
			'mobile_num' => 'Phone/Mobile Number',
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
		$criteria->compare('education',$this->education,true);
		$criteria->compare('employment_info',$this->employment_info,true);
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('middleName',$this->middleName,true);
		$criteria->compare('lastName',$this->lastName,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('addr_street',$this->addr_street,true);
		$criteria->compare('addr_brgy',$this->addr_brgy,true);
		$criteria->compare('addr_city_mun',$this->addr_city_mun,true);
		$criteria->compare('addr_num',$this->addr_num,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('app_status',$this->app_status);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('email_add',$this->email_add,true);
		$criteria->compare('create_dt',$this->create_dt,true);
		$criteria->compare('update_dt',$this->update_dt,true);
		$criteria->compare('updated_by',$this->updated_by,true);
		$criteria->compare('approval_dt',$this->approval_dt,true);
		$criteria->compare('tin',$this->tin,true);
		$criteria->compare('approved_by',$this->approved_by,true);
		$criteria->compare('last_login_dt',$this->last_login_dt,true);
		$criteria->compare('mobile_num',$this->mobile_num,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CitizenUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function countAllByStatus($status=null){
		$sql = "SELECT COUNT(*) FROM ".$this->tableName()." where app_status='".$status."';";
		return Yii::app()->db->createCommand($sql)->queryScalar();
	}
}
