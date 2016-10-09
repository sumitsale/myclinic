<?php
/* @var $this PatientReferralController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Patient Referrals',
);

$this->menu=array(
	array('label'=>'Create PatientReferral', 'url'=>array('create')),
	array('label'=>'Manage PatientReferral', 'url'=>array('admin')),
);
?>

<h1>Patient Referrals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
