<?php
/* @var $this PatientReferralController */
/* @var $model PatientReferral */

$this->breadcrumbs=array(
	'Patient Referrals'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PatientReferral', 'url'=>array('index')),
	array('label'=>'Create PatientReferral', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#patient-referral-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Patient Referrals</h1>

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
	'id'=>'patient-referral-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'patient_id',
		 array(
                'name'=>'Patients.first_name',
                'value'=>'Patients::Model()->FindByPk($data->patient_id)->first_name' , //display the grid view 
        ),
		  array(
                'name'=>'Patients.last_name',
                'value'=>'Patients::Model()->FindByPk($data->patient_id)->last_name' , //display the grid view 
        ),
		//'history_id',
		  array(
                'name'=>'History.disease',
                'value'=>'History::Model()->FindByPk($data->history_id)->disease' , //display the grid view 
        ),
		  array(
                'name'=>'History.date',
                'value'=>'History::Model()->FindByPk($data->history_id)->date' , //display the grid view 
        ),
		//'referral_id',
		  array(
                'name'=>'Referral.name',
                'value'=>'Referral::Model()->FindByPk($data->referral_id)->name' , //display the grid view 
        ),
		'status',
		//'amount',
		/*
		'date_added',
		'date_modified',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
