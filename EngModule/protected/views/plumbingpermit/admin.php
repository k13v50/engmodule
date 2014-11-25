<?php
/* @var $this PlumbingPermitController */
/* @var $model PlumbingPermit */

$this->breadcrumbs=array(
	'Plumbing Permits'=>array('index'),
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
	$('#plumbing-permit-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Manage Plumbing Permits</h2>

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
	'id'=>'plumbing-permit-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'bldg_permit_num',
		'owner_fname',
		'owner_mname',
		'owner_lname',
		'owner_tin',
		/*
		'ownership_form',
		'tax_dec_num',
		'work_scope',
		'occupation_type',
		'addr_num',
		'addr_street',
		'addr_brgy',
		'addr_city_mun',
		'loc_lot_num',
		'loc_block_num',
		'loc_tct_num',
		'const_street',
		'const_brgy',
		'const_city_mun',
		'app_num',
		'permit_num',
		'app_status',
		'request_date',
		'update_date',
		'updated_by',
		'approved_by',
		'approved_by_position',
		'requested_by',
		'approval_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
