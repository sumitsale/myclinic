<?php

/**
 * This is the model class for table "patient_referral".
 *
 * The followings are the available columns in table 'patient_referral':
 * @property integer $id
 * @property integer $patient_id
 * @property integer $history_id
 * @property integer $referral_id
 * @property string $status
 * @property integer $amount
 * @property string $date_added
 * @property string $date_modified
 */
class PatientReferral extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'patient_referral';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('patient_id, history_id, referral_id, status, amount, date_added, date_modified', 'required'),
			array('patient_id, history_id, referral_id, amount', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, patient_id, history_id, referral_id, status, amount, date_added, date_modified', 'safe', 'on'=>'search'),
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
			'history_id' => 'History',
			'referral_id' => 'Referral',
			'status' => 'Status',
			'amount' => 'Amount',
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
	public function search($status, $patient_id='')
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
	//	$criteria->compare('patient_id',$this->patient_id);

		if($patient_id !='') {
			$criteria->compare('patient_id',$patient_id);
		}		

		$criteria->compare('history_id',$this->history_id);
		$criteria->compare('referral_id',$this->referral_id);
		//$criteria->compare('status',$this->status,true);


		
		if($status !='') {
			$criteria->compare('status',$status);
		}

		$criteria->compare('amount',$this->amount);
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
	 * @return PatientReferral the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
