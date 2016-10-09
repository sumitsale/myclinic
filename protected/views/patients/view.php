<?php
/* @var $this PatientsController */
/* @var $model Patients */

$this->breadcrumbs=array(
	'Patients'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Patients', 'url'=>array('index')),
	array('label'=>'Create Patients', 'url'=>array('create')),
	array('label'=>'Update Patients', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Patients', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Patients', 'url'=>array('admin')),
);
?>

<h1>View Patients #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'first_name',
		'last_name',
		'email',
		'phone',
		'gender',
		'address',
		'blood_group',
		'date_of_birth',
		//'image',
		'date_added',
		'date_modified',
	),
)); ?>
