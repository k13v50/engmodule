<?php

class CitizenUserController extends Controller
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
			$usertype = Yii::app()->session['user_type'];
			if($usertype == 0){ // if citizen user
					return array(
						array('allow', // allow authenticated user to perform 'view' and 'update' actions
								'actions'=>array('view','update','change_password'),
								'users'=>array('@'),
						),
						array('deny', // deny citizen users to 'admin' and 'delete' actions
							'actions'=>array('admin','delete','create'),
							'users'=>array('*'),
						),
					);
			} else if($usertype == UserTypeEnum::ADMIN){// admin user - can access all functions
				return array(
						array('allow', // allow authenticated user to perform 'view' and 'update' actions
								'actions'=>array('index','view','update','delete','admin','approve_user'),
								'users'=>array('@'),
						),
				);
			} else if($usertype == UserTypeEnum::USER_MAINTENANCE){// user management user - can access all citizen user functions
				return array(
						array('allow', // allow authenticated user to perform 'view' and 'update' actions
								'actions'=>array('index','view','update','delete','admin','approve_user'),
								'users'=>array('@'),
						),
				);
			}else{//LGU view user - can only access to view users
				return array(
						array('allow', // allow authenticated user to perform 'view' and 'update' actions
								'actions'=>array('index','view'),
								'users'=>array('@'),
						),
				);
			}
		} else {
			return array(
				array('allow',  // allow users to perform 'create' and 'login' actions
					'actions'=>array('create','captcha','login'),
					'users'=>array('*'),
						),
				array('deny',
					'actions'=>array('index','create','update','index','view'),
					'users'=>array('*'),
						),
			);
		}

	}

	public function actions()
	{
		return array(
				// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha'=>array(
						'class'=>'CCaptchaAction',
						'backColor'=>0xFFFFFF,
				),
		);
	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id=null, $username=null) //same
	{
		if (isset($id)){
			$model = $this->loadModel($id);
		} else if ( isset($username)){
			$model = $this->loadModelByUsername($username);
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
		$model=new CitizenUser;
		$model->scenario='create';
		if(isset($_POST['CitizenUser']))
		{
			$model->attributes=$_POST['CitizenUser'];

			$username_checker = $this->loadModelByUsername($model->username); //make sure username does not exist
			$username_checker2 = LGU_User::model()->findByAttributes(array('username'=>$model->username,));
			$tin_checker = $this->loadModelByTIN($model->tin); //make sure tin does not exist
			if($username_checker === null && $username_checker2 === null ){
				if($tin_checker === null){
					if($model->password == $model->_verifyPassword){ //check if new and verify password are the same
						$hasher1 = sha1($model->password); // hash password

						if($hasher1 == "da39a3ee5e6b4b0d3255bfef95601890afd80709"){
							$this->redirect(array('site/error'));
						}else{
							$model->app_status = AppStatusEnum::PENDING;
							$model->password = $hasher1;
							$model->create_dt = new CDbExpression('NOW()');
							if($model->save())
								//$this->redirect(array('view','id'=>$model->id));
								$this->redirect(array('registration_success','id'=>$model->id));
						}
					}else{
						Yii::app()->user->setFlash('error','Password does not match.');
						//$this->redirect(array('site/error_page','message'=>'Password does not match.'));
					}
				}else{
					Yii::app()->user->setFlash('error','TIN already registered to another user.');
					//$this->redirect(array('site/error_page','message'=>'TIN already registered to another user.'));
				}
			}else{
				Yii::app()->user->setFlash('error','Username already exist.');
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionRegistration_success($id){
		$this->render('registration_success',array(
				'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id=null, $username=null) //same
	{
		if (isset($id)){
			$model = $this->loadModel($id);
		} else if ( isset($username)){
			$model = $this->loadModelByUsername($username);
		}
		if ($model===null)
			throw new CHttpException(404,'The requested page does not exist.');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->scenario='update';
		if(isset($_POST['CitizenUser']))
		{
			$model->attributes=$_POST['CitizenUser'];
			$model->update_dt = new CDbExpression('NOW()');
			$model->updated_by = Yii::app()->session['username'];
			try{
				if($model->save()){
					Yii::app()->user->setFlash('success','User details update successful.');
					$this->redirect(array('view','username'=>$model->username));
				}
			}catch(Exception $e){
				$this->redirect(array('site/error',$e->getMessage(),$e->getCode()));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionApprove_user($id=null, $username=null) //action to approve the user
	{
		if (isset($id)){
			$model = $this->loadModel($id);
		} else if ( isset($username)){
			$model = $this->loadModelByUsername($username);
		}
		if ($model===null)
			throw new CHttpException(404,'The requested page does not exist.');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CitizenUser']))
		{
			$model->attributes=$_POST['CitizenUser'];

			$model->app_status = AppStatusEnum::ACTIVE;
			$model->update_dt = new CDbExpression('NOW()');
			$model->updated_by = Yii::app()->session['username'];
			$model->approval_dt = new CDbExpression('NOW()');
			$model->approved_by =  Yii::app()->session['username'];
			if($model->save()){
				Yii::app()->user->setFlash('approveSuccess','Citizen User registration successfully approved.');
				$this->redirect(array('view','username'=>$model->username));
			}
		}

		$this->render('approve_user',array(
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
		$user_id = Yii::app()->session['user_id'];
		if($user_type == 0){
			$this->render('view',array(
					'model'=>$this->loadModel($user_id),
			));
		}else{
			$dataProvider=new CActiveDataProvider('CitizenUser');
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
		$model=new CitizenUser('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CitizenUser']))
			$model->attributes=$_GET['CitizenUser'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Change the current user's password
	 */
	public function actionChange_password()
	{
		$model=new CitizenUser('change_password');
		$model->username = Yii::app()->session['username'];
		$model_checker = $this->loadModelByUsername(Yii::app()->session['username']);
		$model->scenario='change_password';
		// uncomment the following code to enable ajax-based validation
		 /*
		 if(isset($_POST['ajax']) && $_POST['ajax']==='citizen-user-change_password-form')
		 {
		 	echo CActiveForm::validate($model);
		 	Yii::app()->end();
		 }
		 */

		if(isset($_POST['CitizenUser']))
		{
			$model->attributes=$_POST['CitizenUser'];
			if($model_checker != null){
				if($model->newPassword == $model->verifyNewPassword){
					 //check if new and verify password are the same
						$hasher1 = sha1($model->password); // hash password
						if($hasher1 == $model_checker->password){
							$hasher1 = sha1($model->newPassword);
							if($hasher1 == "da39a3ee5e6b4b0d3255bfef95601890afd80709"){
								$this->redirect(array('site/error'));
							}else{
								$model_checker->password = $hasher1;
								$model_checker->update_dt = new CDbExpression('NOW()');
								$model_checker->updated_by = Yii::app()->session['username'];
								if($model_checker->save()){
									Yii::app()->user->setFlash('success','Password successfully changed.');
									$this->redirect(array('view','username'=>$model_checker->username));
								}
							}
					}else{
						Yii::app()->user->setFlash('error','Invalid password.');
					}
				}else{
					Yii::app()->user->setFlash('error','New Passwords does not match.');
				}
			}
		}
		$this->render('change_password',array('model'=>$model));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CitizenUser the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CitizenUser::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CitizenUser the loaded model
	 * @throws CHttpException
	 */
	public function loadModelByUsername($username)
	{
		$model=CitizenUser::model()->findByAttributes(array('username'=>$username,));
		return $model;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CitizenUser the loaded model
	 * @throws CHttpException
	 */
	public function loadModelByTIN($tin)
	{
		$model=CitizenUser::model()->findByAttributes(array('tin'=>$tin,));
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CitizenUser $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='citizen-user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
			$this->render('error', $error);
	}
}
