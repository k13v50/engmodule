<?php
/* @var $this ElectricalInstallationsPermitController */
/* @var $model ElectricalInstallationsPermit */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'app_num'); ?>
		<?php echo $form->textField($model,'app_num',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'permit_num'); ?>
		<?php echo $form->textField($model,'permit_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'owner_fname'); ?>
		<?php echo $form->textField($model,'owner_fname',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'owner_mname'); ?>
		<?php echo $form->textField($model,'owner_mname',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'owner_lname'); ?>
		<?php echo $form->textField($model,'owner_lname',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'owner_tin'); ?>
		<?php echo $form->textField($model,'owner_tin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'owner_phone'); ?>
		<?php echo $form->textField($model,'owner_phone',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'econ_act'); ?>
		<?php echo $form->textField($model,'econ_act',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ownership_form'); ?>
		<?php echo $form->textField($model,'ownership_form',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'work_scope'); ?>
		<?php echo $form->textField($model,'work_scope',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'occupation_type'); ?>
		<?php echo $form->textField($model,'occupation_type',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_const_load'); ?>
		<?php echo $form->textField($model,'total_const_load',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_trans_cap'); ?>
		<?php echo $form->textField($model,'total_trans_cap',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_gen_cap'); ?>
		<?php echo $form->textField($model,'total_gen_cap',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'addr_num'); ?>
		<?php echo $form->textField($model,'addr_num',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'addr_street'); ?>
		<?php echo $form->textField($model,'addr_street',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'addr_brgy'); ?>
		<?php echo $form->textField($model,'addr_brgy',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'addr_city_mun'); ?>
		<?php echo $form->textField($model,'addr_city_mun',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loc_lot_num'); ?>
		<?php echo $form->textField($model,'loc_lot_num',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loc_block_num'); ?>
		<?php echo $form->textField($model,'loc_block_num',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loc_tct_num'); ?>
		<?php echo $form->textField($model,'loc_tct_num',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tax_dec_num'); ?>
		<?php echo $form->textField($model,'tax_dec_num',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'const_street'); ?>
		<?php echo $form->textField($model,'const_street',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'const_brgy'); ?>
		<?php echo $form->textField($model,'const_brgy',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'const_city_mun'); ?>
		<?php echo $form->textField($model,'const_city_mun',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'request_date'); ?>
		<?php echo $form->textField($model,'request_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'requested_by'); ?>
		<?php echo $form->textField($model,'requested_by',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_date'); ?>
		<?php echo $form->textField($model,'update_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updated_by'); ?>
		<?php echo $form->textField($model,'updated_by',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'approved_by'); ?>
		<?php echo $form->textField($model,'approved_by',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'approved_by_position'); ?>
		<?php echo $form->textField($model,'approved_by_position',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'approval_date'); ?>
		<?php echo $form->textField($model,'approval_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->