<?php
/* @var $this ElectricalInstallationsPermitController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Electrical Installations Permits',
);

if(Yii::app()->session['user_type'] == 0){
$this->menu=array(
	//array('label'=>'Create Permit', 'url'=>array('create')),
	array('label'=>'Manage Permit', 'url'=>array('admin'),'visible'=>!(Yii::app()->session['user_type'] == 0)),
);
}
?>

<h2>Electrical Installations Permits</h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
