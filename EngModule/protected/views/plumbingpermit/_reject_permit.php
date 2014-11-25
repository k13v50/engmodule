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

)); ?>


<div class="row"><!-- added hidden field to trigger the approval on submit -->
	<?php echo $form->hiddenField($model,'app_status',array('visible'=>false)); ?>
</div>

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
		'ownership_form',
		'work_scope',
		'tax_dec_num',
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
	),
)); ?>

<div class="row buttons">
	<?php echo $form->labelEx($model,'remarks'); ?>
	<?php echo $form->textField($model,'remarks',array('size'=>115,'maxlength'=>1000)); ?>
	<?php echo $form->error($model,'remarks'); ?>
	<br/>
	<br/>
	<div style="text-align: center"><?php echo CHtml::submitButton('Reject'); ?></div>
</div>

<?php $this->endWidget(); ?>
</div><!-- form -->