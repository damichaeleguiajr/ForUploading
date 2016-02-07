<?php
include('../connection.php');
if(isset($_POST['date'])){
	$date = $_POST['date'];
	$date = date('F j, Y', strtotime($date));
	$qry = mysql_query("SELECT * FROM reservation_tbl r_pay=1 AND r_date='$date'");
	if($qry){
		if(mysql_num_rows($qry) > 0){
			echo "Date is available";
		} else {
			echo "Date is not availabe";
		}
	}else{
		echo "Date is available";
	}
}



?>