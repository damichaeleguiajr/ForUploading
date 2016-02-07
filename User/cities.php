<?php
include('connection.php');

if(isset($_POST['province'])){
	$city = $_POST['province'];
	$event = mysql_query("SELECT * FROM cities_tbl");
	while($eventview = mysql_fetch_array($event)){
	}
}
?>