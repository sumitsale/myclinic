<?php
/* @var $this HistoryController */
/* @var $model History */

$this->breadcrumbs=array(
	'Histories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List History', 'url'=>array('index')),
	array('label'=>'Create History', 'url'=>array('create?id='.$id)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#history-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Patients #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$patientModel,
	'attributes'=>array(
	//	'id',
		'first_name',
		'last_name',
		'email',
		'phone',
		'gender',
		'address',
		'blood_group',
		'date_of_birth',
//		'image',
		'date_added',
		'date_modified',
	),
)); ?>
<br>





<h1>Manage Histories</h1>

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
	'id'=>'history-grid',
	'dataProvider'=>$model->search($id),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'patient_id',
		'disease',
		'medicind',
		'date',
		'injection',
		'fees',
		'unpaid',
		'session',
		/*
		'external_medicine',
		'lab_test',
		'x_ray',
		'date_added',
		'date_modified',
		*/
		array(
			'class'=>'CButtonColumn',
			'template' => '{view}{update}',
		),
	),
)); ?>



<?php 

 $patientreferralPID = Yii::app()->db->createCommand()
								->select('*')
								->from('patient_referral')
								->where('patient_id=:patient_id and status=:status',
									array(':patient_id'=>$id, ':status'=>'Unpaid'))
								->queryAll();						

   if(count($patientreferralPID)>0) { ?>


<br>


<?php
/* @var $this PatientReferralController */
/* @var $model PatientReferral */

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

<h1>Manage Unpaid Patient Referrals</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'patient-referral-grid',
	'dataProvider'=>$unpaidpatientReferral->search('Unpaid', $model->id),
	'filter'=>$unpaidpatientReferral,
	'columns'=>array(
		//'id',
		//'patient_id',
		  array(
                'name'=>'History.disease',
                'value'=>'History::Model()->FindByPk($data->history_id)->disease' , //display the grid view 
        ),
		  array(
                'name'=>'History.date',
                'value'=>'History::Model()->FindByPk($data->history_id)->date' , //display the grid view 
        ),
		array(
                'name'=>'History.session',
                'value'=>'History::Model()->FindByPk($data->history_id)->session' , //display the grid view 
        ),
		//'referral_id',
		  array(
                'name'=>'Referral.name',
                'value'=>'Referral::Model()->FindByPk($data->referral_id)->name' , //display the grid view 
        ),
		'status',
		'amount',
		/*
		'date_added',
		'date_modified',
		*/
		array(
		'class'=>'CButtonColumn'
            , 'viewButtonUrl'=>'Yii::app()->createUrl("/patientReferral/view", array("id"=>$data["id"]))'
            , 'updateButtonUrl'=>'Yii::app()->createUrl("/patientReferral/update", array("id"=>$data["id"]))'
            , 'deleteButtonUrl'=>'Yii::app()->createUrl("/patientReferral/delete", array("id"=>$data["id"]))'
            )
	),
)); ?>

<?php } ?>



<?php 

 $patientreferralPID = Yii::app()->db->createCommand()
								->select('*')
								->from('patient_referral')
								->where('patient_id=:patient_id and status=:status',
									array(':patient_id'=>$id, ':status'=>'Paid'))
								->queryAll();						



   if(count($patientreferralPID)>0) { ?>


<br>

<?php
/* @var $this PatientReferralController */
/* @var $model PatientReferral */


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

<h1>Manage Paid Patient Referrals</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'patient-referral-grid',
	'dataProvider'=>$paidpatientReferral->search('paid', $model->id),
	'filter'=>$paidpatientReferral,
	'columns'=>array(
		//'id',
		//'patient_id',
		  array(
                'name'=>'History.disease',
                'value'=>'History::Model()->FindByPk($data->history_id)->disease' , //display the grid view 
        ),
		  array(
                'name'=>'History.date',
                'value'=>'History::Model()->FindByPk($data->history_id)->date' , //display the grid view 
        ),
		  array(
                'name'=>'History.session',
                'value'=>'History::Model()->FindByPk($data->history_id)->session' , //display the grid view 
        ),
		//'referral_id',
		  array(
                'name'=>'Referral.name',
                'value'=>'Referral::Model()->FindByPk($data->referral_id)->name' , //display the grid view 
        ),
		'status',
		'amount',
		/*
		'date_added',
		'date_modified',
		*/ 
		array(
		'class'=>'CButtonColumn'
            , 'viewButtonUrl'=>'Yii::app()->createUrl("/patientReferral/view", array("id"=>$data["id"]))'
            , 'updateButtonUrl'=>'Yii::app()->createUrl("/patientReferral/update", array("id"=>$data["id"]))'
            , 'deleteButtonUrl'=>'Yii::app()->createUrl("/patientReferral/delete", array("id"=>$data["id"]))'
            )
	),
)); ?>


<?php } ?>