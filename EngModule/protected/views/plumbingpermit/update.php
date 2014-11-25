<?php
/* @var $this PlumbingPermitController */
/* @var $model PlumbingPermit */

$this->breadcrumbs=array(
	'Plumbing Permits'=>array('index'),
	"Permit #".$model->permit_num=>array('view','permit_num'=>$model->permit_num),
	'Update',
);

$this->menu=array(
	array('label'=>'List Permit', 'url'=>array('index')),
	//array('label'=>'Create Permit', 'url'=>array('create')),
	array('label'=>'View Permit', 'url'=>array('view', 'permit_num'=>$model->permit_num)),
	array('label'=>'Manage Permit', 'url'=>array('admin'),'visible'=>!(Yii::app()->session['user_type'] == 0)),
);
?>

<h2>Update Plumbing Permit #<?php echo " ".$model->permit_num; ?></h2>

<?php $this->renderPartial('_update', array('model'=>$model)); ?>