<html>
<head>
<title>
CALENDAR
</title>
<script src="js/calendar.js"></script>
<style>
.active{
	background-color: #00ff00;
}
.event{
	background-color: #0000ff;
}
.full{
	background-color: #ff0000;
}
</style>
</head>
<body>
	<?php
	if(isset($_GET['day'])){
	$day = $_GET['day'];
	}else{
	$day = date("j");
	}
	if(isset($_GET['month'])){
	$month = $_GET['month'];
	}else{
	$month = date("n");
	}
	if(isset($_GET['year'])){
	$year = $_GET['year'];
	}else{
	$year = date("Y");
	}
	//variable for calendar
	$currentTimeStamp = strtotime("$year-$month-$day");
	$monthName = date("F", $currentTimeStamp);
	$numDays = date("t", $currentTimeStamp);
	$counter = 0;
	
	?>
	<table border="1">
		<tr>
			<td><input style = 'width:50px;' type = 'button' value = '<' name = 'previousbutton' onClick = "goLastMonth(<?php echo $month.", ".$year ?>)"></td>
			<td colspan="5" style = 'text-align: center;'> <?php echo $monthName.", ".$year; ?> </td>
			<td><input style = 'width:50px;' type = 'button' value = '>' name = 'nextbutton' onClick = "goNextMonth(<?php echo $month.", ".$year ?>)"></td>
		</tr>
		<tr>
			<td width="50px">Sun</td>
			<td width="50px">Mon</td>
			<td width="50px">Tue</td>
			<td width="50px">Wed</td>
			<td width="50px">Thu</td>
			<td width="50px">Fri</td>
			<td width="50px">Sat</td>
		</tr>
		<?php
			echo "<tr>";

			for($i = 1; $i < $numDays+1; $i++, $counter++){
				$timeStamp = strtotime("$year-$month-$i");
				if($i == 1){
					$firstDay = date("w", $timeStamp);
					for($j = 0; $j < $firstDay; $j++, $counter++){
					echo "<td>&nbsp;</td>";	
					}
				}	
				if($counter % 7 == 0){
					echo "</tr><tr>";
				}
				$monthstring = $month;
				$monthlength = strlen($monthstring);
				$daystring = $i;
				$daylength = strlen($daystring);
				if($monthlength <= 1){
					$monthstring = "0".$monthstring;
				}
				if($daylength <= 1){
					$daystring = "0".$daystring;
				}
				$todaysDate = date("m/d/Y");
				$twodays = date('m/d/Y', strtotime($todaysDate. ' + 2 days'));
				$dateToCompare = $monthstring. '/' .$daystring. '/' .$year;
				echo "<td align = 'center'";
				if($dateToCompare == date("m/d/Y")){
					echo "class = event";
				}
				if($twodays >= $dateToCompare){
						echo">".$i."</td>";
				}else{
					$sqlCount = "SELECT * from eventcalendar where eventDate = '".$dateToCompare."'";
					$noOfEvent = mysql_num_rows(mysql_query($sqlCount));
					if($noOfEvent >= 3){
						echo "class = 'full'";
						echo"><a href = '#' onClick = 'full()'>".$i."</a></td>";
					}else{
						echo"><a href = '".$_SERVER['PHP_SELF']."?month=".$monthstring."&day=".$daystring."&year=".$year."&v=true&f=true'>".$i."</a></td>";
					}
				}
			}
			echo "</tr>";
		?>
	</table>
</body>
</html>