<?php

class LguUserController extends Controller
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
		if(Yii::app()->user->isGuest == false && Yii::app()->session['user_type']!= 0){
			$user_type = Yii::app()->session['user_type'];
			//if($user_type == 0){
			return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
					'actions'=>array('captcha'),
					'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
					'actions'=>array('index','view','create','update','admin','delete','change_password'),
					'users'=>array('@'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions'=>array(),
					'users'=>array('admin'),
				),
				array('deny',  // deny all users
					'users'=>array('*'),
				),
			);
			//}
		}else{
			return array(
					array ('deny',  // deny all users
					'actions'=>array('index','view','create','update','admin','delete'),
					'users'=>array('*'),
					)
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
		$model=new LGU_User;

		if(isset($_POST['LGU_User']))
		{
			$model->attributes=$_POST['LGU_User'];

			$checker = LGU_User::model()->findByPk($model->username);
			$checker2 = CitizenUser::model()->findByAttributes(array('username'=>$model->username,));
			if($checker == null && $checker2==null){
				if($model->password == $model->_verifyPassword){
					$hasher1 = sha1($model->password);

					if($hasher1 == "da39a3ee5e6b4b0d3255bfef95601890afd80709"){
						$this->redirect(array('site/error'));
					}else{
						//$model->app_status = AppStatusEnum::PENDING;
						$model->password = $hasher1;

						if($model->userType_temp == 'ADMIN'){
							$model->user_type = 1;
						} else if($model->userType_temp == 'USER_MAINTENANCE'){
							$model->user_type = 2;
						} else if($model->userType_temp == 'PERMIT_MAINTENANCE'){
							$model->user_type = 3;
						} else {
							$model->user_type = 4;
						}
						$model->create_dt = new CDbExpression('NOW()');
						$model->created_by = Yii::app()->session['username'];
						if($model->save()){
							Yii::app()->user->setFlash('success','LGU User Account successfully created.');
							$this->redirect(array('view','id'=>$model->id));
						}
					}
				}else{
					//$this->redirect(array('site/password not match'));
					Yii::app()->user->setFlash('error','Password does not match.');
				}
			}else{
				//$this->redirect(array('site/duplicatedetected'));
				Yii::app()->user->setFlash('error','Username already exist.');
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
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['LGU_User']))
		{
			$model->attributes=$_POST['LGU_User'];
			if($model->userType_temp == 'ADMIN'){
				$model->user_type = 1;
			} else if($model->userType_temp == 'USER_MAINTENANCE'){
				$model->user_type = 2;
			} else if($model->userType_temp == 'PERMIT_MAINTENANCE'){
				$model->user_type = 3;
			} else {
				$model->user_type = 4;
			}
			$model->update_dt = new CDbExpression('NOW()');
			$model->updated_by = Yii::app()->session['username'];
			try{
				if($model->save()){
					Yii::app()->user->setFlash('success','LGU User update successful.');
					$this->redirect(array('view','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('LGU_User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new LGU_User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LGU_User']))
			$model->attributes=$_GET['LGU_User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


	/**
	 * Change the current user's password
	 */
	public function actionChange_password()
	{
		$model=new LGU_User('change_password');
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

		if(isset($_POST['LGU_User']))
		{
			$model->attributes=$_POST['LGU_User'];
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
	 * @return LGU_User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=LGU_User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelByUsername($username)
	{
		$model=LGU_User::model()->findByAttributes(array('username'=>$username,));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param LGU_User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='lgu--user-form')
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
