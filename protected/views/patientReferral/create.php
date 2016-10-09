<?php
/* @var $this PatientReferralController */
/* @var $model PatientReferral */

$this->breadcrumbs=array(
	'Patient Referrals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PatientReferral', 'url'=>array('index')),
	array('label'=>'Manage PatientReferral', 'url'=>array('admin')),
);
?>

<h1>Create PatientReferral</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>