<?php
/* @var $this LguUserController */
/* @var $model LGU_User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lgu-user-form',
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
		<?php echo $form->textField($model,'username',array('size'=>30,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'_verifyPassword'); ?>
		<?php echo $form->passwordField($model,'_verifyPassword',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'_verifyPassword'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_type'); ?>
        <?php echo $form->dropDownList($model, 'userType_temp', $model->getRoleOptions()); ?>
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
		<?php echo $form->textField($model,'middleName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'middleName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastName'); ?>
		<?php echo $form->textField($model,'lastName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'lastName'); ?>
	</div>

	<h3>Employee Details: </h3>
	<div class="row">
		<?php echo $form->labelEx($model,'employee_no'); ?>
		<?php echo $form->textField($model,'employee_no',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'employee_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<h3>Other Details:</h3>

	<div class="row">
		<?php echo $form->labelEx($model,'tin'); ?>
		<?php echo $form->textField($model,'tin',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'tin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'civil_status'); ?>
		<?php echo $form->textField($model,'civil_status',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'civil_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
        <?php echo $form->dropDownList($model, 'gender', $model->getGender()); ?>
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
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->