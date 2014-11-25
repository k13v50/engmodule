<?php

/**
 * This is the model class for table "electrical_installations_permit".
 *
 * The followings are the available columns in table 'electrical_installations_permit':
 * @property string $id
 * @property string $app_num
 * @property integer $permit_num
 * @property string $owner_fname
 * @property string $owner_mname
 * @property string $owner_lname
 * @property integer $owner_tin
 * @property string $owner_phone
 * @property string $econ_act
 * @property string $ownership_form
 * @property string $work_scope
 * @property string $occupation_type
 * @property string $total_const_load
 * @property string $total_trans_cap
 * @property string $total_gen_cap
 * @property string $addr_num
 * @property string $addr_street
 * @property string $addr_brgy
 * @property string $addr_city_mun
 * @property string $loc_lot_num
 * @property string $loc_block_num
 * @property string $loc_tct_num
 * @property string $tax_dec_num
 * @property string $const_street
 * @property string $const_brgy
 * @property string $const_city_mun
 * @property integer $app_status
 * @property string $request_date
 * @property string $requested_by
 * @property string $update_date
 * @property string $updated_by
 * @property string $approved_by
 * @property string $approved_by_position
 * @property string $approval_date
 */
class ElectricalInstallationsPermit extends UniqidActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_electrical_installations_permit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('owner_tin, app_status', 'numerical', 'integerOnly'=>true),
			array('id, app_num, bldg_permit_num', 'length', 'max'=>64),
			array('owner_fname, owner_mname, owner_lname, owner_phone, addr_num, addr_street, addr_brgy, addr_city_mun, loc_lot_num, loc_block_num, loc_tct_num, tax_dec_num, const_street, const_brgy, const_city_mun, requested_by, updated_by', 'length', 'max'=>25),
			array('econ_act, ownership_form', 'length', 'max'=>100),
			array('work_scope', 'length', 'max'=>200),
			array('remarks', 'length', 'max'=>1000),
			array('occupation_type, total_const_load, total_trans_cap, total_gen_cap, approved_by, approved_by_position', 'length', 'max'=>50),
			array('request_date, update_date, approval_date, bldg_permit_num', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, app_num, permit_num, owner_fname, owner_mname, owner_lname, owner_tin, owner_phone, econ_act, ownership_form, work_scope, occupation_type, total_const_load, total_trans_cap, total_gen_cap, addr_num, addr_street, addr_brgy, addr_city_mun, loc_lot_num, loc_block_num, loc_tct_num, tax_dec_num, const_street, const_brgy, const_city_mun, status, request_date, requested_by, update_date, updated_by, approved_by, approved_by_position, approval_date', 'safe', 'on'=>'search'),
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
			'bldg_permit_num' => 'Bldg Permit Num',
			'app_num' => 'App Num',
			'permit_num' => 'Permit Num',
			'owner_fname' => 'First Name',
			'owner_mname' => 'Middle Name',
			'owner_lname' => 'Last Name',
			'owner_tin' => 'TIN',
			'owner_phone' => 'Contact Number',
			'econ_act' => 'Economic Activity',
			'ownership_form' => 'Form of Ownership',
			'work_scope' => 'Scope of Work',
			'occupation_type' => 'Type of Occupation',
			'total_const_load' => 'Total Connected Load',
			'total_trans_cap' => 'Total Transformer Capacity',
			'total_gen_cap' => 'Total Generated Capacity',
			'addr_num' => 'Address Number',
			'addr_street' => 'Verify Password',
			'addr_street' => 'Street',
			'addr_brgy' => 'Barangay',
			'addr_city_mun' => 'City/Municipality',
			'loc_lot_num' => 'LOT NO.',
			'loc_block_num' => 'BLK NO.',
			'loc_tct_num' => 'TCT NO.',
			'tax_dec_num' => 'Tax Dec. NO.',
			'const_street' => 'Street',
			'const_brgy' => 'Barangay',
			'const_city_mun' => 'City/Municipality',
			'app_status' => 'Permit Application Status',
			'request_date' => 'Request Date',
			'requested_by' => 'Requested By',
			'update_date' => 'Last Update Date',
			'updated_by' => 'Last Updated By',
			'approved_by' => 'Approved By',
			'approved_by_position' => 'Position of Approver',
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
		$criteria->compare('app_num',$this->app_num,true);
		$criteria->compare('permit_num',$this->permit_num);
		$criteria->compare('owner_fname',$this->owner_fname,true);
		$criteria->compare('owner_mname',$this->owner_mname,true);
		$criteria->compare('owner_lname',$this->owner_lname,true);
		$criteria->compare('owner_tin',$this->owner_tin);
		$criteria->compare('owner_phone',$this->owner_phone,true);
		$criteria->compare('econ_act',$this->econ_act,true);
		$criteria->compare('ownership_form',$this->ownership_form,true);
		$criteria->compare('work_scope',$this->work_scope,true);
		$criteria->compare('occupation_type',$this->occupation_type,true);
		$criteria->compare('total_const_load',$this->total_const_load,true);
		$criteria->compare('total_trans_cap',$this->total_trans_cap,true);
		$criteria->compare('total_gen_cap',$this->total_gen_cap,true);
		$criteria->compare('addr_num',$this->addr_num,true);
		$criteria->compare('addr_street',$this->addr_street,true);
		$criteria->compare('addr_brgy',$this->addr_brgy,true);
		$criteria->compare('addr_city_mun',$this->addr_city_mun,true);
		$criteria->compare('loc_lot_num',$this->loc_lot_num,true);
		$criteria->compare('loc_block_num',$this->loc_block_num,true);
		$criteria->compare('loc_tct_num',$this->loc_tct_num,true);
		$criteria->compare('tax_dec_num',$this->tax_dec_num,true);
		$criteria->compare('const_street',$this->const_street,true);
		$criteria->compare('const_brgy',$this->const_brgy,true);
		$criteria->compare('const_city_mun',$this->const_city_mun,true);
		$criteria->compare('app_status',$this->status);
		$criteria->compare('request_date',$this->request_date,true);
		$criteria->compare('requested_by',$this->requested_by,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('updated_by',$this->updated_by,true);
		$criteria->compare('approved_by',$this->approved_by,true);
		$criteria->compare('approved_by_position',$this->approved_by_position,true);
		$criteria->compare('approval_date',$this->approval_date,true);
		$criteria->compare('bldg_permit_num',$this->bldg_permit_num,true);
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
	 * @return ElectricalInstallationsPermit the static model class
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
