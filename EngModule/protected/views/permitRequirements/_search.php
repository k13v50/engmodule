<?php
/* @var $this PermitRequirementsController */
/* @var $model PermitRequirements */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'req_file1'); ?>
		<?php echo $form->textField($model,'req_file1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'req_file2'); ?>
		<?php echo $form->textField($model,'req_file2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'req_file3'); ?>
		<?php echo $form->textField($model,'req_file3',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'req_file4'); ?>
		<?php echo $form->textField($model,'req_file4',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'req_file5'); ?>
		<?php echo $form->textField($model,'req_file5',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'req_file1_type'); ?>
		<?php echo $form->textField($model,'req_file1_type',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'req_file2_type'); ?>
		<?php echo $form->textField($model,'req_file2_type',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'req_file3_type'); ?>
		<?php echo $form->textField($model,'req_file3_type',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'req_file4_type'); ?>
		<?php echo $form->textField($model,'req_file4_type',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'req_file5_type'); ?>
		<?php echo $form->textField($model,'req_file5_type',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->