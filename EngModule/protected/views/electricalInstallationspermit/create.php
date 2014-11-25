<?php
/* @var $this ElectricalInstallationsPermitController */
/* @var $model ElectricalInstallationsPermit */

$this->breadcrumbs=array(
	'Electrical Installations Permits'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Permit', 'url'=>array('index')),
	array('label'=>'Manage Permit', 'url'=>array('admin'),'visible'=>!(Yii::app()->session['user_type'] == 0)),
);
?>

<h2>Create Electrical Installations Permit</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>