<?php

/**
 * This is the model class for table "building_permit".
 *
 * The followings are the available columns in table 'building_permit':
 * @property string $id
 * @property string $owner_fname
 * @property string $request_date
 * @property integer $owner_tin
 * @property string $owner_phone
 * @property string $owner_mname
 * @property string $owner_lname
 * @property string $econ_act
 * @property string $ownership_form
 * @property string $work_scope
 * @property string $tax_dec_num
 * @property string $occupation_type
 * @property string $addr_num
 * @property string $addr_street
 * @property string $addr_brgy
 * @property string $addr_city_mun
 * @property string $bldg_lot_num
 * @property string $bldg_block_num
 * @property string $bldg_tct_num
 * @property string $const_street
 * @property string $const_brgy
 * @property string $const_city_mun
 * @property integer $permit_num
 * @property string $app_num
 * @property integer $app_status
 * @property string $total_const_load
 * @property string $total_trans_cap
 * @property string $total_gen_cap
 * @property string $update_date
 * @property string $updated_by
 * @property string $approved_by
 * @property string $approved_by_position
 * @property string $requested_by
 * @property string $approval_date
 */
class BuildingPermit extends UniqidActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_building_permit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('app_status', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>64),
			array('owner_fname, owner_phone, owner_mname, owner_lname, tax_dec_num, addr_num, bldg_lot_num, bldg_block_num, bldg_tct_num', 'length', 'max'=>25),
			array('econ_act, ownership_form', 'length', 'max'=>100),
			array('work_scope', 'length', 'max'=>200),
			array('remarks', 'length', 'max'=>1000),
			array('occupation_type, addr_street, addr_brgy, addr_city_mun, const_street, const_brgy, const_city_mun, app_num, total_const_load, total_trans_cap, total_gen_cap, updated_by, approved_by, approved_by_position, requested_by', 'length', 'max'=>50),
			array('owner_tin,request_date, update_date, approval_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, owner_fname, request_date, owner_tin, owner_phone, owner_mname, owner_lname, econ_act, ownership_form, work_scope, tax_dec_num, occupation_type, addr_num, addr_street, addr_brgy, addr_city_mun, bldg_lot_num, bldg_block_num, bldg_tct_num, const_street, const_brgy, const_city_mun, permit_num, app_num, app_status, total_const_load, total_trans_cap, total_gen_cap, update_date, updated_by, approved_by, approved_by_position, requested_by, approval_date', 'safe', 'on'=>'search'),
			array('owner_fname,owner_mname,owner_lname,owner_tin,owner_phone,econ_act,ownership_form,work_scope,tax_dec_num,occupation_type,addr_num,addr_street,addr_brgy,addr_city_mun,bldg_lot_num,bldg_block_num,bldg_tct_num,const_street,const_brgy,const_city_mun,total_const_load,total_trans_cap,total_gen_cap','required','on'=>'create'),
			array('owner_fname,owner_mname,owner_lname,owner_tin,owner_phone,econ_act,ownership_form,work_scope,tax_dec_num,occupation_type,addr_num,addr_street,addr_brgy,addr_city_mun,bldg_lot_num,bldg_block_num,bldg_tct_num,const_street,const_brgy,const_city_mun,total_const_load,total_trans_cap,total_gen_cap','required','on'=>'update'),
			array('remarks', 'required' , 'on'=>'approve_reject'),
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
			'owner_fname' => 'First Name',
			'owner_mname' => 'Middle Name',
			'owner_lname' => 'Last Name',
			'request_date' => 'Request Date',
			'owner_tin' => 'TIN',
			'owner_phone' => 'Contact Number',
			'econ_act' => 'Main Economic Business Activity',
			'ownership_form' => 'Form of Ownership',
			'work_scope' => 'Scope of Work',
			'tax_dec_num' => 'Tax Dec. NO.',
			'occupation_type' => 'Type of Occupation',
			'addr_num' => 'Address Number',
			'addr_street' => 'Street',
			'addr_brgy' => 'Barangay',
			'addr_city_mun' => 'City/Municipality',
			'bldg_lot_num' => 'LOT NO.',
			'bldg_block_num' => 'BLK NO.',
			'bldg_tct_num' => 'TCT NO.',
			'const_street' => 'Street',
			'const_brgy' => 'Barangay',
			'const_city_mun' => 'City/Municipality',
			'permit_num' => 'Building Permit Number',
			'app_num' => 'App Num',//reserved for actual permit number
			'app_status' => 'Permit Application Status',
			'total_const_load' => 'Total Connected Load',
			'total_trans_cap' => 'Total Transformer Capacity',
			'total_gen_cap' => 'Total Generated Capacity',
			'update_date' => 'Last Update Date',
			'updated_by' => 'Last Updated By',
			'approved_by' => 'Approved By',
			'approved_by_position' => 'Position of Approver',
			'requested_by' => 'Requested By',
			'approval_date' => 'Approval Date',
			'remarks' => 'Remarks',
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
		$criteria->compare('owner_fname',$this->owner_fname,true);
		$criteria->compare('request_date',$this->request_date,true);
		$criteria->compare('owner_tin',$this->owner_tin);
		$criteria->compare('owner_phone',$this->owner_phone,true);
		$criteria->compare('owner_mname',$this->owner_mname,true);
		$criteria->compare('owner_lname',$this->owner_lname,true);
		$criteria->compare('econ_act',$this->econ_act,true);
		$criteria->compare('ownership_form',$this->ownership_form,true);
		$criteria->compare('work_scope',$this->work_scope,true);
		$criteria->compare('tax_dec_num',$this->tax_dec_num,true);
		$criteria->compare('occupation_type',$this->occupation_type,true);
		$criteria->compare('addr_num',$this->addr_num,true);
		$criteria->compare('addr_street',$this->addr_street,true);
		$criteria->compare('addr_brgy',$this->addr_brgy,true);
		$criteria->compare('addr_city_mun',$this->addr_city_mun,true);
		$criteria->compare('bldg_lot_num',$this->bldg_lot_num,true);
		$criteria->compare('bldg_block_num',$this->bldg_block_num,true);
		$criteria->compare('bldg_tct_num',$this->bldg_tct_num,true);
		$criteria->compare('const_street',$this->const_street,true);
		$criteria->compare('const_brgy',$this->const_brgy,true);
		$criteria->compare('const_city_mun',$this->const_city_mun,true);
		$criteria->compare('permit_num',$this->permit_num);
		$criteria->compare('app_num',$this->app_num,true);
		$criteria->compare('app_status',$this->app_status);
		$criteria->compare('total_const_load',$this->total_const_load,true);
		$criteria->compare('total_trans_cap',$this->total_trans_cap,true);
		$criteria->compare('total_gen_cap',$this->total_gen_cap,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('updated_by',$this->updated_by,true);
		$criteria->compare('approved_by',$this->approved_by,true);
		$criteria->compare('approved_by_position',$this->approved_by_position,true);
		$criteria->compare('requested_by',$this->requested_by,true);
		$criteria->compare('approval_date',$this->approval_date,true);
		$criteria->compare('remarks',$this->remarks,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function findAllByUsernameAndStatus($username=null,$status=null){
		if(isset($username) && isset($status)){
			return $this->findByAttributes(array('requested_by'=>$username,'app_status'=>$status));
		}else if(isset($username)){
			return $this->findByAttributes(array('requested_by'=>$username));
		}else if(isset($status)){
			return $this->findByAttributes(array('app_status'=>$status));
		}else{
			return null;
		}
	}

	public function countAllByStatus($status=null){
		$sql = "SELECT COUNT(*) FROM ".$this->tableName()." where app_status='".$status."';";
		return Yii::app()->db->createCommand($sql)->queryScalar();
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BuildingPermit the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	protected function beforeSave() {

		if($this->isNewRecord) {
			 $this->request_date = new CDbExpression('NOW()');
			 $this->requested_by = Yii::app()->session['username'];
		}

		parent::beforeSave();

		return true;
	}
}
