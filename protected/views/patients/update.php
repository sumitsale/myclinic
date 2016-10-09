<?php
/* @var $this PatientsController */
/* @var $model Patients */

$this->breadcrumbs=array(
	'Patients'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Patients', 'url'=>array('index')),
	array('label'=>'Create Patients', 'url'=>array('create')),
	array('label'=>'View Patients', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Patients', 'url'=>array('admin')),
);
?>

<h1>Update Patients <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>