<?php
/* @var $this BuildingPermitController */
/* @var $model BuildingPermit */

$this->breadcrumbs=array(
	'Building Permits'=>array('index'),
	"Permit #".$model->permit_num=>array('view','permit_num'=>$model->permit_num),
	'Reject Permit',
);

$this->menu=array(
	array('label'=>'List Permit(s)', 'url'=>array('index')),
	array('label'=>'Manage Permit', 'url'=>array('admin'),'visible'=>!(Yii::app()->session['user_type'] == 0)),
);
?>

<h2>Reject Building Permit # <?php echo " ".$model->permit_num; ?></h2>

<?php $this->renderPartial('_reject_permit', array('model'=>$model)); ?>