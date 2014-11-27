<?php
/* @var $this PermitRequirementsController */
/* @var $model PermitRequirements */

$this->breadcrumbs=array(
	'Upload Permit Requirements',
);

$this->menu=array(
	//array('label'=>'List PermitRequirements', 'url'=>array('index')),
	//array('label'=>'Manage PermitRequirements', 'url'=>array('admin')),
);
?>

<h2>Upload Permit Requirements</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>