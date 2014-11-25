<?php

class PermitRequirementsController extends Controller
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
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','update'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
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
	public function actionCreate($permit_num)
	{
		$model=new PermitRequirements;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PermitRequirements']))
		{
			$model->attributes=$_POST['PermitRequirements'];
			$path = Yii::app()->basePath . '../uploads/';
			$model->permit_num = $permit_num;

			$uploadedFile1=CUploadedFile::getInstance($model,'req_file1');
			$uploadedFile2=CUploadedFile::getInstance($model,'req_file2');
			$uploadedFile3=CUploadedFile::getInstance($model,'req_file3');
			$uploadedFile4=CUploadedFile::getInstance($model,'req_file4');
			$uploadedFile5=CUploadedFile::getInstance($model,'req_file5');

			$fileName1 = time() . '_' . str_replace(' ', '_', strtolower($uploadedFile1));
			$fileName2 = time() . '_' . str_replace(' ', '_', strtolower($uploadedFile2));
			$fileName3 = time() . '_' . str_replace(' ', '_', strtolower($uploadedFile3));
			$fileName4 = time() . '_' . str_replace(' ', '_', strtolower($uploadedFile4));
			$fileName5 = time() . '_' . str_replace(' ', '_', strtolower($uploadedFile5));

			$model->req_file1 = $fileName1;
			$model->req_file1_type = $uploadedFile1->getType();

			$model->req_file2 = $fileName2;
			$model->req_file2_type = $uploadedFile2->getType();

			$model->req_file3 = $fileName3;
			$model->req_file3_type = $uploadedFile3->getType();

			$model->req_file4 = $fileName4;
			$model->req_file4_type = $uploadedFile4->getType();

			$model->req_file5 = $fileName5;
			$model->req_file5_type = $uploadedFile5->getType();

			if($model->save())
			{
				$path = $path.$model->id.'/';
				if (!is_dir($path)) {
					mkdir($path);
				}
				$uploadedFile1->saveAs($path.$fileName1);
				$uploadedFile2->saveAs($path.$fileName2);
				$uploadedFile3->saveAs($path.$fileName3);
				$uploadedFile4->saveAs($path.$fileName4);
				$uploadedFile5->saveAs($path.$fileName5);
				$this->redirect(array('buildingPermit/view', 'id'=>Yii::app()->session['permit_id']));
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
		Yii::app()->session['file1']=$model->req_file1;
		Yii::app()->session['file2']=$model->req_file2;
		Yii::app()->session['file3']=$model->req_file3;
		Yii::app()->session['file4']=$model->req_file4;
		Yii::app()->session['file5']=$model->req_file5;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PermitRequirements']))
		{
			/* $model->attributes=$_POST['PermitRequirements'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id)); */

			$_POST['PermitRequirements']['req_file1'] = $model->req_file1;
			$_POST['PermitRequirements']['req_file2'] = $model->req_file2;
			$_POST['PermitRequirements']['req_file3'] = $model->req_file3;
			$_POST['PermitRequirements']['req_file4'] = $model->req_file4;
			$_POST['PermitRequirements']['req_file5'] = $model->req_file5;
			$model->attributes=$_POST['PermitRequirements'];

			$path = Yii::app()->basePath . '../uploads/'.$model->id.'/';

			$uploadedFile1=CUploadedFile::getInstance($model,'req_file1');
			$uploadedFile2=CUploadedFile::getInstance($model,'req_file2');
			$uploadedFile3=CUploadedFile::getInstance($model,'req_file3');
			$uploadedFile4=CUploadedFile::getInstance($model,'req_file4');
			$uploadedFile5=CUploadedFile::getInstance($model,'req_file5');

			$fileName1 = $this->setFileName($uploadedFile1);
			$fileName2 = $this->setFileName($uploadedFile2);
			$fileName3 = $this->setFileName($uploadedFile3);
			$fileName4 = $this->setFileName($uploadedFile4);
			$fileName5 = $this->setFileName($uploadedFile5);

			if(!empty($uploadedFile1))  // check if uploaded file is set or not
			{
				$model->req_file1 = $fileName1;
				$model->req_file1_type = $uploadedFile1->getType();
			}
			if(!empty($uploadedFile2))  // check if uploaded file is set or not
			{
				$model->req_file2 = $fileName2;
				$model->req_file2_type = $uploadedFile2->getType();
			}
			if(!empty($uploadedFile3))  // check if uploaded file is set or not
			{
				$model->req_file3 = $fileName3;
				$model->req_file3_type = $uploadedFile3->getType();
			}
			if(!empty($uploadedFile4))  // check if uploaded file is set or not
			{
				$model->req_file4 = $fileName4;
				$model->req_file4_type = $uploadedFile4->getType();
			}
			if(!empty($uploadedFile5))  // check if uploaded file is set or not
			{
				$model->req_file5 = $fileName5;
				$model->req_file5_type = $uploadedFile5->getType();
			}

			if($model->save())
			{
				if(!empty($uploadedFile1))  // check if uploaded file is set or not
				{
					$uploadedFile1->saveAs($path.$fileName1);
				}
				if(!empty($uploadedFile2))  // check if uploaded file is set or not
				{
					$uploadedFile2->saveAs($path.$fileName2);
				}
				if(!empty($uploadedFile3))  // check if uploaded file is set or not
				{
					$uploadedFile3->saveAs($path.$fileName3);
				}
				if(!empty($uploadedFile4))  // check if uploaded file is set or not
				{
					$uploadedFile4->saveAs($path.$fileName4);
				}
				if(!empty($uploadedFile5))  // check if uploaded file is set or not
				{
					$uploadedFile5->saveAs($path.$fileName5);
				}
				Yii::app()->user->setFlash('updateSuccess','Permit Requirements Upload Successful.');
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
		$dataProvider=new CActiveDataProvider('PermitRequirements');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PermitRequirements('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PermitRequirements']))
			$model->attributes=$_GET['PermitRequirements'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PermitRequirements the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PermitRequirements::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelByPermitNum($permit_num)
	{
		$model=PermitRequirements::model()->findByAttributes(array('permit_num'=>$permit_num,));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	private function setFileName($filename){
		return time() . '_' . str_replace(' ', '_', strtolower($filename));
	}

	/**
	 * Performs the AJAX validation.
	 * @param PermitRequirements $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='permit-requirements-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
