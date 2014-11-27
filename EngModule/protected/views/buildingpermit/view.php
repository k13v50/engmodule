<?php
/* @var $this BuildingPermitController */
/* @var $model BuildingPermit */

$this->breadcrumbs=array(
	'Building Permits'=>array('index'),
	"Permit #".$model->permit_num,
);

$this->menu=array(
	array('label'=>'List Permit Application(s)', 'url'=>array('index')),
	array('label'=>'Apply for Permit', 'url'=>array('create')),
	array('label'=>'Update Permit Application(s)', 'url'=>array('update', 'permit_num'=>$model->permit_num),'visible'=>($model->app_status == PermitAppStatusEnum::PENDING)),
	array('label'=>'Delete Permit Application(s)', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),
			'visible'=>($model->app_status != PermitAppStatusEnum::APPROVED)),
	array('label'=>'Manage Permit Application(s)', 'url'=>array('admin'),'visible'=>!(Yii::app()->session['user_type'] == 0)),
	array('label'=>'Approve Permit Application', 'url'=>array('approve_permit','id'=>$model->id),'visible'=>(($model->app_status == PermitAppStatusEnum::PENDING) && !(Yii::app()->session['user_type'] == 0))),
	array('label'=>'Reject Permit Application', 'url'=>array('reject_permit','id'=>$model->id),'visible'=>(($model->app_status == PermitAppStatusEnum::PENDING) && !(Yii::app()->session['user_type'] == 0))),
	array('label'=>'Generate Permit PDF', 'url'=>array('generatepdf','var'=>$model->id),'visible'=>($model->app_status == PermitAppStatusEnum::APPROVED)),
);
?>
<?php if(Yii::app()->user->hasFlash('approveSuccess')): ?>
<div style="color: blue; font-weight: bold;font-size: 1.5em;"><?php echo Yii::app()->user->getFlash('approveSuccess');?></div>
<?php elseif (Yii::app()->user->hasFlash('bldgPermitSuccess')):?>
<div style="color: blue; font-weight: bold;font-size: 1.5em;"><?php echo Yii::app()->user->getFlash('bldgPermitSuccess');?></div>
<?php elseif (Yii::app()->user->hasFlash('bldgPermitUpdateSuccess')):?>
<div style="color: blue; font-weight: bold;font-size: 1.5em;"><?php echo Yii::app()->user->getFlash('bldgPermitUpdateSuccess');?></div>
<?php elseif (Yii::app()->user->hasFlash('rejectSuccess')):?>
<div style="color: red; font-weight: bold;font-size: 1.5em;"><?php echo Yii::app()->user->getFlash('rejectSuccess');?></div>
<?php else: ?>
<h2>View Building Permit #<?php echo " ".$model->permit_num; ?></h2>
<?php endif;?>
<b><?php echo CHtml::encode($model->getAttributeLabel('app_status')); ?>:</b>
<b><?php echo PermitAppStatusEnum::toDisplayValue($model->app_status); ?></b>
<br/>
<b>Permit Requirements:</b>
<?php echo CHtml::link("Uploaded Requirements", array('permitrequirements/view', 'permit_num'=>$model->permit_num)); ?>
<br/>
<br/>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'permit_num',
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
		'bldg_lot_num',
		'bldg_block_num',
		'bldg_tct_num',
		'econ_act',
		'ownership_form',
		'work_scope',
		'tax_dec_num',
		'total_const_load',
		'total_trans_cap',
		'total_gen_cap',
		'requested_by',
		/* array(
				'name'=>'request_date',
				'value'=>Yii::app()->dateFormatter->format('MMM dd, yyyy hh:mm:ss a',$model->request_date),
		), */
		'request_date',
		'updated_by',
		/* array(
				'name'=>'update_date',
				'value'=>Yii::app()->dateFormatter->format('MMM dd, yyyy hh:mm:ss a',$model->update_date),
		), */
		'update_date',
		'approved_by',
		'approved_by_position',
		/* array(
				'name'=>'approval_date',
				'value'=>Yii::app()->dateFormatter->format('MMM dd, yyyy hh:mm:ss a',$model->approval_date),
		), */
		'approval_date',
		'remarks',
	),
));
?>
<br/>
<?php

$criteria=new CDbCriteria(array(
		'order'=>'stamp DESC',
));

$criteria->addCondition("model_id = '".$model->id."' and model='BuildingPermit'");

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'title-grid',
    'dataProvider'=>new CActiveDataProvider('AuditTrail', array(
    	'criteria'=>$criteria,
        'pagination'=>array(
            'pageSize'=>20,
        )
    )),
    'columns'=>array(
        'action',
    	'field',
        'old_value',
        'new_value',
    	'stamp',
    ),
));
?>

