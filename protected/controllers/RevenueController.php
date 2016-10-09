<?php

class RevenueController extends Controller
{
	public function actionIndex()
	{

		$year='';
		$month='';
		$week='';
		$date='';
		$data=array();

		if(isset($_POST['submit'])) {

				$year=$_POST['year'];
				$month=$_POST['month'];
				$week=$_POST['week'];
				$date= $_POST['date'];

				if($date == '') {

					if($year != '' && $month !='' && $week != '') {


					if($week === 'All') {
							
						$sql = "select year( date ) as year , month( date ) as month , (WEEK( date, 5 ) - WEEK( DATE_SUB( date, INTERVAL DAYOFMONTH( date ) -1 DAY ) , 5 ) +1) AS week, count(id) as total_appointments, sum(fees) as fees, sum(unpaid) unpaid from history group by year, month, week having year = " . $year . " and month = " . $month . " order by year, month, week";

						$data= Yii::app()->db->createCommand($sql)->queryAll();						


					} else {

						$sql = "select year( date ) as year , month( date ) as month , (WEEK( date, 5 ) - WEEK( DATE_SUB( date, INTERVAL DAYOFMONTH( date ) -1 DAY ) , 5 ) +1) AS week, count(id) as total_appointments, sum(fees) as fees, sum(unpaid) unpaid from history group by year, month, week having year = " . $year . " and month = " . $month . " and week = " . $week . " order by year, month, week";

						$data= Yii::app()->db->createCommand($sql)->queryAll();						

					}
				}

				} else {

						$tempDate = date("Y-m-d", strtotime($date));

						$sql = "select year( date ) as year , month( date ) as month , (WEEK( date, 5 ) - WEEK( DATE_SUB( date, INTERVAL DAYOFMONTH( date ) -1 DAY ) , 5 ) +1) AS week, count(id) as total_appointments, sum(fees) as fees, sum(unpaid) unpaid from history group by year, month, week, date having date = '" . $tempDate. "'";

						$data= Yii::app()->db->createCommand($sql)->queryAll();						


				}

		}




		$this->render('index',array(
			'year'=>$year,
			'month'=>$month,
			'week'=>$week,
			'date'=>$date,
			'data' =>$data
			));
	}

	public function actionSubmit()
	{


		echo "<pre>";
		print_r($_POST);

		$this->render('index');
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}