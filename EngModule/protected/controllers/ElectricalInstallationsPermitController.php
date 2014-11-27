<?php

class ElectricalInstallationsPermitController extends Controller
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
			} else if($user_type == UserTypeEnum::ADMIN){
				return array(
					array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('index','captcha','view','update','admin','delete','generatepdf','approve_permit','reject_permit'),
						'users'=>array('@'),
					),
					array('deny',  // deny all users
						'users'=>array('*'),
					),
				);
			}else if($user_type == UserTypeEnum::USER_MAINTENANCE){
				return array(
						array('deny', // allow authenticated user to perform 'create' and 'update' actions
								'actions'=>array('captcha','index','view','create','update','admin','delete','change_password'),
								'users'=>array('@'),
						),
						array('deny',  // deny all users
								'users'=>array('*'),
						),
				);
			}else if($user_type == UserTypeEnum::PERMIT_MAINTENANCE){
				return array(
						array('allow', // allow authenticated user to perform 'create' and 'update' actions
								'actions'=>array('index','captcha','view','update','admin','delete','generatepdf','approve_permit','reject_permit'),
								'users'=>array('@'),
						),
						array('deny',  // deny all users
								'actions'=>array('captcha','create','admin','delete'),
								'users'=>array('*'),
						),
				);
			}else{
				return array(
						array('allow', // allow authenticated user to perform 'create' and 'update' actions
								'actions'=>array('index','view','generatepdf'),
								'users'=>array('@'),
						),
						array('deny', // allow admin user to perform 'admin' and 'delete' actions
								'actions'=>array('create','admin','delete'),
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
	public function actionView($id=null, $permit_num=null)
	{
		if (isset($id)){
			$model = $this->loadModel($id);
		} else if ( isset($permit_num)){
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
		$model=new ElectricalInstallationsPermit;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ElectricalInstallationsPermit']))
		{
			$model->attributes=$_POST['ElectricalInstallationsPermit'];
			//$trans = Yii::app()->db->beginTransaction();
			try{
				$model->app_status = PermitAppStatusEnum::PENDING;
				if($model->save()){
					Yii::app()->session['permit_id'] = $model->id;
					$model = $this->loadModel($model->id);
					Yii::app()->user->setFlash('eiPermitSuccess','Permit Application Successful.');
					//$this->redirect(array('view','id'=>$model->id));
					$this->redirect(array('permitrequirements/create_eip','permit_num'=>'EIP'.$model->permit_num));
				}else{
					//$this->redirect(array('site/error',404));
					throw new CHttpException(404,'The requested page does not exist.');
				}
				//$trans->commit();
			}catch (Exception $e){
				//$trans->rollBack();
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

		if(isset($_POST['ElectricalInstallationsPermit']))
		{
			$model->attributes=$_POST['ElectricalInstallationsPermit'];
			$model->update_date = new CDbExpression('NOW()');
			$model->updated_by = Yii::app()->session['username'];
			if($model->save()){
				Yii::app()->user->setFlash('eiPermitUpdateSuccess','Permit Successfully Updated.');
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
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
			$dataProvider=new CActiveDataProvider('ElectricalInstallationsPermit', array(
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
			$dataProvider=new CActiveDataProvider('ElectricalInstallationsPermit');
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
		$model=new ElectricalInstallationsPermit('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ElectricalInstallationsPermit']))
			$model->attributes=$_GET['ElectricalInstallationsPermit'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Approve E. I. Permit
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

		if(isset($_POST['ElectricalInstallationsPermit']))
		{
			$model->attributes=$_POST['ElectricalInstallationsPermit'];

			$model->app_status = PermitAppStatusEnum::APPROVED;
			$model->update_date = new CDbExpression('NOW()');
			$model->updated_by = Yii::app()->session['username'];
			$model->approval_date = new CDbExpression('NOW()');
			$model->approved_by =  Yii::app()->session['username'];
			$model->approved_by_position = Yii::app()->session['user_position'];
			if($model->save())
				Yii::app()->user->setFlash('approveSuccess','Permit successfully approved.');
				$this->redirect(array('view','permit_num'=>$model->permit_num));
		}

		$this->render('approve_permit',array(
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

		if(isset($_POST['ElectricalInstallationsPermit']))
		{
			$model->attributes=$_POST['ElectricalInstallationsPermit'];

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
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ElectricalInstallationsPermit the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ElectricalInstallationsPermit::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelByPermitNum($permit_num)
	{
		$model=ElectricalInstallationsPermit::model()->findByAttributes(array('permit_num'=>$permit_num,));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelPending($id=null,$permit_num=null)
	{
		if (isset($id)){
			$model=ElectricalInstallationsPermit::model()->findByAttributes(array('id'=>$id,'app_status'=>PermitAppStatusEnum::PENDING));
		} else if ( isset($permit_num)){
			$model=ElectricalInstallationsPermit::model()->findByAttributes(array('permit_num'=>$permit_num,'app_status'=>PermitAppStatusEnum::PENDING));
		}else{
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ElectricalInstallationsPermit $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='electrical-installations-permit-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionGeneratepdf($var){
		$model = ElectricalInstallationsPermit::model()->findByPk($var);
		$pdf = Yii::app()->ePdf->mpdf();
		$pdf->WriteHTML($this->renderPartial('electricalpermit', array('model'=>$model),true));
		$pdf->Output();
	}

	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
			$this->render('error', $error);
	}
}
