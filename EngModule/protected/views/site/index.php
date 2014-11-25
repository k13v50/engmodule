<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<?php if(Yii::app()->user->isGuest == false):?>
	<?php if(Yii::app()->session['user_type'] > 0):?>
	<h2>Welcome <i><?php echo CHtml::encode(Yii::app()->session['username']); ?>,</i></h2>
	<div class="row">
			<h5>Pending Building Permits for Approval:<?php echo " ".CHtml::link(CHtml::encode(BuildingPermit::model()->countAllByStatus(PermitAppStatusEnum::PENDING)), array('buildingpermit/index')); ?></h5>
	</div>
	<div class="row">
			<h5>Pending Electrical Installation Permits for Approval:<?php echo " ".CHtml::link(CHtml::encode(ElectricalInstallationsPermit::model()->countAllByStatus(PermitAppStatusEnum::PENDING)), array('electricalinstallationspermit/index')); ?></h5>
	</div>
	<div class="row">
			<h5>Pending Plumbing Permits for Approval:<?php echo " ".CHtml::link(CHtml::encode(PlumbingPermit::model()->countAllByStatus(PermitAppStatusEnum::PENDING)), array('plumbingpermit/index')); ?></h5>
	</div>
	<div class="row">
			<h5>Citizen Registration for Approval:<?php echo " ".CHtml::link(CHtml::encode(CitizenUser::model()->countAllByStatus(PermitAppStatusEnum::PENDING)), array('citizenuser/index')); ?></h5>
	</div>
	<?php else:  ?>
	<h2>Welcome <i><?php echo CHtml::encode(Yii::app()->session['username']); ?>,</i></h2>
	<?php endif;?>
<?php else: ?>
	<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<?php endif;?>