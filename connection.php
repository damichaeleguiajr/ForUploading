<?php

	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ehkasi_db";
	$error = "Cannot connect to the database..";

	$sqlCon = mysql_connect($hostname,$username,$password) or die ($error);
	mysql_select_db($dbname) or die ($error);
?>