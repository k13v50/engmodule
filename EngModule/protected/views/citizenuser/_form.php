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

	<?php echo $form->errorSummary($model); ?>

	<h2>User Login Credentials</h2>
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>30,'maxlength'=>15,'minlength'=>7)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>30,'maxlength'=>15,'minlength'=>7)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'_verifyPassword'); ?>
		<?php echo $form->passwordField($model,'_verifyPassword',array('size'=>30,'maxlength'=>15,'minlength'=>7)); ?>
		<?php echo $form->error($model,'_verifyPassword'); ?>
	</div>

	<h2>User Information</h2>

	<h3> Name: </h3>
	<div class="row">
		<?php echo $form->labelEx($model,'firstName'); ?>
		<?php echo $form->textField($model,'firstName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'firstName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'middleName'); ?>
		<?php echo $form->textField($model,'middleName',array('size'=>25,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'middleName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastName'); ?>
		<?php echo $form->textField($model,'lastName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'lastName'); ?>
	</div>

	<h3> Address: </h3>

	<div class="row">
		<?php echo $form->labelEx($model,'addr_num'); ?>
		<?php echo $form->textField($model,'addr_num',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'addr_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'addr_street'); ?>
		<?php echo $form->textField($model,'addr_street',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'addr_street'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'addr_brgy'); ?>
		<?php echo $form->textField($model,'addr_brgy',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'addr_brgy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'addr_city_mun'); ?>
		<?php echo $form->textField($model,'addr_city_mun',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'addr_city_mun'); ?>
	</div>

	<h3>Other Details:</h3>

	<div class="row">
		<?php echo $form->labelEx($model,'tin'); ?>
		<?php echo $form->textField($model,'tin',array('size'=>30,'maxlength'=>15,'minlength'=>12)); ?>
		<?php echo $form->error($model,'tin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employment_info'); ?>
		<?php echo $form->textField($model,'employment_info',array('size'=>50,'maxlength'=>75)); ?>
		<?php echo $form->error($model,'employment_info'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'education'); ?>
		<?php echo $form->textField($model,'education',array('size'=>50,'maxlength'=>75)); ?>
		<?php echo $form->error($model,'education'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_add'); ?>
		<?php echo $form->textField($model,'email_add',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email_add'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile_num'); ?>
		<?php echo $form->textField($model,'mobile_num',array('size'=>20,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'mobile_num'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Register'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->