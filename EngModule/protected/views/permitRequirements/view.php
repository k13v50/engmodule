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
		array(
			'name'=>'req_file1',
			'type'=>'raw',
			'value'=>$model->req_file1.CHtml::link('(view image)', array('view_file', 'file'=>$model->id.'/'.$model->req_file1)),
		),
		'req_file1_type',
		array(
			'name'=>'req_file2',
			'type'=>'raw',
			'value'=>$model->req_file2.CHtml::link('(view image)', array('view_file', 'file'=>$model->id.'/'.$model->req_file2)),
		),
		'req_file2_type',
		array(
				'name'=>'req_file3',
				'type'=>'raw',
				'value'=>$model->req_file3.CHtml::link('(view image)', array('view_file', 'file'=>$model->id.'/'.$model->req_file3)),
		),
		'req_file3_type',
		array(
				'name'=>'req_file4',
				'type'=>'raw',
				'value'=>$model->req_file4.CHtml::link('(view image)', array('view_file', 'file'=>$model->id.'/'.$model->req_file4)),
		),
		'req_file4_type',
		array(
				'name'=>'req_file5',
				'type'=>'raw',
				'value'=>$model->req_file5.CHtml::link('(view image)', array('view_file', 'file'=>$model->id.'/'.$model->req_file5)),
		),
		'req_file5_type',
	),
)); ?>

<br/>
<?php
//echo CHtml::image(Yii::app()->request->baseUrl.'/uploads/0C248D94670CEFAC1B0AC2D1435B7674/1416927420_architectural_plan.jpg', 'test');
?>
