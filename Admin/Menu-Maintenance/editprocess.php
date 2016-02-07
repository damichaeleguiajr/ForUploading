<?php
include('../../connection.php');
if(isset($_POST['id'])){
	$id=$_POST['id'];
	$name=$_POST['name'];
	$price=$_POST['price'];
	$qry=mysql_query("UPDATE item_tbl SET i_name='$name', i_price='$price' WHERE i_id='$id'");
}
if(isset($_POST['addName'])){
	$name=$_POST['addName'];
	$price=$_POST['addPrice'];
	$qry=mysql_query("INSERT INTO item_tbl(i_name,i_price) VALUES ('$name','$price')");
}
if(isset($_POST['forDelete'])){
	$id = $_POST['forDelete'];
	$qry=mysql_query("DELETE FROM item_tbl WHERE i_id='$id'");
}
?>