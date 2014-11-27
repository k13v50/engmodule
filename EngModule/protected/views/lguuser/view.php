<?php
/* @var $this LguUserController */
/* @var $model LGU_User */

$this->breadcrumbs=array(
	'LGU  Users'=>array('index'),
	$model->username,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Change Password', 'url'=>array('change_password', 'username'=>$model->username),'visible'=>(Yii::app()->session['username'] == $model->username)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<?php if(Yii::app()->user->hasFlash('success')): ?>
<div style="color: blue; font-weight: bold;font-size: 1.5em;"><?php echo Yii::app()->user->getFlash('success');?></div>
<?php elseif(Yii::app()->user->hasFlash('error')): ?>
<div style="color: red; font-weight: bold;font-size: 1.5em;"><?php echo Yii::app()->user->getFlash('error');?></div>
<h2>View LGU User: <?php echo " ".$model->username; ?></h2>
<?php endif;?>
<br/>
<b><?php echo CHtml::encode($model->getAttributeLabel('user_type'));?>:</b>
<b><?php echo UserTypeEnum::toDisplayValue($model->user_type);?></b>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
			'username',
			'employee_no',
			'position',
			'firstName',
			'middleName',
			'lastName',
			'civil_status',
			'tin',
			'gender',
			'created_by',
			array(
					'name'=>'create_dt',
					'value'=>Yii::app()->dateFormatter->format('MMM dd, yyyy hh:ss a',$model->create_dt) ,
			),
			'updated_by',
			array(
					'name'=>'update_dt',
					'value'=>Yii::app()->dateFormatter->format('MMM dd, yyyy hh:ss a',$model->update_dt) ,
			),
	),
)); ?>

<?php
$criteria=new CDbCriteria(array(
		'order'=>'stamp DESC',
));

$criteria->addCondition("model_id = '".$model->id."' and model='LGU_User'");

$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'title-grid',
		'dataProvider'=>new CActiveDataProvider('AuditTrail', array(
				'criteria'=>$criteria,
				'pagination'=>array(
						'pageSize'=>100,
				)
		)),
		'columns'=>array(
				'action',
				'field',
				'old_value',
				'new_value',
				'stamp',
		),
));
?>
