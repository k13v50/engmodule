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

<br/>
<div class="row"><!-- added hidden field to trigger the approval on submit -->
	<?php echo $form->hiddenField($model,'app_status',array('visible'=>false)); ?>
</div>
<div class="row buttons">
	<?php echo CHtml::submitButton('Approve'); ?>
</div>

<?php $this->endWidget(); ?>
</div><!-- form -->