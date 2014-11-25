<?php
/* @var $this CitizenUserController */
/* @var $model CitizenUser */

$this->breadcrumbs=array(
		'Citizen Users'=>array('index'),
		$model->username,
);

$this->menu=array(
		array('label'=>'Citizen Login','url'=>array('/site/citizenLogin'), 'visible'=>Yii::app()->user->isGuest),
);

?>

<div style="color: blue; font-weight: bold;font-size: 1.5em;">Your Registration to the system was successful!</div>
<h2>User Details: <?php echo $model->username; ?></h2>
<b><?php echo CHtml::encode($model->getAttributeLabel('app_status')); ?>:</b>
<b><?php echo AppStatusEnum::toDisplayValue($model->app_status); ?></b>
<br/>
<br/>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'tin',
		'lastName',
		'firstName',
		'middleName',
		'email_add',
		'mobile_num',
		'addr_num',
		'addr_street',
		'addr_brgy',
		'addr_city_mun',
		'education',
		'employment_info',
		array(
			'name'=>'create_dt',
			'value'=>Yii::app()->dateFormatter->format('MMM dd, yyyy hh:ss a',$model->create_dt) ,
		),
	),
)); ?>
