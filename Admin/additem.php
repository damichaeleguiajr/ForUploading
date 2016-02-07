<?php
include('../connection.php');
if(isset($_POST['submit'])){
		$itemtype = $_POST['itemtype'];
		$itemname = $_POST['itemname'];
		$itemprice = $_POST['itemprice'];
		$itemdescription = $_POST['itemdescription'];
		$dateadded = date('Y/m/d');
		$stat = 'Available';
            //echo $itemname."<br>".$itemprice."<br>".$itemdescription."<br>".$stat."<br>".$dateadded;
		if($itemtype == '---SELECT TYPE---'){
			$message = "<script language=javascript> 
            alert(\"Error. Please check some input.\");</script>"; 
			echo $message;
		}else{
		$sql = mysql_query("INSERT INTO item_tbl (i_type,i_name,i_price,i_desc,i_stat,i_added) VALUES ('$itemtype','$itemname','$itemprice','$itemdescription','$stat','$dateadded')");
		if($sql){
			$message = "<script language=javascript> 
            alert(\"Successfully.($dateadded)\");</script>"; 
			echo $message;
		}else{

			$message = "<script language=javascript> 
            alert(\"Successfully EKS EKS.\");</script>"; 
			echo $message;
		}
	}
}
?>
<form method = "POST" action = "#">
	<table width = '400px' height = '120px'>
		<tr>
			<td width = '70px'>Type:</td>
			<td width = '200px'><select name = 'itemtype'>
								<option>---SELECT TYPE---</option>
								<option>Item</option>
								<option>Service</option>
								</select>
			</td>
		</tr>
		<tr>
			<td width = '70px'>Item Name:</td>
			<td width = '200px'><input type = 'text' name = 'itemname' value = ''></td>
		</tr>
		<tr>
			<td width = '70px'>Item Price:</td>
			<td width = '200px'><input type = 'text' name = 'itemprice'></td>
		</tr>
		<tr>
			<td width = '70px'>Item Description:</td>
			<td width = '200px'><input type = 'text' name = 'itemdescription'></td>
		</tr>
		<tr>
			<td width = '200px' align = 'right'><input type = 'submit' name = 'submit' value = 'Submit'></td>
			<td width = '200px'><input type = 'submit' name = 'submit' value = 'Cancel'></td>
		</tr>
	</table>
</form>

