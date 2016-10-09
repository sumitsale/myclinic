

<form action="index" method="post">

	<table>

			<tr>
				<td>Year</td>
				<td>
						<select name="year">
						 	<option value="">Select Year</option>
						  <?php for($i = date("Y", time()); $i>= 2010; $i--)  { ?>
								  
								  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

						 <?php } ?>			  
						</select>
				</td>

				<?php 

$mons = array(1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec");
				?>
				<td>Month</td>
				<td>

					<select name="month">

					<option value="">Select Month</option>
					  <?php for($i = 1; $i<= 12; $i++)  { ?>
								  
								  <option value="<?php echo $i; ?>"><?php echo $mons[$i]; ?></option>

						 <?php } ?>			  
						</select>
				</td>


				<td>Week</td>
				<td>
				
						<select name="week">
							<option value="">Select Week</option>
						  <?php for($i = 1; $i<= 5; $i++)  { ?>
								  
								  <option value="<?php echo $i; ?>"><?php echo "Week ". $i; ?></option>

						 <?php } ?>	
						  		  <option value="All">All</option>

						</select>

				</td>

			</tr>

			<tr>
				<td colspan=3>OR</td>				
			</tr>

			<tr>
					<td>Date</td>
					<td><input type="date" name="date"></td>
			</tr>

			<tr>
				<td>
					<input type="submit" name="submit" value="submit">
				</td>
			</tr>

	</table>


</form>


<?php if(count($data) >0 ) { ?>

<?php if($date != '') { ?>

	<h1>Revenue for - <?php echo $date; ?></h1>

<?php }  else { ?>

<h1>Revenue for - <?php echo $year. ' - ' .$mons[$month]. ' - '. 'Week '.$week?></h1>

<?php } ?>
<table BORDER=10 BORDERCOLOR=RED>


	<tr>	
		<td>Year</td>
		<td>Month</td>
		<td>Week</td>
		<td>Total Appointments</td>
		<td>Fees</td>
		<td>Unaid</td>
		<td>Earn</td>
	</tr>

	<?php for($i=0;$i<count($data);$i++) { ?>



	<tr>	
		<td><?php echo $data[$i]['year']; ?></td>
		<td><?php echo $mons[$data[$i]['month']]; ?></td>
		<td><?php echo "Week ".$data[$i]['week']; ?></td>
		<td><?php echo $data[$i]['total_appointments']; ?></td>
		<td><?php echo $data[$i]['fees']; ?></td>
		<td><?php echo $data[$i]['unpaid']; ?></td>
		<td><?php echo ($data[$i]['fees'] - $data[$i]['unpaid']); ?></td>
	</tr>


	<?php } ?>



</table>

<?php } ?>
