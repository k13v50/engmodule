<?php
/* @var $this BuildingPermitController */
/* @var $model BuildingPermit */

$this->breadcrumbs=array(
	'Plumbing Permits'=>array('index'),
	"Permit #".$model->permit_num=>array('view','permit_num'=>$model->permit_num),
	'Approve Permit',
);

$this->menu=array(
	array('label'=>'List Permit', 'url'=>array('index')),
	array('label'=>'Manage Permit', 'url'=>array('admin'),'visible'=>!(Yii::app()->session['user_type'] == 0)),
);
?>

<h2>Approve Plumbing Permit #<?php echo " ".$model->permit_num; ?></h2>

<?php $this->renderPartial('_approve_permit', array('model'=>$model)); ?>