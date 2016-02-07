<?php
include('connection.php');
session_start();
if(isset($_POST['uname'])){
	$uname = $_POST['uname'];
	$qry = mysql_query("select * from users_tbl");
	while($check = mysql_fetch_array($qry)){
		$username = $check['u_acc'];
		if($uname == $username){
			echo "Already exist";
		}else{
			echo "Account is availabe";
		}
	}
}
?>