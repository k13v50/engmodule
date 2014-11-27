<?php
/* @var $this CitizenUserController */
/* @var $model CitizenUser */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'citizen-user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
			'validateOnSubmit'=>true,
	),
)); ?>

<br/>
<?php echo $form->errorSummary($model); ?>
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
	),
));
?>

<div class="row buttons">
	<?php echo $form->labelEx($model,'remarks'); ?>
	<?php echo $form->textField($model,'remarks',array('size'=>115,'maxlength'=>1000,'minlength'=>1)); ?>
	<?php echo $form->error($model,'remarks'); ?>
	<br/>
	<div><?php echo CHtml::submitButton('Approve'); ?></div>
</div>

<?php $this->endWidget(); ?>
</div><!-- form -->