<?php
/* @var $this CitizenUserController */
/* @var $data CitizenUser */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->username), array('view', 'username'=>$data->username)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tin')); ?>:</b>
	<?php echo CHtml::encode($data->tin); ?>
	<br />

	<b>Name: </b>
	<?php echo CHtml::encode($data->lastName); ?>,
	<?php echo CHtml::encode($data->firstName);?>
	<?php echo CHtml::encode($data->middleName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('app_status')); ?>:</b>
	<?php echo AppStatusEnum::toDisplayValue($data->app_status); ?>
	<br />

</div>