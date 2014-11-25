<?php
/* @var $this PermitRequirementsController */
/* @var $model PermitRequirements */

$this->breadcrumbs=array(
	'Building Permits'=>array('buildingpermit/index'),
	'Permit # '.$model->permit_num,
);

$this->menu=array(
	array('label'=>'List Requirements', 'url'=>array('index'),'visible'=>!(Yii::app()->session['user_type'] == 0)),
	//array('label'=>'Create PermitRequirements', 'url'=>array('create')),
	array('label'=>'Update Requirements', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Requirements', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage PermitRequirements', 'url'=>array('admin')),
);
?>

<?php if(Yii::app()->user->hasFlash('updateSuccess')): ?>
<div style="color: blue; font-weight: bold;font-size: 1.5em;"><?php echo Yii::app()->user->getFlash('updateSuccess');?></div>
<?php else:?>
<h2>View Permit Requirements for Permit #<?php echo " ".$model->permit_num; ?></h2>
<?php endif;?>
<br/>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'req_file1',
		'req_file1_type',
		'req_file2',
		'req_file2_type',
		'req_file3',
		'req_file3_type',
		'req_file4',
		'req_file4_type',
		'req_file5',
		'req_file5_type',
	),
)); ?>
