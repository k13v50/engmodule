<?php
/* @var $this CitizenUserController */
/* @var $model CitizenUser */

$this->breadcrumbs=array(
	'Citizen Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Citizen User', 'url'=>array('index')),
	array('label'=>'Create Citizen User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#citizen-user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Manage Citizen Users</h2>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'citizen-user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'username',
		'tin',
		'firstName',
		'middleName',
		'lastName',
		'password',
		'addr_street',
		'addr_brgy',
		'addr_city_mun',
		'addr_num',
		'app_status',
		'email_add',
		'mobile_num',
		'create_dt',
		'update_dt',
		'updated_by',
		'approval_dt',
		'approved_by',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
