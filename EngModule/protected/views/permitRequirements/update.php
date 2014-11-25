<?php
/* @var $this PermitRequirementsController */
/* @var $model PermitRequirements */

$this->breadcrumbs=array(
	'Building Permits'=>array('buildingpermit/index'),
	'Permit # '.$model->permit_num=>array('buildingpermit/view','permit_num'=>$model->permit_num),
	'Update Requirements',
);

$this->menu=array(
	array('label'=>'List Requirements', 'url'=>array('index'),'visible'=>!(Yii::app()->session['user_type'] == 0)),
	//array('label'=>'Create Requirements', 'url'=>array('create')),
	array('label'=>'View Requirements', 'url'=>array('view', 'permit_num'=>$model->permit_num)),
	//array('label'=>'Manage PermitRequirements', 'url'=>array('admin')),
);
?>

<h1>Update Permit Requirements for Permit #<?php echo " ".$model->permit_num; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>