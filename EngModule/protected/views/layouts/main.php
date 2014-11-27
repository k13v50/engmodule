<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
<?php
if(!Yii::app()->user->isGuest){
$userType = Yii::app()->session['user_type'];
if($userType==0){
	$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
					array('label'=>'Home', 'url'=>array('/site/index')),
					array('label'=>'Citizen User', 'url'=>array('/citizenuser')),
					array('label'=>'Building Permit', 'url'=>array('/buildingpermit'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Electrical Installation Permit', 'url'=>array('/electricalinstallationspermit'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Plumbing Permit', 'url'=>array('/plumbingpermit'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
	)));
}else if($userType==UserTypeEnum::ADMIN){
	$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
					array('label'=>'Home', 'url'=>array('/site/index')),
					array('label'=>'Citizen User Management', 'url'=>array('/citizenuser')),
					array('label'=>'LGU User Mangament', 'url'=>array('/LguUser')),
					array('label'=>'Building Permit', 'url'=>array('/buildingpermit'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Electrical Installation Permit', 'url'=>array('/electricalinstallationspermit'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Plumbing Permit', 'url'=>array('/plumbingpermit'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),

			)));

}else if($userType==UserTypeEnum::PERMIT_MAINTENANCE){

	$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
					array('label'=>'Home', 'url'=>array('/site/index')),
					array('label'=>'LGU User Mangament', 'url'=>array('/LguUser'), 'visible'=>(!(Yii::app()->session['user_type'] == 0) && !(Yii::app()->user->isGuest))),
					array('label'=>'Building Permit', 'url'=>array('/buildingpermit'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Electrical Installation Permit', 'url'=>array('/electricalinstallationspermit'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Plumbing Permit', 'url'=>array('/plumbingpermit'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),

			)));

}else if($userType==UserTypeEnum::USER_MAINTENANCE){
	$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
					array('label'=>'Home', 'url'=>array('/site/index')),
					array('label'=>'Citizen User Management', 'url'=>array('/citizenuser'), 'visible'=>(!(Yii::app()->session['user_type'] == 0) && !(Yii::app()->user->isGuest))),
					array('label'=>'LGU User Mangament', 'url'=>array('/LguUser'), 'visible'=>(!(Yii::app()->session['user_type'] == 0) && !(Yii::app()->user->isGuest))),
					array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),

			)));

}else{
	$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
					array('label'=>'Home', 'url'=>array('/site/index')),
					array('label'=>'Citizen User Management', 'url'=>array('/citizenuser'), 'visible'=>(!(Yii::app()->session['user_type'] == 0) && !(Yii::app()->user->isGuest))),
					array('label'=>'LGU User Mangament', 'url'=>array('/LguUser'), 'visible'=>(!(Yii::app()->session['user_type'] == 0) && !(Yii::app()->user->isGuest))),
					//initial menu for permits
					array('label'=>'Building Permit', 'url'=>array('/buildingpermit'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Electrical Installation Permit', 'url'=>array('/electricalinstallationspermit'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Plumbing Permit', 'url'=>array('/plumbingpermit'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),

			)));
}

}else{
$this->widget('zii.widgets.CMenu',array(
		'items'=>array(
		array('label'=>'Home', 'url'=>array('/site/index')),
		array('label'=>'Register','url'=>array('/citizenuser/create'), 'visible'=>Yii::app()->user->isGuest),
		array('label'=>'Citizen Login','url'=>array('/site/citizenLogin'), 'visible'=>Yii::app()->user->isGuest),
		array('label'=>'LGU Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
)));
}?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by OpenLGU.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
