<?php
/* @var $this PermitRequirementsController */
/* @var $model PermitRequirements */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'permit-requirements-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
			'enctype' => 'multipart/form-data',
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<h4><?php echo $form->labelEx($model,'req_file1'); ?></h4>
		<?php echo CHtml::activeFileField($model, 'req_file1'); ?>
		<?php echo $form->error($model,'req_file1'); ?>
		<?php if($model->isNewRecord!=1):?>
		<p class="note"> <?php echo "(Last uploaded file: ".Yii::app()->session['file1'].")"?></p>
		<?php endif;?>
	</div>
	<br/>
	<div class="row">
		<h4><?php echo $form->labelEx($model,'req_file2'); ?></h4>
		<?php echo CHtml::activeFileField($model, 'req_file2'); ?>
		<?php echo $form->error($model,'req_file2'); ?>
		<?php if($model->isNewRecord!=1):?>
		<p class="note"> <?php echo "(Last uploaded file: ".Yii::app()->session['file1'].")"?></p>
		<?php endif;?>
	</div>
	<br/>
	<div class="row">
		<h4><?php echo $form->labelEx($model,'req_file3'); ?></h4>
		<?php echo CHtml::activeFileField($model, 'req_file3'); ?>
		<?php echo $form->error($model,'req_file3'); ?>
		<?php if($model->isNewRecord!=1):?>
		<p class="note"> <?php echo "(Last uploaded file: ".Yii::app()->session['file1'].")"?></p>
		<?php endif;?>
	</div>
	<br/>
	<div class="row">
		<h4><?php echo $form->labelEx($model,'req_file4'); ?></h4>
		<?php echo CHtml::activeFileField($model, 'req_file4'); ?>
		<?php echo $form->error($model,'req_file4'); ?>
		<?php if($model->isNewRecord!=1):?>
		<p class="note"> <?php echo "(Last uploaded file: ".Yii::app()->session['file1'].")"?></p>
		<?php endif;?>
	</div>
	<br/>
	<div class="row">
		<h4><?php echo $form->labelEx($model,'req_file5'); ?></h4>
		<?php echo CHtml::activeFileField($model, 'req_file5'); ?>
		<?php echo $form->error($model,'req_file5'); ?>
		<?php if($model->isNewRecord!=1):?>
		<p class="note"> <?php echo "(Last uploaded file: ".Yii::app()->session['file1'].")"?></p>
		<?php endif;?>
	</div>
	<br/>
	<div class="row buttons" align="center">
		<?php echo $form->error($model,'uploadButton'); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Upload' : 'Update'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->