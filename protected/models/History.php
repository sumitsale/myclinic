<?php

/**
 * This is the model class for table "history".
 *
 * The followings are the available columns in table 'history':
 * @property integer $id
 * @property integer $patient_id
 * @property string $disease
 * @property string $medicind
 * @property string $date
 * @property string $injection
 * @property string $external_medicine
 * @property integer $lab_test
 * @property integer $x_ray
 * @property string $date_added
 * @property string $date_modified
 */
class History extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('patient_id, disease, medicind, date, fees, session, date_added, date_modified', 'required'),
			array('patient_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, patient_id, disease, medicind, date, injection, external_medicine, lab_test, x_ray, fees, unpaid, session,referral,  date_added, date_modified', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'patient_id' => 'Patient',
			'disease' => 'Disease',
			'medicind' => 'Medicine',
			'date' => 'Date',
			'injection' => 'Injection',
			'external_medicine' => 'External Medicine',
			'lab_test' => 'Lab Test',
			'x_ray' => 'X Ray',
			'fees' => 'Fees',
			'session' => 'Session',
			'unpaid' => 'Unpaid',
			'referral' => 'Referral',
			'date_added' => 'Date Added',
			'date_modified' => 'Date Modified',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search($patient_id,$unpaid='')
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);


		if($patient_id !='') {
			$criteria->compare('patient_id',$patient_id);
		}

		$criteria->compare('disease',$this->disease,true);
		$criteria->compare('medicind',$this->medicind,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('injection',$this->injection,true);
		$criteria->compare('external_medicine',$this->external_medicine,true);
		$criteria->compare('lab_test',$this->lab_test);
		$criteria->compare('x_ray',$this->x_ray);
		$criteria->compare('fees',$this->fees);

		if($unpaid !=''){
			$criteria->compare('NOT unpaid',0);			
		} else {
			$criteria->compare('unpaid',$this->unpaid);
		}

		$criteria->compare('session',$this->session);
		$criteria->compare('referral',$this->referral);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
                        'defaultOrder'=>'id desc',
                    )
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return History the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
