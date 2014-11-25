<?php
/* @var $this CitizenUserController */
/* @var $model CitizenUser */

$this->breadcrumbs=array(
	'Citizen Users'=>array('index'),
	$model->username=>array('view', 'username'=>$model->username),
);

if(Yii::app()->session['user_type'] == 0) {
	$this->menu=array(
			array('label'=>'Update User Details', 'url'=>array('update', 'username'=>$model->username)),
			array('label'=>'Change Password', 'url'=>array('change_password', 'username'=>$model->username)),
	);
} else {
	$this->menu=array(
			array('label'=>'List of Citizen Users', 'url'=>array('index'),'visible'=>!(Yii::app()->session['user_type'] == 0)),
			array('label'=>'Update Citizen User Details', 'url'=>array('update', 'username'=>$model->username)),
			array('label'=>'Delete Citizen User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'visible'=>!(Yii::app()->session['user_type'] == 0)),
			array('label'=>'Manage Citizen Users', 'url'=>array('admin'),'visible'=>!(Yii::app()->session['user_type'] == 0)),
			array('label'=>'Approve Citizen User Registration', 'url'=>array('approve_user', 'username'=>$model->username),'visible'=>(!(Yii::app()->session['user_type'] == 0) && ($model->app_status == AppStatusEnum::PENDING))),
	);
}
?>
<?php if(Yii::app()->user->hasFlash('approveSuccess')): ?>
<div style="color: blue; font-weight: bold;font-size: 1.5em;"><?php echo Yii::app()->user->getFlash('approveSuccess');?></div>
<?php elseif(Yii::app()->user->hasFlash('success')): ?>
<div style="color: blue; font-weight: bold;font-size: 1.5em;"><?php echo Yii::app()->user->getFlash('success');?></div>
<?php elseif(Yii::app()->user->hasFlash('error')): ?>
<div style="color: red; font-weight: bold;font-size: 1.5em;"><?php echo Yii::app()->user->getFlash('error');?></div>
<h2>User Details: <?php echo $model->username; ?></h2>
<?php endif;?>
<b><?php echo CHtml::encode($model->getAttributeLabel('app_status')); ?>:</b>
<b><?php echo AppStatusEnum::toDisplayValue($model->app_status); ?></b>
<br/>
<br/>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'tin',
		'lastName',
		'firstName',
		'middleName',
		'email_add',
		'mobile_num',
		'addr_num',
		'addr_street',
		'addr_brgy',
		'addr_city_mun',
		'education',
		'employment_info',
		array(
			'name'=>'create_dt',
			'value'=>Yii::app()->dateFormatter->format('MMM dd, yyyy hh:ss a',$model->create_dt) ,
		),
		'updated_by',
		array(
			'name'=>'update_dt',
			'value'=>Yii::app()->dateFormatter->format('MMM dd, yyyy hh:ss a',$model->update_dt) ,
		),
		'approved_by',
		array(
			'name'=>'approval_dt',
			'value'=>Yii::app()->dateFormatter->format('MMM dd, yyyy hh:ss a',$model->approval_dt) ,
		),
	),
)); ?>
