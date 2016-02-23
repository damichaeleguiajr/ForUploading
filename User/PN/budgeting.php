<html>
<body>
<?php
include('../../connection.php');
	if(isset($_POST['budget'])){
		$budget = $_POST['budget'];
		$type = $_POST['type'];
		if($budget != ''){
			$thisqry = mysql_query("SELECT * FROM packages_tbl WHERE pk_category = '$type' and pk_price <= '$budget'");
			if(mysql_num_rows($thisqry) > 0){
			echo "<ul id='toggle-view' class='scroll containspackages'>";
                while($etopo = mysql_fetch_array($thisqry)){
                $_id = $etopo['pk_id'];
                echo "<li>";
                echo "<h3>".$etopo['pk_name']."&nbsp(₱".$etopo['pk_price'].")</h3>";
                echo "<span>Click to view details  +</span>";
                echo "<div class = 'panel'>";
                echo "<table width='100%' class='table-striped'>";
                echo "<tbody>";
                echo "<tr>";
                echo "<th class='forselectpackage'>Item Description</th>";
                echo "<th class='forselectpackage'>Individual Price</th>";
                echo "<th class='forselectpackage'>Item Quantity</th>";
                echo "</tr>";
                $content = $etopo['pk_content'];
                $content1 = explode(",", $content);
                $quantity = $etopo['pk_quan'];
                $quantity1 = explode(",", $quantity);
                foreach(array_combine($content1,$quantity1) as $newcontent => $newquantity){
                    echo "<tr class='forselectpackage'>";
                    echo "<td width='40%'>".$newcontent."</td>";
                    $qry = mysql_query("SELECT * FROM item_tbl WHERE i_name = '$newcontent'");
                    while($row = mysql_fetch_array($qry)){
                    	echo "<td>Php ".number_format($row['i_price'],2)."</td>";
                    }
                    echo "<td>".$newquantity."</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table><br>";
                echo "<button type='button' class='btn btn-info forselectbudget' id='selectthis' value='".$_id."' price='".$etopo['pk_price']."'>Select/Customize this Package</button>";
                echo "<br></div>";
                echo "</li>";
                }
        	echo "</ul>";
        	} else {
        		$qry = mysql_query("SELECT * FROM packages_tbl WHERE pk_price = (SELECT MIN(pk_price) FROM packages_tbl)");
					while($row = mysql_fetch_array($qry)){
						echo "<p style='color:#C8C8C8;font-size:25px'>Minimum package price offer is Php".number_format($row['pk_price'], 2)."</p>";
					}
        	}
        } else {
        	echo "<p style='color:#C8C8C8;font-size:25px'>Please input a budget</p>";
        }
    }
?>
<script src="../../js/onclick.js"></script>
<script src="packageselect.js"></script>
</body>
</html>