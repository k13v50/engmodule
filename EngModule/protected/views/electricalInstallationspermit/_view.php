<?php
/* @var $this ElectricalInstallationsPermitController */
/* @var $data ElectricalInstallationsPermit */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('permit_num')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->permit_num), array('view', 'permit_num'=>$data->permit_num)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bldg_permit_num')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->bldg_permit_num), array('buildingpermit/view', 'permit_num'=>$data->bldg_permit_num)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('app_status')); ?>:</b>
	<?php echo CHtml::encode(PermitAppStatusEnum::toDisplayValue($data->app_status)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('requested_by')); ?>:</b>
	<?php echo CHtml::encode($data->requested_by); ?>
	<br />

</div>