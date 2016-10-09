<?php
/* @var $this HistoryController */
/* @var $model History */

$this->breadcrumbs=array(
	'Histories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List History', 'url'=>array('index')),
	array('label'=>'Manage History', 'url'=>array('admin')),
);
?>

<h1>Create History</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'patient_id'=>$patient_id,
			'internal_medicine' => $internal_medicine,
			'external_medicine' => $external_medicine,
			'referral_array' => $referral_array,
			'paidpatientReferral' => $paidpatientReferral,
			'unpaidpatientReferral' => $unpaidpatientReferral)); ?>