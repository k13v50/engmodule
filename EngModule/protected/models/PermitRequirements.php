<?php

/**
 * This is the model class for table "tbl_permit_requirements".
 *
 * The followings are the available columns in table 'tbl_permit_requirements':
 * @property string $req_file1
 * @property string $req_file2
 * @property string $req_file3
 * @property string $req_file4
 * @property string $req_file5
 * @property string $req_file1_type
 * @property string $req_file2_type
 * @property string $req_file3_type
 * @property string $req_file4_type
 * @property string $req_file5_type
 * @property string $id
 */
class PermitRequirements extends UniqidActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_permit_requirements';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('req_file1, req_file2, req_file3, req_file4, req_file5','required', 'on'=>'insert'),
			array('req_file1, req_file1, req_file1, req_file1, req_file1', 'file', 'types' => 'jpg, png', 'allowEmpty' => false, 'maxSize' => 1024 * 1024 * 50, 'tooLarge' => 'The file was larger than 50MB. Please upload a smaller file.'),
			array('req_file1, req_file2, req_file3, req_file4, req_file5', 'file','types'=>'jpg, png', 'allowEmpty'=>true, 'on'=>'update',),
			//array('req_file1, req_file2, req_file3, req_file4, req_file5, req_file1_type, req_file2_type, req_file3_type, req_file4_type, req_file5_type', 'length', 'max'=>255),
			array('id', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('permit_num, req_file1, req_file2, req_file3, req_file4, req_file5, req_file1_type, req_file2_type, req_file3_type, req_file4_type, req_file5_type, id', 'safe', 'on'=>'search'),
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
			'req_file1' => 'Site Development and Location Plan',
			'req_file2' => 'Architectural Plan',
			'req_file3' => 'Structural Design',
			'req_file4' => 'Land Title and Tax Declaration',
			'req_file5' => 'Latest Tax Receipt',
			'req_file1_type' => 'File Type',
			'req_file2_type' => 'File Type',
			'req_file3_type' => 'File Type',
			'req_file4_type' => 'File Type',
			'req_file5_type' => 'File Type',
			'id' => 'Permit Requirement ID',
			'permit_num' => 'Permit Application Num',
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

		$criteria->compare('req_file1',$this->req_file1,true);
		$criteria->compare('req_file2',$this->req_file2,true);
		$criteria->compare('req_file3',$this->req_file3,true);
		$criteria->compare('req_file4',$this->req_file4,true);
		$criteria->compare('req_file5',$this->req_file5,true);
		$criteria->compare('req_file1_type',$this->req_file1_type,true);
		$criteria->compare('req_file2_type',$this->req_file2_type,true);
		$criteria->compare('req_file3_type',$this->req_file3_type,true);
		$criteria->compare('req_file4_type',$this->req_file4_type,true);
		$criteria->compare('req_file5_type',$this->req_file5_type,true);
		$criteria->compare('id',$this->id,true);
		$criteria->compare('permit_num',$this->permit_num,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PermitRequirements the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
