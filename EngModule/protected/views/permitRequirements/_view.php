<?php
/* @var $this PermitRequirementsController */
/* @var $data PermitRequirements */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('req_file1')); ?>:</b>
	<?php echo CHtml::encode($data->req_file1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('req_file2')); ?>:</b>
	<?php echo CHtml::encode($data->req_file2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('req_file3')); ?>:</b>
	<?php echo CHtml::encode($data->req_file3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('req_file4')); ?>:</b>
	<?php echo CHtml::encode($data->req_file4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('req_file5')); ?>:</b>
	<?php echo CHtml::encode($data->req_file5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('req_file1_type')); ?>:</b>
	<?php echo CHtml::encode($data->req_file1_type); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('req_file2_type')); ?>:</b>
	<?php echo CHtml::encode($data->req_file2_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('req_file3_type')); ?>:</b>
	<?php echo CHtml::encode($data->req_file3_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('req_file4_type')); ?>:</b>
	<?php echo CHtml::encode($data->req_file4_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('req_file5_type')); ?>:</b>
	<?php echo CHtml::encode($data->req_file5_type); ?>
	<br />

	*/ ?>

</div>