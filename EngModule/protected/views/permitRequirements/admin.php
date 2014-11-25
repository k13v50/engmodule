<?php
/* @var $this PermitRequirementsController */
/* @var $model PermitRequirements */

$this->breadcrumbs=array(
	'Building Permits'=>array('buildingpermit/index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PermitRequirements', 'url'=>array('index'),'visible'=>!(Yii::app()->session['user_type'] == 0)),
	//array('label'=>'Create PermitRequirements', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#permit-requirements-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Permit Requirements</h1>

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
	'id'=>'permit-requirements-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'req_file1',
		'req_file2',
		'req_file3',
		'req_file4',
		'req_file5',
		'req_file1_type',
		/*
		'req_file2_type',
		'req_file3_type',
		'req_file4_type',
		'req_file5_type',
		'id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
