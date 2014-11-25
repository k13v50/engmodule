<?php

class BuildingPermitController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		if(Yii::app()->user->isGuest == false){
			$user_type = Yii::app()->session['user_type'];
			if($user_type == 0){
				return array(
						array('allow',  // allow all users to perform 'index' and 'view' actions
								'actions'=>array('index','view','create','update','generatepdf'),
								'users'=>array('@'),
						),
						array('deny',  // deny all users
								'users'=>array('@'),
						),
				);
			}else{
				return array(
					array('allow',  // allow all users to perform 'index' and 'view' actions
						'actions'=>array('index','view','generatepdf','delete','approve_permit','reject_permit','admin'),
						'users'=>array('@'),
					),
					array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('create','update','delete'),
						'users'=>array('@'),
					),
					array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('admin'),
						'users'=>array('admin'),
					),
					array('deny',  // deny all users
						'users'=>array('*'),
					),
				);
			}
		}else{
			return array(
					array('deny',
						'actions'=>array('index','create','update','index','view'),
						'users'=>array('*'),
					),
			);
		}
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	/* public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	} */

	public function actionView($id=null, $permit_num=null)
	{
		if (isset($id)){
			$model = $this->loadModel($id);
		} else if (isset($permit_num)){
			$model = $this->loadModelByPermitNum($permit_num);
		}
		if ($model===null)
			throw new CHttpException(404,'The requested page does not exist.');

		$this->render('view',array(
				'model'=>$model,
		));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new BuildingPermit;
		$eip = new ElectricalInstallationsPermit;
		$pp = new PlumbingPermit;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BuildingPermit']))
		{
			$model->attributes=$_POST['BuildingPermit'];

			$model->app_status = PermitAppStatusEnum::PENDING;
			$trans = Yii::app()->db->beginTransaction();
			try{
				if($model->save()){
					Yii::app()->session['permit_id'] = $model->id;
					$model = $this->loadModel($model->id);
					//initialize Electrical Installation Permit
					$eip->bldg_permit_num = $model->permit_num;
					$eip->owner_fname = $model->owner_fname;
					$eip->owner_mname = $model->owner_mname;
					$eip->owner_lname = $model->owner_lname;
					$eip->owner_tin = $model->owner_tin;
					$eip->owner_phone = $model->owner_phone;
					$eip->econ_act = $model->econ_act;
					$eip->ownership_form = $model->ownership_form;
					$eip->work_scope = $model->work_scope;
					$eip->occupation_type = $model->occupation_type;
					$eip->total_const_load = $model->total_const_load;
					$eip->total_trans_cap = $model->total_trans_cap;
					$eip->total_gen_cap = $model->total_gen_cap;
					$eip->addr_num = $model->addr_num;
					$eip->addr_street = $model->addr_street;
					$eip->addr_brgy = $model->addr_brgy;
					$eip->addr_city_mun = $model->addr_city_mun;
					$eip->loc_lot_num = $model->bldg_lot_num;
					$eip->loc_block_num = $model->bldg_block_num;
					$eip->loc_tct_num = $model->bldg_tct_num;
					$eip->tax_dec_num = $model->tax_dec_num;
					$eip->const_street = $model->const_street;
					$eip->const_brgy = $model->const_brgy;
					$eip->const_city_mun = $model->const_city_mun;
					$eip->app_status = $model->app_status;
					$eip->request_date = $model->request_date;
					$eip->requested_by = $model->requested_by;

					$pp->bldg_permit_num = $model->permit_num;
					$pp->owner_fname = $model->owner_fname;
					$pp->owner_mname = $model->owner_mname;
					$pp->owner_lname = $model->owner_lname;
					$pp->owner_tin = $model->owner_tin;
					$pp->ownership_form = $model->ownership_form;
					$pp->tax_dec_num = $model->tax_dec_num;
					$pp->work_scope = $model->work_scope;
					$pp->occupation_type = $model->occupation_type;
					$pp->addr_num = $model->addr_num;
					$pp->addr_street = $model->addr_street;
					$pp->addr_brgy = $model->addr_brgy;
					$pp->addr_city_mun = $model->addr_city_mun;
					$pp->loc_lot_num = $model->bldg_lot_num;
					$pp->loc_block_num = $model->bldg_block_num;
					$pp->loc_tct_num = $model->bldg_tct_num;
					$pp->const_street = $model->const_street;
					$pp->const_brgy = $model->const_brgy;
					$pp->const_city_mun = $model->const_city_mun;
					$pp->app_status = $model->app_status;
					$pp->request_date = $model->request_date;
					$pp->requested_by = $model->requested_by;
					if($eip->save() && $pp->save()){
						Yii::app()->user->setFlash('bldgPermitSuccess','Permit Application Successful.');
						$this->redirect(array('permitrequirements/create','permit_num'=>$model->permit_num));
					}else{
						$this->redirect(array('site/error',404));
					}
					$trans->commit();
				}
			}catch(Exception $e){
				$trans->rollBack();
				$this->redirect(array('site/error',$e->getMessage(),$e->getCode()));
			}

		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id=null, $permit_num=null)
	{
		$model = $this->loadModelPending($id,$permit_num);
		if ($model===null)
			throw new CHttpException(404,'The requested page does not exist.');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BuildingPermit']))
		{
			$model->attributes=$_POST['BuildingPermit'];
			$model->update_date = new CDbExpression('NOW()');
			$model->updated_by = Yii::app()->session['username'];
			if($model->save()){
				Yii::app()->user->setFlash('bldgPermitUpdateSuccess','Permit Successfully Updated.');
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Reject permit
	 * @param string $id
	 * @param string $permit_num
	 * @throws CHttpException
	 */
	public function actionReject_permit($id=null, $permit_num=null)
	{
		$model = $this->loadModelPending($id,$permit_num);
		if ($model===null)
			throw new CHttpException(404,'The requested page does not exist.');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BuildingPermit']))
		{
			$model->attributes=$_POST['BuildingPermit'];

			$model->app_status = PermitAppStatusEnum::REJECTED;
			$model->update_date = new CDbExpression('NOW()');
			$model->updated_by = Yii::app()->session['username'];
			if($model->save())
				Yii::app()->user->setFlash('rejectSuccess','Permit application have been rejected.');
				$this->redirect(array('view','permit_num'=>$model->permit_num));
		}

		$this->render('reject_permit',array(
				'model'=>$model,
		));
	}

	/**
	 * Approve a permit
	 * @param string $id
	 * @param string $permit_num
	 * @throws CHttpException
	 */
	public function actionApprove_permit($id=null, $permit_num=null)
	{
		$model = $this->loadModelPending($id,$permit_num);
		if ($model===null)
			throw new CHttpException(404,'The requested page does not exist.');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BuildingPermit']))
		{
			$model->attributes=$_POST['BuildingPermit'];

			$model->app_status = PermitAppStatusEnum::APPROVED;
			$model->update_date = new CDbExpression('NOW()');
			$model->updated_by = Yii::app()->session['username'];
			$model->approval_date = new CDbExpression('NOW()');

			$model->approved_by_position = Yii::app()->session['user_position'];
			$model->approved_by =  Yii::app()->session['fname']." ".Yii::app()->session['mname']." ".Yii::app()->session['fname'];

			if($model->save())
				Yii::app()->user->setFlash('approveSuccess','Permit successfully approved.');
				$this->redirect(array('view','permit_num'=>$model->permit_num));
		}

		$this->render('approve_permit',array(
				'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$user_type = Yii::app()->session['user_type'];
		if($user_type == 0){// load only permits requested/applied for by citizen user
			$username = Yii::app()->session['username'];
			$condition = "requested_by='".$username."'";
			$dataProvider=new CActiveDataProvider('BuildingPermit', array(
					'criteria'=>array(
							'condition'=>$condition,
							'order'=>'request_date DESC',
					),
					/* 'countCriteria'=>array(
							'condition'=>'app_status=1',
							// 'order' and 'with' clauses have no meaning for the count query
					), */
					'pagination'=>array(
							'pageSize'=>10,
					),
			));
			$this->render('index',array(
					'dataProvider'=>$dataProvider,
			));
		}else{
			$dataProvider=new CActiveDataProvider('BuildingPermit');
			$this->render('index',array(
					'dataProvider'=>$dataProvider,
			));
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new BuildingPermit('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BuildingPermit']))
			$model->attributes=$_GET['BuildingPermit'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return BuildingPermit the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=BuildingPermit::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelByPermitNum($permit_num)
	{
		$model=BuildingPermit::model()->findByAttributes(array('permit_num'=>$permit_num,));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelPending($id=null,$permit_num=null)
	{
		$model=null;
		if (isset($id)){
			$model=BuildingPermit::model()->findByAttributes(array('id'=>$id,'app_status'=>PermitAppStatusEnum::PENDING));
		} else if ( isset($permit_num)){
			$model=BuildingPermit::model()->findByAttributes(array('permit_num'=>$permit_num,'app_status'=>PermitAppStatusEnum::PENDING));
		}
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param BuildingPermit $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='building-permit-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionGeneratepdf($var){
		$model = BuildingPermit::model()->findByPk($var);
        $pdf = Yii::app()->ePdf->mpdf();
        $pdf->WriteHTML($this->renderPartial('buildingpermit', array('model'=>$model),true));
        $pdf->Output();
	}

	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
			$this->render('error', $error);
	}
}
