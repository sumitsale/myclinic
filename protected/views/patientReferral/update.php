<?php
/* @var $this PatientReferralController */
/* @var $model PatientReferral */

$this->breadcrumbs=array(
	'Patient Referrals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PatientReferral', 'url'=>array('index')),
	array('label'=>'Create PatientReferral', 'url'=>array('create')),
	array('label'=>'View PatientReferral', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PatientReferral', 'url'=>array('admin')),
);
?>

<h1>Update PatientReferral <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>