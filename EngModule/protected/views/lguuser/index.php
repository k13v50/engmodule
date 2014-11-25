<?php
/* @var $this LguUserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'LGU  Users',
);

$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h2>LGU  Users</h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
