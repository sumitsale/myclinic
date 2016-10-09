<?php
/* @var $this ReferralController */
/* @var $model Referral */

$this->breadcrumbs=array(
	'Referrals'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Referral', 'url'=>array('index')),
	array('label'=>'Create Referral', 'url'=>array('create')),
	array('label'=>'View Referral', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Referral', 'url'=>array('admin')),
);
?>

<h1>Update Referral <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>