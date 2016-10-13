
<h1>Manage All Appointments</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'history-grid',
	'dataProvider'=>$model->search('', ''),
	'filter'=>$model,
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

