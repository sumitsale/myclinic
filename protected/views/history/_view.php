<?php
/* @var $this HistoryController */
/* @var $data History */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('patient_id')); ?>:</b>
	<?php echo CHtml::encode($data->patient_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disease')); ?>:</b>
	<?php echo CHtml::encode($data->disease); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('medicind')); ?>:</b>
	<?php echo CHtml::encode($data->medicind); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('injection')); ?>:</b>
	<?php echo CHtml::encode($data->injection); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('external_medicine')); ?>:</b>
	<?php echo CHtml::encode($data->external_medicine); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('lab_test')); ?>:</b>
	<?php echo CHtml::encode($data->lab_test); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x_ray')); ?>:</b>
	<?php echo CHtml::encode($data->x_ray); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_added')); ?>:</b>
	<?php echo CHtml::encode($data->date_added); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />

	*/ ?>

</div>