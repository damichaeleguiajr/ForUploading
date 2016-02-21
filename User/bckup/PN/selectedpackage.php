<?php

		include('../../connection.php');
		session_start();
        
?>
<html>
<head>
<link href="../../fonts/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">
<link href="../../css/bootstrap.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../../css/heroic-features.css" rel="stylesheet">
<style>
.striped > tbody > tr:nth-child(odd) {
   background-color: #ffd;
}
th {
    background-color: #4CAF50;
    color: white;
}tr {
    height:5px;
}
</style>
</head>
<body>
		<?php
		if(isset($_POST['packageid'])){
        echo '<form method="POST" action="review.php" id="review">';
        echo "<div class='row' style='padding:20px 0 20px 20px' style='position:inline'>";
        echo "<div class='alert-box notice col-lg-6'><span>notice: </span>Minimum price that we accept is Php 500.00</div>";
        echo "<div class='col-lg-6'>";
        echo "<table width = '100%' id='packageTable' class='striped'>
                <tbody>
                <tr>
                    <th>Item Description</th>
                    <th class = 'centerthis'>Quantity</th>
                    <th>Item Cost</th>
                    <th class = 'centerthis'>Price</th>
                    <th class = 'centerthis'>Action</th>
                </tr>
                <tr>";
		$packageid = $_POST['packageid'];
		$qryitems = mysql_query("SELECT * FROM packages_tbl where pk_id = '$packageid'");
		while($selectedpackage = mysql_fetch_array($qryitems)){
            $priceThis = $selectedpackage['pk_price'];
			$i = 0;
            $itemOriginal = $selectedpackage['pk_originalPrice'];
			$content = $selectedpackage['pk_content'];
            $content1 = explode(",", $content);
            $quantity = $selectedpackage['pk_quan'];
            $quantity1 = explode(",", $quantity);
			foreach(array_combine($content1,$quantity1) as $newcontent => $newquantity){
			$price = mysql_query("SELECT * FROM item_tbl where i_name = '$newcontent'");
			while ($pricelist = mysql_fetch_array($price)) {
				$itemprice = $newquantity * $pricelist['i_price'];
                $item_id = $pricelist['i_id'];
                $item_name = $pricelist['i_name'];
                $itemPrice = $pricelist['i_price'];
            	$forput = $item_id."081093";
            	$forcall = $item_id+"11";
            	echo "<tr id = '".$i."' blinked='".$item_id."' class='iLoveCode' iLoveCode='".$priceThis."' sameprice='".$itemOriginal."'>
		            	<td><input class='asd search' type='text' value='".$newcontent."' name='itemname[]' forChange='".$item_id."' readonly></td>
		            	<td width='40%' class = 'centerthis'>
		            		<input type='button' value='-' class='qtyminus maxwell fa fa-minus' field='".$forcall."' count = '".$forput."' equal='".$itemPrice."' forChangeId = '".$i."'/>
		            		<input type='text' maxlength = '3' value='".$newquantity."' class='qty' name='itemquantity[]' id='".$forcall."' equal='".$itemPrice."' field='".$forcall."' count = '".$forput."' forChangeIdInput = '".$i."'>
		            		<input type='button' value='+' class='qtyplus maxwell fa fa-plus' field='".$forcall."' count = '".$forput."' equal='".$itemPrice."' forChangeId = '".$i."'/>
		            	</td>
                        <td class = 'centerthis'>
                            <span>₱</span><input class='asd' size='4' value = '".$itemPrice."' priceChange='".$item_id."' id='".$i."' readonly>
                        </td>
		            	<td class = 'centerthis' width='30%'>
		            		<span>₱</span><input class='thisisprice asd qty1' name='itemprice[]' value = '".$itemprice."' id='".$forput."' forPriceInput = '".$item_id."' readonly>
		            	</td>
		            	<td class = 'centerthis' width='30%'>
		            		<button type = 'button' priceTag='".$item_id."' searchfor = '".$item_id."'' id='".$i."' class = 'btn btn-success modalnow' data-toggle='modal' data-target='#myModal'><span class='fa fa-edit'></span></button>
		            		<button type = 'button' class = 'btn btn-danger deleteme'><span class='fa fa-trash-o'></span></button>
		            	</td>
            		  </tr>";
            		}
            	$i++;
            }
            
		}
        echo "</tr></tbody></table></div>";
        echo "<div class='col-lg-12' id = 'thisAddItem' style='padding-top:20px'>
                <div class = 'col-lg-6' align = 'left'>
                <button class='btn btn-success forAddNow' type = 'button' data-toggle='modal' data-target='#myModalAdd'><span class='fa fa-plus'></span> Add Item</button>
                </div>
              </div>
              <div class='col-lg-12'>
                <div class ='col-lg-6' align = 'right'>
                <label>Total Price:  ₱</label><input type='text' class='asd totalthisnow' name='totalamount' readonly value=''>
                </div>
              </div>";
        echo "</div>
            <div class='col-lg-12' align='center' align='center' style='padding-top:20px'>
                <button type = 'submit' class = 'btn btn-success proceed' name = 'proceed' id='en'><span class = 'fa fa-check-square-o'></span> Proceed</button>
            </form>
                <a class='btn btn-danger cancel'><span class='fa fa-remove'></span> Cancel</a>
            </div>";
        echo "</div>";
		} else if($_POST['nothing']) {
            echo '<form method="POST" action="review.php" id="review">';
            echo "<div class='row' style='padding:20px 0 20px 20px' style='position:inline'>";
            echo "<div class='col-lg-6'>";
            echo "<table width = '100%' id='packageTable' class='striped'>
                    <tbody>
                    <tr>
                        <th>Item Description</th>
                        <th class = 'centerthis'>Quantity</th>
                        <th>Price</th>
                        <th class = 'centerthis'>Total Amount</th>
                        <th class = 'centerthis'>Action</th>
                    </tr>
                    </tbody>
                   </table>";
            echo "</tr></tbody></table>";
            echo "<div class='col-lg-12' id = 'thisAddItem' style='padding-top:20px'>
                    <div class = 'col-lg-4' align = 'left'>
                    <button class='btn btn-success forAddNow' type = 'button' data-toggle='modal' data-target='#myModalAdd'><span class='fa fa-plus'></span> Add Item</button>
                    </div>
                    <div class ='col-lg-8' align = 'right'>
                    <span id='epalang'>Total Price:  ₱</span><input type='text' class='asd totalthisnow' name='totalamount' readonly value=''>
                    </div>
                </div>
                <div class='col-lg-12' align='center' align='center' style='padding-top:20px'>
                    <button type = 'submit' class = 'btn btn-success proceed' name = 'proceed' id='dis' disabled><span class = 'fa fa-check-square-o'></span> Proceed</button>
                </form>
                    <a class='btn btn-danger cancel'><span class='fa fa-remove'></span> Cancel</a>
                </div>";
            echo "</div>";
        }
		?>
		<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <br>
                    <div class="bs-example bs-example-tabs">
                        <ul id="myTab" class="nav nav-tabs">
                          <li class="active"><a href="#all" data-toggle="tab">All</a></li>
                          <li class=""><a href="#aandv" data-toggle="tab">Audio/Visuals</a></li>
                          <li class=""><a href="#chair" data-toggle="tab">Chair</a></li>
                          <li class=""><a href="#tables" data-toggle="tab">Tables</a></li>
                          <li class=""><a href="#clothing" data-toggle="tab">Clothing</a></li>
                          <li class=""><a href="#entertainment" data-toggle="tab">Entertainment</a></li>
                          <li class=""><a href="#utensils" data-toggle="tab">Utensils</a></li>
                          <li class=""><a href="#set" data-toggle="tab">Package Set</a></li>
                          <li class=""><a href="#others" data-toggle="tab">Others</a></li>
                        </ul>
                    </div>
                  <div class="modal-body modalitemheight scroll">
                    <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="all">
                        <form class="form-horizontal"> 
                        <fieldset>
                        <table width = '100%' id='myTable'>
                        	<tr>
                        		<th>Item name</th>
                        		<th class=''>Item Price</th>
                        		<th>Action</th>
                        	</tr>
                        <?php
                        $i = 0;
                        $qryitems = mysql_query("SELECT * FROM item_tbl ORDER BY i_name");
						while($selectedpackage = mysql_fetch_array($qryitems)){
							$itemname = $selectedpackage['i_name'];
							$itemprice = $selectedpackage['i_price'];
							$itemid = $selectedpackage['i_id'];
							echo "<tr>";
							echo 	"<td><input class='asd' type='text' value='".$itemname."' readonly></td>";
							echo 	"<td>₱".$itemprice."</td>";
							echo 	"<td><button class='btn-success btn forChangeContent' id='".$itemname."' idPrice = '".$itemprice."' forID='".$itemid."' type='button'>Select</button></td>";
							echo "</tr>";
							$i++;
						}
                        ?>
                        </table>
                        </fieldset>
                        </form>
                    </div>
                </div>
                  </div>
                  <div class="modal-footer">
                  <center>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </center>
                  </div>
                </div>
              </div>
            </div>










            <!--ANOTHER MODAL -->
            <div class="modal fade bs-modal-sm" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <br>
                    <div class="bs-example bs-example-tabs">
                        <ul id="myTab" class="nav nav-tabs">
                          <li class="active"><a href="#allitem" data-toggle="tab">All</a></li>
                          <li class=""><a href="#aandvitem" data-toggle="tab">Audio/Visuals</a></li>
                          <li class=""><a href="#chairitem" data-toggle="tab">Chair</a></li>
                          <li class=""><a href="#tablesitem" data-toggle="tab">Tables</a></li>
                          <li class=""><a href="#clothingitem" data-toggle="tab">Clothing</a></li>
                          <li class=""><a href="#entertainmentitem" data-toggle="tab">Entertainment</a></li>
                          <li class=""><a href="#utensilsitem" data-toggle="tab">Utensils</a></li>
                          <li class=""><a href="#setitem" data-toggle="tab">Package Set</a></li>
                          <li class=""><a href="#othersitem" data-toggle="tab">Others</a></li>
                        </ul>
                    </div>
                  <div class="modal-body modalitemheight scroll">
                    <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="allitem">
                        <form class="form-horizontal"> 
                        <fieldset>
                        <table width = '100%' id='myTable'>
                            <tr>
                                <th>Item name</th>
                                <th class=''>Item Price</th>
                                <th>Action</th>
                            </tr>
                        <?php
                        $i = 0;
                        $qryitems = mysql_query("SELECT * FROM item_tbl ORDER BY i_name");
                        while($selectedpackage = mysql_fetch_array($qryitems)){
                            //sample
                            //$item_id = $pricelist['i_id'];
                            //$item_name = $pricelist['i_name'];
                            //$itemPrice = $pricelist['i_price'];
                            //$forput = $itemprice+$item_id;
                            //$forcall = $item_id*$item_id;
                            $itemid = $selectedpackage['i_id'];
                            $itemname = $selectedpackage['i_name'];
                            $itemprice = $selectedpackage['i_price'];
                            $forCall = $itemid."081093";
                            $forPut = $itemid+"11";
                            echo "<tr>";
                            echo    "<td><input class='asd' type='text' value='".$itemname."' readonly></td>";
                            echo    "<td>₱".$itemprice."</td>";
                            echo    "<td><button class='btn-success btn forAddContent' forCount='".$forPut."' forField = '".$forCall."' id='".$itemname."' idPrice = '".$itemprice."' forID='".$itemid."' type='button'>Select</button></td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                        </table>
                        </fieldset>
                        </form>
                    </div>
                </div>
                  </div>
                  <div class="modal-footer">
                  <center>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </center>
                  </div>
                </div>
              </div>
            </div>
</body>
<script type="text/javascript" src="../../js/ajax.js"></script>
</html>