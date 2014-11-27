<?php
/* @var $this ElectricalInstallationsPermitController */
/* @var $data ElectricalInstallationsPermit */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('permit_num')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->permit_num), array('view', 'permit_num'=>$data->permit_num)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bldg_permit_num')); ?>:</b>
	<?php if($data->bldg_permit_num!=null) {?>
	<?php echo CHtml::link(CHtml::encode($data->bldg_permit_num), array('buildingpermit/view', 'permit_num'=>$data->bldg_permit_num)); ?>
	<?php } else {?>
	<?php echo CHtml::link(CHtml::encode("N/A"));?>
	<?php }?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('app_status')); ?>:</b>
	<?php echo CHtml::encode(PermitAppStatusEnum::toDisplayValue($data->app_status)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('requested_by')); ?>:</b>
	<?php echo CHtml::encode($data->requested_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('request_date')); ?>:</b>
	<?php echo CHtml::encode($data->request_date); ?>
	<br />

</div>