<?php
/* @var $this PermitRequirementsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Building Permits'=>array('buildingpermit/index'),
);

$this->menu=array(
	array('label'=>'Create PermitRequirements', 'url'=>array('create'),'visible'=>!(Yii::app()->session['user_type'] == 0)),
	//array('label'=>'Manage PermitRequirements', 'url'=>array('admin')),
);
?>

<h1>Permit Requirements</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
