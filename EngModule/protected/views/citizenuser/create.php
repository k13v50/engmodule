<?php
/* @var $this CitizenUserController */
/* @var $model CitizenUser */

$this->breadcrumbs=array(
	'Citizen Users'=>array('index'),
	'Register',
);

?>

<h2>Register User</h2>

<?php if(Yii::app()->user->hasFlash('error')): ?>
<div style="color: red; font-weight: bold;font-size: 1.5em;"><?php echo Yii::app()->user->getFlash('error');?></div>
<?php endif;?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>