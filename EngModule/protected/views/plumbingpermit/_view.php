<?php
/* @var $this PlumbingPermitController */
/* @var $data PlumbingPermit */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('permit_num')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->permit_num), array('view', 'permit_num'=>$data->permit_num)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bldg_permit_num')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->bldg_permit_num), array('buildingpermit/view', 'permit_num'=>$data->bldg_permit_num)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode(PermitAppStatusEnum::toDisplayValue($data->app_status)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('requested_by')); ?>:</b>
	<?php echo CHtml::encode($data->requested_by); ?>
	<br />
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('owner_fname')); ?>:</b>
	<?php echo CHtml::encode($data->owner_fname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('owner_mname')); ?>:</b>
	<?php echo CHtml::encode($data->owner_mname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('owner_lname')); ?>:</b>
	<?php echo CHtml::encode($data->owner_lname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('owner_tin')); ?>:</b>
	<?php echo CHtml::encode($data->owner_tin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ownership_form')); ?>:</b>
	<?php echo CHtml::encode($data->ownership_form); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tax_dec_num')); ?>:</b>
	<?php echo CHtml::encode($data->tax_dec_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_scope')); ?>:</b>
	<?php echo CHtml::encode($data->work_scope); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('occupation_type')); ?>:</b>
	<?php echo CHtml::encode($data->occupation_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addr_num')); ?>:</b>
	<?php echo CHtml::encode($data->addr_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addr_street')); ?>:</b>
	<?php echo CHtml::encode($data->addr_street); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addr_brgy')); ?>:</b>
	<?php echo CHtml::encode($data->addr_brgy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addr_city_mun')); ?>:</b>
	<?php echo CHtml::encode($data->addr_city_mun); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loc_lot_num')); ?>:</b>
	<?php echo CHtml::encode($data->loc_lot_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loc_block_num')); ?>:</b>
	<?php echo CHtml::encode($data->loc_block_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loc_tct_num')); ?>:</b>
	<?php echo CHtml::encode($data->loc_tct_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('const_street')); ?>:</b>
	<?php echo CHtml::encode($data->const_street); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('const_brgy')); ?>:</b>
	<?php echo CHtml::encode($data->const_brgy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('const_city_mun')); ?>:</b>
	<?php echo CHtml::encode($data->const_city_mun); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>:</b>
	<?php echo CHtml::encode($data->update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_by')); ?>:</b>
	<?php echo CHtml::encode($data->updated_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approved_by')); ?>:</b>
	<?php echo CHtml::encode($data->approved_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approved_by_position')); ?>:</b>
	<?php echo CHtml::encode($data->approved_by_position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('requested_by')); ?>:</b>
	<?php echo CHtml::encode($data->requested_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approval_date')); ?>:</b>
	<?php echo CHtml::encode($data->approval_date); ?>
	<br />

	*/ ?>

</div>