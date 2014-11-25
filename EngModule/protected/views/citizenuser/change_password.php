<?php
/* @var $this CitizenUserController */
/* @var $model CitizenUser */

$this->breadcrumbs=array(
	'Citizen Users'=>array('index'),
	$model->username=>array('view','username'=>$model->username),
	'Change Password',
);

?>

<h2>Change Password</h2>

<?php if(Yii::app()->user->hasFlash('success')): ?>
<div style="color: red; font-weight: bold;font-size: 1.5em;"><?php echo Yii::app()->user->getFlash('success');?></div>
<?php elseif(Yii::app()->user->hasFlash('error')): ?>
<div style="color: red; font-weight: bold;font-size: 1.5em;"><?php echo Yii::app()->user->getFlash('error');?></div>
<?php endif;?>
<?php $this->renderPartial('_change_password', array('model'=>$model)); ?>