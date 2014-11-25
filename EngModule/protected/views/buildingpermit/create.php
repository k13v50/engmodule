<?php
/* @var $this BuildingPermitController */
/* @var $model BuildingPermit */

$this->breadcrumbs=array(
	'Building Permits'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Permit Application(s)', 'url'=>array('index')),
	array('label'=>'Manage Permit Application(s)', 'url'=>array('admin'),'visible'=>!(Yii::app()->session['user_type'] == 0)),
);
?>

<h2>Create BuildingPermit</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<center><h5>Step 1 of 2</h5></center>