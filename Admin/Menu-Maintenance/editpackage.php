<?php
include('../../connection.php');
if(isset($_POST['editpackage'])){
	$editpackage = $_POST['editpackage'];
	$qry = mysql_query("SELECT * FROM item_tbl WHERE i_id = '$editpackage'");
	while($edit = mysql_fetch_array($qry)){
		echo "<tr>";
			echo "<td><label>Item Name:</label></td>";
			echo "<td><input class='qty1' type='text' name='editName' value='".$edit['i_name']."'></td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td><label>Item Price:</label></td>";
			echo "<td><input class='qty' type='text' name='editPrice' value='".$edit['i_price']."'></td>";
		echo "</tr>";
	}
}
?>