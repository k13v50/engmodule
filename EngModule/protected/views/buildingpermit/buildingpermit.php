<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/permit.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<div class="permitHeader">
REPUBLIC OF THE PHILIPPINES<br/><br/>
OFFICE OF THE BUILDING OFFICIAL<br/>
LOS BANOS, LAGUNA<br/>
AREA CODE#: 4028
</div>
<br/>
<div class="permitInfo">
<div class="permitInfo1">
APPLICATION NO:<br/> <?php echo CHtml::encode($model->permit_num);?>
</div>
<div class="permitInfo2">
PERMIT NO:<br/> <?php echo CHtml::encode($model->permit_num);?>
</div>
</div>
<div align="center" style="font-weight: bold;">BUILDING PERMIT</div>
<div>DATE OF APPLICATION: <?php echo " ".CHtml::encode(Yii::app()->dateFormatter->format('MM-dd-yyyy',$model->request_date));?></div>
<div class="permitDetails">

<table width="100%">
<tr>
<td colspan="30%">
	<div class="ownerlname">Last Name:<br/><br/> <?php echo " ".CHtml::encode($model->owner_lname);?></div>
</td>
<td colspan="30%">
	<div class="ownerfname">First Name:<br/><br/> <?php echo " ".CHtml::encode($model->owner_fname);?></div>
</td>
<td colspan="20%">
	<div class="ownermname">Middle Name:<br/><br/> <?php echo " ".CHtml::encode($model->owner_mname);?></div>
</td>
<td colspan="20%">
	<div class="ownertin">TIN NO.:<br/><br/> <?php echo " ".CHtml::encode($model->owner_tin);?></div>
</td>
</tr>
<tr>
	<td colspan="40%">FOR CONSTRUCTION OWNED BY: <br/> AN ENTERPRISE</td>
	<td colspan="40%">FORM OF OWNERSHIP:<br/> <?php echo " ".CHtml::encode($model->ownership_form);?></td>
	<td colspan="20%">MAIN ECONOMIC BUSINESS ACTIVITY:<br/> <?php echo " ".CHtml::encode($model->tax_dec_num);?></td>
</tr>
<tr>
	<td colspan="80%">Address: <br /><br />
	<?php echo CHtml::encode($model->addr_num.', '.$model->addr_street.', '.$model->addr_brgy.', '.$model->addr_city_mun); ?>
	</td>
	<td colspan="20%">Contact Number: <br /><br />
	<?php echo CHtml::encode($model->owner_phone); ?>
	</td>
</tr>
<tr>
	<td colspan="100%">Location of construction:<br /><br />
	<?php echo CHtml::encode($model->const_street.', '.$model->const_brgy.', '.$model->const_city_mun); ?>
	</td>
</tr>
<tr>
	<td colspan="100%">Scope of Work: <br /><br />
	<?php echo CHtml::encode($model->work_scope); ?>
	</td>
</tr>
<tr>
<td colspan="100%">
<div style="text-align: center !important; font-weight: bold;">BUILDING DOCUMENTS</div>
<br/>
Site Development and Location Plan
<br />
Architectural Plan
<br />
Structural Design
<br />
Land Title and Tax Declaration
<br />
Latest Tax Receipt
</td>
</tr>
<tr>
<td colspan="100%">
<div style="font-weight: bold;">ACTIONS TAKEN:</div>
<br/>
PERMIT IS HEREBY GRANTED SUBJECT TO THE FOLLOWING CONDITIONS:
<br/>
<br/>
<p>
1&nbsp;&nbsp;&nbsp;&nbsp;THAT THE PROPOSED CONTRUCTION/ADDITION/REPAIR/RENOVATION/DEMOLITION/
INSTALLATION, ETC. SHAL BE IN CONFORMITY WITH THE "NATIONAL BUILDING CODE"
(P.D. 1096) AND ITS CORRESPONDING IMPLEMENTING RULES AND REGULATIONS.</p>
<br/>
<p>
2&nbsp;&nbsp;&nbsp;&nbsp;THAT A DULY LICENSED ARCHITECT/CIVIL ENGINEER BE ENGAGED TO PREPARE
PLANS &amp; SPECIFICATIONS AND TO UNDERTAKE THE SUPERVISION/INSPECTION OF THE
CONSTRUCTION OF THE PROJECT.</p>
<br/>
<p>
3&nbsp;&nbsp;&nbsp;&nbsp;THAT A CERTIFICATE OF COMPLETION DULY SIGNED AND SEALED BY THE DESIGNING,
ARCHITECT/CIVIL ENGINEER AND THE ARCHITECT/CIVIL ENGINEER IN-CHARGE OF CONSTRUCTION
SHALL BE SUBMITTED NOT LATER THAN SEVEN(7) DAYS AFTER COMPLETION OF THE CONSTRUCTION
OF THE PROJECT. THAT A "CERTIFICATE OF OCCUPANCY" SHALL BE SECURED PRIOR TO ACTUAL
OCCUPANCY OF THE BUILDING.
</p>
<br />
<br />
<div style="text-decoration: underline;"><?php echo CHtml::encode($model->approved_by);?></div>
BUILDING OFFICIAL
<br/>
<br/>
<div style="text-decoration: underline;"><?php echo CHtml::encode(Yii::app()->dateFormatter->format('MMM dd, yyyy',$model->approval_date));?></div>
DATE
</td>
</tr>
</table>
</div>
</body>
</html>