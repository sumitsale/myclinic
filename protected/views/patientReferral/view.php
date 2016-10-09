<?php
/* @var $this PatientReferralController */
/* @var $model PatientReferral */

$this->breadcrumbs=array(
	'Patient Referrals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PatientReferral', 'url'=>array('index')),
	array('label'=>'Create PatientReferral', 'url'=>array('create')),
	array('label'=>'Update PatientReferral', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PatientReferral', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PatientReferral', 'url'=>array('admin')),
);
?>

<h1>View PatientReferral #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'patient_id',
		'history_id',
		'referral_id',
		'status',
		'amount',
		'date_added',
		'date_modified',
	),
)); ?>
