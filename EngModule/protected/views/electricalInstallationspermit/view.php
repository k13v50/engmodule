<?php
/* @var $this ElectricalInstallationsPermitController */
/* @var $model ElectricalInstallationsPermit */

$this->breadcrumbs=array(
	'Electrical Installations Permits'=>array('index'),
	"Permit #".$model->permit_num,
);

$this->menu=array(
	array('label'=>'List Permit(s)', 'url'=>array('index')),
	//array('label'=>'Create Permit', 'url'=>array('create')),
	array('label'=>'Update Permit', 'url'=>array('update', 'permit_num'=>$model->permit_num),'visible'=>($model->app_status != PermitAppStatusEnum::APPROVED)),
	array('label'=>'Delete Permit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),
			'visible'=>($model->app_status != PermitAppStatusEnum::APPROVED)),
	array('label'=>'Manage Permit', 'url'=>array('admin'),'visible'=>!(Yii::app()->session['user_type'] == 0)),
	array('label'=>'Approve Permit', 'url'=>array('approve_permit','id'=>$model->id),'visible'=>(($model->app_status == PermitAppStatusEnum::PENDING) && !(Yii::app()->session['user_type'] == 0))),
	array('label'=>'Reject Permit', 'url'=>array('reject_permit','id'=>$model->id),'visible'=>(($model->app_status == PermitAppStatusEnum::PENDING) && !(Yii::app()->session['user_type'] == 0))),
	array('label'=>'Generate PDF', 'url'=>array('generatepdf','var'=>$model->id),'visible'=>($model->app_status == PermitAppStatusEnum::APPROVED)),
);
?>
<?php if(Yii::app()->user->hasFlash('approveSuccess')): ?>
<div style="color: blue; font-weight: bold;font-size: 1.5em;"><?php echo Yii::app()->user->getFlash('approveSuccess');?></div>
<?php elseif (Yii::app()->user->hasFlash('eiPermitSuccess')):?>
<div style="color: blue; font-weight: bold;font-size: 1.5em;"><?php echo Yii::app()->user->getFlash('eiPermitSuccess');?></div>
<?php elseif (Yii::app()->user->hasFlash('eiPermitUpdateSuccess')):?>
<div style="color: blue; font-weight: bold;font-size: 1.5em;"><?php echo Yii::app()->user->getFlash('eiPermitUpdateSuccess');?></div>
<?php elseif (Yii::app()->user->hasFlash('rejectSuccess')):?>
<div style="color: red; font-weight: bold;font-size: 1.5em;"><?php echo Yii::app()->user->getFlash('rejectSuccess');?></div>
<?php else: ?>
<h2>View Electrical Installations Permit #<?php echo " ".$model->permit_num; ?></h2>
<?php endif;?>
<b><?php echo CHtml::encode($model->getAttributeLabel('app_status')); ?>:</b>
<b><?php echo PermitAppStatusEnum::toDisplayValue($model->app_status); ?></b>
<br/>
<br/>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'permit_num',
		'bldg_permit_num',
		'owner_fname',
		'owner_mname',
		'owner_lname',
		'owner_tin',
		'owner_phone',
		'occupation_type',
		'addr_num',
		'addr_street',
		'addr_brgy',
		'addr_city_mun',
		'const_street',
		'const_brgy',
		'const_city_mun',
		'loc_lot_num',
		'loc_block_num',
		'loc_tct_num',
		'econ_act',
		'ownership_form',
		'work_scope',
		'tax_dec_num',
		'total_const_load',
		'total_trans_cap',
		'total_gen_cap',
		'requested_by',
		array(
				'name'=>'request_date',
				'value'=>Yii::app()->dateFormatter->format('MMM dd, yyyy hh:ss a',$model->request_date),
		),
		'updated_by',
		array(
				'name'=>'update_date',
				'value'=>Yii::app()->dateFormatter->format('MMM dd, yyyy hh:ss a',$model->update_date),
		),
		'approved_by',
		'approved_by_position',
		array(
				'name'=>'approval_date',
				'value'=>Yii::app()->dateFormatter->format('MMM dd, yyyy hh:ss a',$model->approval_date),
		),
		'remarks',
	),
)); ?>
