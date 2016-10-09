<?php
/* @var $this PatientReferralController */
/* @var $model PatientReferral */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'patient-referral-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'patient_id'); ?>
		<?php echo $form->hiddenField($model,'patient_id'); ?>
		<?php echo $form->error($model,'patient_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'history_id'); ?>
		<?php echo $form->hiddenField($model,'history_id'); ?>
		<?php echo $form->error($model,'history_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'referral_id'); ?>
		<?php echo $form->hiddenField($model,'referral_id'); ?>
		<?php echo $form->error($model,'referral_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',array('Unpaid'=>'Unpaid',
															'Paid'=>'Paid'
																)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

<!--	<div class="row">
		<?php echo $form->labelEx($model,'date_added'); ?>
		<?php echo $form->textField($model,'date_added'); ?>
		<?php echo $form->error($model,'date_added'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_modified'); ?>
		<?php echo $form->textField($model,'date_modified'); ?>
		<?php echo $form->error($model,'date_modified'); ?>
	</div>
-->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->