<?php
/* @var $this LguUserController */
/* @var $model LGU_User */

$this->breadcrumbs=array(
	'LGU  Users'=>array('index'),
	$model->username=>array('view','username'=>$model->username),
	'Update',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'username'=>$model->username)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h2>Update LGU_User : <?php echo " ".$model->username; ?></h2>

<?php $this->renderPartial('_update', array('model'=>$model)); ?>