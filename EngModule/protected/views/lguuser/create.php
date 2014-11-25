<?php
/* @var $this LguUserController */
/* @var $model LGU_User */

$this->breadcrumbs=array(
	'LGU  Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h2>Create LGU User</h2>

<?php if(Yii::app()->user->hasFlash('error')): ?>
<div style="color: red; font-weight: bold;font-size: 1.5em;"><?php echo Yii::app()->user->getFlash('error');?></div>
<?php endif;?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>