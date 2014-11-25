<?php
/* @var $this BuildingPermitController */
/* @var $model BuildingPermit */

$this->breadcrumbs=array(
	'Building Permits'=>array('index'),
	"Permit #".$model->permit_num=>array('view','permit_num'=>$model->permit_num),
	'Update',
);

$this->menu=array(
	array('label'=>'List Permit Application(s)', 'url'=>array('index')),
	array('label'=>'Apply for Permit', 'url'=>array('create')),
	array('label'=>'Manage Permit Application(s)', 'url'=>array('admin'),'visible'=>!(Yii::app()->session['user_type'] == 0)),
);
?>

<h2>Update Building Permit #<?php echo " ".$model->permit_num; ?></h2>

<?php $this->renderPartial('_update', array('model'=>$model)); ?>