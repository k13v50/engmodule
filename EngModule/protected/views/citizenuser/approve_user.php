<?php
/* @var $this CitizenUserController */
/* @var $model CitizenUser */

$this->breadcrumbs=array(
	'Citizen Users'=>array('index'),
	$model->username=>array('view', 'username'=>$model->username),
	'Approve User',
);
	$this->menu=array(
		array('label'=>'List Citizen User', 'url'=>array('index')),
		array('label'=>'Manage Citizen User', 'url'=>array('admin'),'visible'=>!(Yii::app()->session['user_type'] == 0)),
	);
?>

<h2>Approve Citizen User: <?php echo " ".$model->username; ?></h2>

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

<?php $this->renderPartial('_approve_user', array('model'=>$model)); ?>