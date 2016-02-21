<?php
	include('../../connection.php');
	if(isset($_POST['budget'])){
		$budget = $_POST['budget'];
			if($budget != ""){
				$selectpackage = mysql_query("SELECT * FROM packages_tbl WHERE pk_price <= '$budget'");
				if(mysql_num_rows($selectpackage) > 0){
				echo "<table width='100%' class='table-bordered table-striped table-hover' id='suggested-table'>
						<thead>
							<tr>
								<td>Package Name</td>
								<td>Package Content</td>
								<td>Package Price</td>
								<td></td>
							</tr>
						</thead>
						<tbody>";
						while($package = mysql_fetch_array($selectpackage)){
							echo "<tr>
                                        <td>".$package['pk_name']."<br>(Good for ".$package['pk_person']." persons)</td>
                                        <td width='40%'><table class='table-bordered' width='100%'>
                                                <tbody>";
                                                $content = explode(",", $package['pk_content']);
                                                $quantity = explode(",", $package['pk_quan']);
                                                foreach(array_combine($content,$quantity) as $packagecontent => $packagequantity){
                                                    echo "<tr>
                                                            <td width='60%'>".$packagecontent."</td>
                                                            <td width='20%'>".$packagequantity."</td>
                                                          </tr>";
                                                }
                                echo            "</tbody>
                                            </table>
                                        </td>
                                        <td>Php ".number_format($package['pk_price'], 2)."</td>
                                        <td><button type='button' class='btn btn-info budgetselect' id='selectthis' value='".$package['pk_id']."' price='".$package['pk_price']."'>Select</button></td>";
						}
				echo   "</tbody>
					  </table>";
				} else {
					$qry = mysql_query("SELECT * FROM packages_tbl WHERE pk_price = (SELECT MIN(pk_price) FROM packages_tbl)");
					while($row = mysql_fetch_array($qry)){
						echo "<p style='color:#C8C8C8;font-size:25px'>Minimum package price offer is Php".number_format($row['pk_price'], 2)."</p>";
					}
					//echo "<p style='color:#C8C8C8;font-size:25px'>Please input a budget.</p>";	
				}
			} else {
				echo "<p style='color:#C8C8C8;font-size:25px'>Please input a budget.</p>";
			}
	}

?>
<html>
<script type="text/javascript" src="../../js/ajax.js"></script>
</html>