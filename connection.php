<?php

	$hostname = "localhost";
	$username = "u671731253_ekb";
	$password = "081093daj";
	$dbname = "u671731253_ekb";
	$error = "Cannot connect to the database..";

	$sqlCon = mysql_connect($hostname,$username,$password) or die ($error);
	mysql_select_db($dbname) or die ($error);
?>