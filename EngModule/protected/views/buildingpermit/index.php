<?php
/* @var $this BuildingPermitController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Building Permits',
);

$this->menu=array(
	array('label'=>'Apply for Permit', 'url'=>array('create')),
	array('label'=>'Manage Permit Application(s)', 'url'=>array('admin'),'visible'=>!(Yii::app()->session['user_type'] == 0)),
	//array('label'=>'Update BuildingPermit', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete BuildingPermit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h2>Building Permits</h2>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
