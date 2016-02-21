<?php
if(isset($_POST['next'])){

	$items = array();
	$items = $_POST['item'];
	$items = implode(',',$items);
	echo $items;

}



?>