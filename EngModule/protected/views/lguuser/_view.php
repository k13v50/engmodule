<?php
/* @var $this LguUserController */
/* @var $data LGU_User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->username), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_no')); ?>:</b>
	<?php echo CHtml::encode($data->employee_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tin')); ?>:</b>
	<?php echo CHtml::encode($data->tin); ?>
	<br />

	<b>Name: </b>
	<?php echo CHtml::encode($data->lastName); ?>,
	<?php echo CHtml::encode($data->firstName);?>
	<?php echo CHtml::encode($data->middleName); ?>
	<br />

</div>