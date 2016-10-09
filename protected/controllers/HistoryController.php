<?php

class HistoryController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		$model=new History;
	$paidpatientReferral=new PatientReferral('search');
	$unpaidpatientReferral=new PatientReferral('search');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);


	$internal_medicine = Yii::app()->db->createCommand()
								->select('*')
								->from('medicine')
								->where('type=:type', array(':type' => 'Internal'))
								->queryAll();


	$internal_medicine_array = array();

	for($i=0;$i<count($internal_medicine);$i++){
		$internal_medicine_array[$internal_medicine[$i]['name']] = $internal_medicine[$i]['name'];
	}


	$external_medicine = Yii::app()->db->createCommand()
								->select('*')
								->from('medicine')
								->where('type=:type', array(':type' => 'External'))
								->queryAll();


	$external_medicine_array = array(); 
	for($i=0;$i<count($external_medicine);$i++){
		$external_medicine_array[$external_medicine[$i]['name']] = $external_medicine[$i]['name'];
	}


$referral = Yii::app()->db->createCommand()
								->select('*')
								->from('referral')
								->queryAll();


	$referral_array = array(); 
	for($i=0;$i<count($referral);$i++){
		$referral_array[$referral[$i]['name']] = $referral[$i]['name'];
	}




		if(isset($_POST['History']))
		{
			$model->attributes=$_POST['History'];

			$model->date_added = date("Y-m-d H:i:s", time());
			$model->date_modified = date("Y-m-d H:i:s", time());
			$model->unpaid = $_POST['History']['unpaid'];


			if($_POST['medicind'] != '') {

				$model->medicind = implode(',',$_POST['medicind']);
	
			}			

			if($_POST['external_medicine'] != '') {
				$model->external_medicine = implode(',',$_POST['external_medicine']);

			}



			if($_POST['referral'] != '') {
				$model->referral = implode(',',$_POST['referral']);

			}


			if($model->save()){

				$history_id = Yii::app()->db->getLastInsertID();

				if($model->referral != '') {


				for($i=0; $i<count($_POST['referral']);$i++) {
						


					$referralName = Yii::app()->db->createCommand()
								->select('*')
								->from('referral')
								->where('name=:name',array(':name'=>$_POST['referral'][$i]))
								->queryAll();						


						$PatientReferral=new PatientReferral;

						$PatientReferral->patient_id = $model->patient_id;
						$PatientReferral->history_id = $history_id;
						$PatientReferral->referral_id = $referralName[0]['id'];
						$PatientReferral->status = 'unpaid';
						$PatientReferral->amount = 0;
						$PatientReferral->date_added = date("Y-m-d H:i:s", time());
					    $PatientReferral->date_modified = date("Y-m-d H:i:s", time());

						$PatientReferral->save(false);


				}



				}

				$this->redirect(array('admin','id'=>$model->patient_id));
			}
				
		}

		$this->render('create',array(
			'model'=>$model,
			'patient_id' =>$id,
			'internal_medicine' => $internal_medicine_array,
			'external_medicine' => $external_medicine_array,
			'referral_array' => $referral_array,
			'paidpatientReferral' => $paidpatientReferral,
			'unpaidpatientReferral' => $unpaidpatientReferral
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);




	$internal_medicine = Yii::app()->db->createCommand()
								->select('*')
								->from('medicine')
								->where('type=:type', array(':type' => 'Internal'))
								->queryAll();


	$internal_medicine_array = array();

	for($i=0;$i<count($internal_medicine);$i++){
		$internal_medicine_array[$internal_medicine[$i]['name']] = $internal_medicine[$i]['name'];
	}

	$external_medicine = Yii::app()->db->createCommand()
								->select('*')
								->from('medicine')
								->where('type=:type', array(':type' => 'External'))
								->queryAll();


	$external_medicine_array = array(); 
	for($i=0;$i<count($external_medicine);$i++){
		$external_medicine_array[$external_medicine[$i]['name']] = $external_medicine[$i]['name'];
	}



$referral = Yii::app()->db->createCommand()
								->select('*')
								->from('referral')
								->queryAll();


	$referral_array = array(); 
	for($i=0;$i<count($referral);$i++){
		$referral_array[$referral[$i]['name']] = $referral[$i]['name'];
	}

		if(isset($_POST['History']))
		{


			$model->attributes=$_POST['History'];
			$model->date_modified = date("Y-m-d H:i:s", time());
			$model->unpaid = $_POST['History']['unpaid'];


			if($_POST['medicind'] != '') {

				$model->medicind = implode(',',$_POST['medicind']);
	
			}			

			if($_POST['external_medicine'] != '') {
				$model->external_medicine = implode(',',$_POST['external_medicine']);

			}


			if($_POST['referral'] != '') {
				$model->referral = implode(',',$_POST['referral']);

			}
			
			if($model->save()) {



			if($model->referral != '') {


				$command = Yii::app()->db->createCommand()
				->delete('patient_referral', 'history_id=:history_id and status=:status'
					, array(':history_id'=>$model->id,
							':status'=>'Unpaid'));

				for($i=0; $i<count($_POST['referral']);$i++) {
						


					$referralName = Yii::app()->db->createCommand()
								->select('*')
								->from('referral')
								->where('name=:name',array(':name'=>$_POST['referral'][$i]))
								->queryAll();						


						$PatientReferral=new PatientReferral;

						$PatientReferral->patient_id = $model->patient_id;
						$PatientReferral->history_id = $model->id;
						$PatientReferral->referral_id = $referralName[0]['id'];
						$PatientReferral->status = 'unpaid';
						$PatientReferral->amount = 0;
						$PatientReferral->date_added = date("Y-m-d H:i:s", time());
					    $PatientReferral->date_modified = date("Y-m-d H:i:s", time());

						$PatientReferral->save(false);


				}



				}





				$this->redirect(array('admin','id'=>$model->patient_id));
			
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'internal_medicine' => $internal_medicine_array,
			'external_medicine' => $external_medicine_array,
			'referral_array' => $referral_array
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();


				$command = Yii::app()->db->createCommand()
				->delete('patient_referral', 'history_id=:history_id'
					, array(':history_id'=>$id,
							));

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('History');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Patients the loaded model
	 * @throws CHttpException
	 */
	public function loadPatientModel($id)
	{
		$model=Patients::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($id)
	{
		$model=new History('search');
		
		$paidpatientReferral=new PatientReferral('search');
		$unpaidpatientReferral=new PatientReferral('search');

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['History']))
			$model->attributes=$_GET['History'];

		$this->render('admin',array(
			'model'=>$model,
			'id'	=> $id,
			'patientModel' => $this->loadPatientModel($id),
			'paidpatientReferral' => $paidpatientReferral,
			'unpaidpatientReferral' => $unpaidpatientReferral
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return History the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=History::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param History $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='history-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
