<?php
/* @var $this CitizenUserController */
/* @var $model CitizenUser */

$this->breadcrumbs=array(
	'Citizen Users'=>array('index'),
	$model->username=>array('view', 'username'=>$model->username),
	'Update',
);
if(Yii::app()->session['user_type'] == 0) {
	$this->menu=array(
			array('label'=>'Update User Details', 'url'=>array('update', 'username'=>$model->username)),
	);
}else {
	$this->menu=array(
		array('label'=>'List Citizen User', 'url'=>array('index')),
		array('label'=>'View Citizen User', 'url'=>array('view', 'username'=>$model->username)),
		array('label'=>'Manage Citizen User', 'url'=>array('admin'),'visible'=>!(Yii::app()->session['user_type'] == 0)),
	);
}
?>

<h1>Update Citizen User <?php echo $model->username; ?></h1>

<?php $this->renderPartial('_update_form', array('model'=>$model)); ?>