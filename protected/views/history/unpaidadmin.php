
<h1>Manage Unpaid Patients History</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'history-grid',
	'dataProvider'=>$model->search('', 'unpaid'),
	'filter'=>null,
	'columns'=>array(
		//'id',
		//'patient_id',
		 /*array(
                'name'=>'Patients.first_name',
                'value'=>'Patients::Model()->FindByPk($data->patient_id)->first_name' , //display the grid view 
        ),

		 array(
'class'=>'CLinkColumn',
'label'=>'History',
'url'=>'History/admin/'.$model->patient_id,
'header'=>'History'
),
*/
		 array(
            'name'=>'patient_id',
            'type'=>'raw',
            'value' => 'CHtml::link(Patients::Model()->FindByPk($data->patient_id)->first_name,Yii::app()->createUrl("History/admin",array("id"=>$data->patient_id)))',
      ),

		'disease',
		'medicind',
		'date',
		//'injection',
		'fees',
		'unpaid',
		'session',
		/*
		'external_medicine',
		'lab_test',
		'x_ray',
		'date_added',
		'date_modified',
		*/
		array(
			'class'=>'CButtonColumn',
			'template' => '{view}{update}',
		),
	),
)); ?>





<br>


<h1>Manage Patient Referrals</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'patient-referral-grid',
	'dataProvider'=>$model1->search('Unpaid'),
	'filter'=>null,
	'columns'=>array(
		//'id',
		//'patient_id',
		 /*array(
                'name'=>'Patients.first_name',
                'value'=>'Patients::Model()->FindByPk($data->patient_id)->first_name' , //display the grid view 
        ),
		  array(
                'name'=>'Patients.last_name',
                'value'=>'Patients::Model()->FindByPk($data->patient_id)->last_name' , //display the grid view 
        ), */
			 array(
            'name'=>'patient_id',
            'type'=>'raw',
            'value' => 'CHtml::link(Patients::Model()->FindByPk($data->patient_id)->first_name ,Yii::app()->createUrl("History/admin",array("id"=>$data->patient_id)))',
      ),

		//'history_id',
		  array(
                'name'=>'History.disease',
                'value'=>'History::Model()->FindByPk($data->history_id)->disease' , //display the grid view 
        ),
		  array(
                'name'=>'History.date',
                'value'=>'History::Model()->FindByPk($data->history_id)->date' , //display the grid view 
        ),
		//'referral_id',
		 /* array(
                'name'=>'Referral.name',
                'value'=>'Referral::Model()->FindByPk($data->referral_id)->name' , //display the grid view 
        ),*/

array(
            'name'=>'Referral.name',
            'type'=>'raw',
            'value' => 'CHtml::link(Referral::Model()->FindByPk($data->referral_id)->name,Yii::app()->createUrl("referral/view",array("id"=>$data->referral_id)))',
      ),

		'status',
		//'amount',
		/*
		'date_added',
		'date_modified',
		*/

		array(
		'class'=>'CButtonColumn'
            , 'viewButtonUrl'=>'Yii::app()->createUrl("/patientReferral/view", array("id"=>$data["id"]))'
            , 'updateButtonUrl'=>'Yii::app()->createUrl("/patientReferral/update", array("id"=>$data["id"]))'
            , 'deleteButtonUrl'=>'Yii::app()->createUrl("/patientReferral/delete", array("id"=>$data["id"]))'
            )
	),
)); ?>
