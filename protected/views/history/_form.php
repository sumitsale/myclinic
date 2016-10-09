<?php
/* @var $this HistoryController */
/* @var $model History */
/* @var $form CActiveForm */

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'history-form',
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
		<?php echo $form->hiddenField($model,'patient_id', array('value'=>$patient_id)); ?>
		<?php echo $form->error($model,'patient_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disease'); ?>
		<?php echo $form->textArea($model,'disease',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'disease'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'medicind'); ?>
		<?php //echo $form->textArea($model,'medicind',array('rows'=>6, 'cols'=>50)); 

echo Chosen::multiSelect('medicind', '', $internal_medicine,
    array(
       'data-placeholder' => 'Select internal Medicine',
       'style' => 'width:375px;',
       'options'=>array(
          'maxSelectedOptions' => 10,
          'displaySelectedOptions' => true,
    )));



		?>
		<?php echo $form->error($model,'medicind'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php //echo $form->textField($model,'date'); ?>


<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name'=>'History[date]',
			'model'=>$model,
			'value'=>$model->date!= '' ? date('Y-m-d', strtotime($model->date)) : date("Y-m-d", time()),
		// additional javascript options for the date picker plugin
		'options'=>array(
		'dateFormat'=>'yy-m-dd',
		'showAnim'=>'fold',
		'changeYear' => true,
		'changeMonth' => true
		
						),
						'htmlOptions'=>array(
							'style'=>'height:20px;',
							'readonly'=>'true' 

						),
					));

		?>



		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'injection'); ?>
		<?php echo $form->textArea($model,'injection',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'injection'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'external_medicine'); ?>
		<?php // echo $form->textArea($model,'external_medicine',array('rows'=>6, 'cols'=>50)); 



echo Chosen::multiSelect('external_medicine', '', $external_medicine,
    array(
       'data-placeholder' => 'Select external Medicine',
       'style' => 'width:375px;',
       'options'=>array(
          'maxSelectedOptions' => 10,
          'displaySelectedOptions' => true,
    )));





		?>
		<?php echo $form->error($model,'external_medicine'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lab_test'); ?>
		<?php echo $form->textArea($model,'lab_test',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'lab_test'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x_ray'); ?>
		<?php echo $form->textArea($model,'x_ray',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'x_ray'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fees'); ?>
		<?php echo $form->textField($model,'fees'); ?>
		<?php echo $form->error($model,'fees'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'unpaid'); ?>
		<?php echo $form->textField($model,'unpaid'); ?>
		<?php echo $form->error($model,'unpaid'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'session'); ?>
		<?php echo $form->dropDownList($model,'session',array('Morning'=>'Morning','Evening'=>'Evening')); ?>
		<?php echo $form->error($model,'session'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'referral'); ?>
		<?php //echo $form->textArea($model,'medicind',array('rows'=>6, 'cols'=>50)); 

echo Chosen::multiSelect('referral', '', $referral_array,
    array(
       'data-placeholder' => 'Select Referral',
       'style' => 'width:375px;',
       'options'=>array(
          'maxSelectedOptions' => 10,
          'displaySelectedOptions' => true,
    )));



		?>
		<?php echo $form->error($model,'referral'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->