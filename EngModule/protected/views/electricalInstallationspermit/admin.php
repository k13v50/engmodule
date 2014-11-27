<?php
/* @var $this ElectricalInstallationsPermitController */
/* @var $model ElectricalInstallationsPermit */

$this->breadcrumbs=array(
	'Electrical Installations Permits'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Permit', 'url'=>array('index')),
	//array('label'=>'Create Permit', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#electrical-installations-permit-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Manage Electrical Installations Permits</h2>

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
	'id'=>'electrical-installations-permit-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'request_date',
		'app_status',
		'owner_fname',
		'owner_lname',
		'owner_tin',
		'permit_num',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
