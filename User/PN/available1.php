<?php
include('../../connection.php');
session_start();
?>
<html>
<table class='table-hover table-striped' width = '100%' id='myTable'>
    <tr>
        <th>Item name</th>
        <th class=''>Item Price</th>
        <th>Action</th>
    </tr>
        <?php
        if(isset($_POST['badyet'])){
        	$badyet = $_POST['badyet'];
            $i = 0;
            $qryitems = mysql_query("SELECT * FROM item_tbl WHERE i_price <= '$badyet' ORDER BY i_name");
                while($selectedpackage = mysql_fetch_array($qryitems)){
                    $itemid = $selectedpackage['i_id'];
                    $itemname = $selectedpackage['i_name'];
                    $itemprice = $selectedpackage['i_price'];
                    $forCall = $itemid."081093";
                    $forPut = $itemid+"11";
                    echo "<tr>";
                    echo    "<td align='left'><input class='asd' type='text' value='".$itemname."' readonly size='40'></td>";
                    echo    "<td>₱".$itemprice."</td>";
                    echo    "<td><button class='btn-success btn forAddContent' forCount='".$forPut."' forField = '".$forCall."' id='".$itemname."' idPrice = '".$itemprice."' forID='".$itemid."' type='button'>Select</button></td>";
                    echo "</tr>";
                    $i++;
                }
        }
        ?>
</table>
<script type="text/javascript" src="JQuery/budgeting-ajax.js"></script>
</html>