<?php
/* @var $this PlumbingPermitController */
/* @var $model PlumbingPermit */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'plumbing-permit-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<h2>Personal Information</h2>

	<div class="row">
		<?php echo $form->labelEx($model,'owner_fname'); ?>
		<?php echo $form->textField($model,'owner_fname',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'owner_fname'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'owner_mname'); ?>
		<?php echo $form->textField($model,'owner_mname',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'owner_mname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'owner_lname'); ?>
		<?php echo $form->textField($model,'owner_lname',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'owner_lname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'owner_tin'); ?>
		<?php echo $form->textField($model,'owner_tin'); ?>
		<?php echo $form->error($model,'owner_tin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'owner_phone'); ?>
		<?php echo $form->textField($model,'owner_phone',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'owner_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'occupation_type'); ?>
		<?php echo $form->textField($model,'occupation_type',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'occupation_type'); ?>
	</div>

	<h2>Address:</h2>

	<div class="row">
		<?php echo $form->labelEx($model,'addr_num'); ?>
		<?php echo $form->textField($model,'addr_num',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'addr_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'addr_street'); ?>
		<?php echo $form->textField($model,'addr_street',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'addr_street'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'addr_brgy'); ?>
		<?php echo $form->textField($model,'addr_brgy',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'addr_brgy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'addr_city_mun'); ?>
		<?php echo $form->textField($model,'addr_city_mun',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'addr_city_mun'); ?>
	</div>

	<h2>Permit Details</h2>

	<div class="row">
		<?php echo $form->labelEx($model,'bldg_permit_num'); ?>
		<?php echo $form->textField($model,'bldg_permit_num',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'bldg_permit_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'const_street'); ?>
		<?php echo $form->textField($model,'const_street',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'const_street'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'const_brgy'); ?>
		<?php echo $form->textField($model,'const_brgy',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'const_brgy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'const_city_mun'); ?>
		<?php echo $form->textField($model,'const_city_mun',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'const_city_mun'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'loc_lot_num'); ?>
		<?php echo $form->textField($model,'loc_lot_num',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'loc_lot_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'loc_block_num'); ?>
		<?php echo $form->textField($model,'loc_block_num',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'loc_block_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'loc_tct_num'); ?>
		<?php echo $form->textField($model,'loc_tct_num',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'loc_tct_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ownership_form'); ?>
		<?php echo $form->textField($model,'ownership_form',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ownership_form'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'work_scope'); ?>
		<?php echo $form->textField($model,'work_scope',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'work_scope'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tax_dec_num'); ?>
		<?php echo $form->textField($model,'tax_dec_num',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'tax_dec_num'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->