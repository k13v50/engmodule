<?php
/* @var $this CitizenUserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Citizen Users',
);

$this->menu=array(
	//array('label'=>'Create Citizen User', 'url'=>array('create')),
	array('label'=>'Manage Citizen User', 'url'=>array('admin'),'visible'=>!(Yii::app()->session['user_type'] == 0)),
);
?>

<h2>Citizen Users</h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
