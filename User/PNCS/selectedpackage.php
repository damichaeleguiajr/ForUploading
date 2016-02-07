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
</head>
<body>
<table width = "100%" id='packageTable'>
	<tbody>
	<tr>
		<th>Item</th>
		<th>Quantity</th>
		<th class='centerthis'>Price</th>
		<th class='centerthis'>Action</th>
	</tr>
	<tr>
		<?php
		if(isset($_POST['packageid'])){
		$packageid = $_POST['packageid'];
		$qryitems = mysql_query("SELECT * FROM packages_tbl where pk_id = '$packageid'");
		while($selectedpackage = mysql_fetch_array($qryitems)){
			$i = 0;
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
            	$forput = $itemprice+$item_id;
            	$forcall = $item_id*$item_id;
            	echo "<tr id = '".$i."'>
		            	<td><input disabled class='asd search' type='text' value='".$newcontent."' name='itemname[]' forChange='".$item_id."'></td>
		            	<td>
		            		<input type='button' value='-' class='qtyminus maxwell' field='".$forcall."' count = '".$forput."' equal='".$itemPrice."' forChangeId = '".$i."'/>
		            		<input type='text' maxlength = '3' value='".$newquantity."' class='qty' name='itemquantity[]' id='".$forcall."' equal='".$itemPrice."' field='".$forcall."' count = '".$forput."' forChangeIdInput = '".$i."'>
		            		<input type='button' value='+' class='qtyplus maxwell' field='".$forcall."' count = '".$forput."' equal='".$itemPrice."' forChangeId = '".$i."'/>
		            	</td>
		            	<td class = 'centerthis'>
		            		<input class='thisisprice qty1 asd' name='itemprice[]' value = '₱".$itemprice."' id='".$forput."' forPriceInput = '".$item_id."' readonly disabled>
		            	</td>
		            	<td class = 'centerthis'>
		            		<button type = 'button' priceTag='".$item_id."' searchfor = '".$item_id."'' id='".$i."' class = 'btn btn-success modalnow' data-toggle='modal' data-target='#myModal'><span class='fa fa-edit'></span></button>
		            		<button type = 'button' class = 'btn btn-danger' onclick = '$(this).parent().parent().remove();'><span class='fa fa-trash-o'></span></button>
		            	</td>
            		  </tr>";
            		}
            	$i++;
            }
		}
		}
		?>
	</tr>
	</tbody>
</table>
<div class='col-lg-12' align='center'>
    
</div>
<div class='col-lg-12'>
    <button class='btn btn-success forAddNow' type = 'button' data-toggle='modal' data-target='#myModalAdd'>Add Item</button>
</div>
<div class='col-lg-12' align='right'>
<br>
<span>Total Price:  ₱</span><input type='text' class='asd totalthisnow' disabled>
</div>
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
							echo 	"<td><input class='asd' type='text' value='".$itemname."'></td>";
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
                    <div class="tab-pane fade" id="chair">
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
                        $qryitems = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'Chair'");
                        while($selectedpackage = mysql_fetch_array($qryitems)){
                            $itemname = $selectedpackage['i_name'];
                            $itemprice = $selectedpackage['i_price'];
                            $itemid = $selectedpackage['i_id'];
                            echo "<tr>";
                            echo    "<td><input class='asd' type='text' value='".$itemname."'></td>";
                            echo    "<td>₱".$itemprice."</td>";
                            echo    "<td><button class='btn-success btn forChangeContent' id='".$itemname."' idPrice = '".$itemprice."' forID='".$itemid."' type='button'>Select</button></td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                        </table>
                        </fieldset>
                        </form>
                  </div>
                    <div class="tab-pane fade" id="clothing">
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
                        $qryitems = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'Clothing'");
                        while($selectedpackage = mysql_fetch_array($qryitems)){
                            $itemname = $selectedpackage['i_name'];
                            $itemprice = $selectedpackage['i_price'];
                            $itemid = $selectedpackage['i_id'];
                            echo "<tr>";
                            echo    "<td><input class='asd' type='text' value='".$itemname."'></td>";
                            echo    "<td>₱".$itemprice."</td>";
                            echo    "<td><button class='btn-success btn forChangeContent' id='".$itemname."' idPrice = '".$itemprice."' forID='".$itemid."' type='button'>Select</button></td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                        </table>
                        </fieldset>
                        </form>
                  </div>
                  <div class="tab-pane fade" id="chair">
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
                        $qryitems = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'Chair'");
                        while($selectedpackage = mysql_fetch_array($qryitems)){
                            $itemname = $selectedpackage['i_name'];
                            $itemprice = $selectedpackage['i_price'];
                            $itemid = $selectedpackage['i_id'];
                            echo "<tr>";
                            echo    "<td><input class='asd' type='text' value='".$itemname."'></td>";
                            echo    "<td>₱".$itemprice."</td>";
                            echo    "<td><button class='btn-success btn forChangeContent' id='".$itemname."' idPrice = '".$itemprice."' forID='".$itemid."' type='button'>Select</button></td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                        </table>
                        </fieldset>
                        </form>
                  </div>
                  <div class="tab-pane fade" id="aandv">
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
                        $qryitems = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'AudioVisuals'");
                        while($selectedpackage = mysql_fetch_array($qryitems)){
                            $itemname = $selectedpackage['i_name'];
                            $itemprice = $selectedpackage['i_price'];
                            $itemid = $selectedpackage['i_id'];
                            echo "<tr>";
                            echo    "<td><input class='asd' type='text' value='".$itemname."'></td>";
                            echo    "<td>₱".$itemprice."</td>";
                            echo    "<td><button class='btn-success btn forChangeContent' id='".$itemname."' idPrice = '".$itemprice."' forID='".$itemid."' type='button'>Select</button></td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                        </table>
                        </fieldset>
                        </form>
                  </div>
                  <div class="tab-pane fade" id="tables">
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
                        $qryitems = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'Table'");
                        while($selectedpackage = mysql_fetch_array($qryitems)){
                            $itemname = $selectedpackage['i_name'];
                            $itemprice = $selectedpackage['i_price'];
                            $itemid = $selectedpackage['i_id'];
                            echo "<tr>";
                            echo    "<td><input class='asd' type='text' value='".$itemname."'></td>";
                            echo    "<td>₱".$itemprice."</td>";
                            echo    "<td><button class='btn-success btn forChangeContent' id='".$itemname."' idPrice = '".$itemprice."' forID='".$itemid."' type='button'>Select</button></td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                        </table>
                        </fieldset>
                        </form>
                  </div>
                  <div class="tab-pane fade" id="entertainment">
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
                        $qryitems = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'Entertainment'");
                        while($selectedpackage = mysql_fetch_array($qryitems)){
                            $itemname = $selectedpackage['i_name'];
                            $itemprice = $selectedpackage['i_price'];
                            $itemid = $selectedpackage['i_id'];
                            echo "<tr>";
                            echo    "<td><input class='asd' type='text' value='".$itemname."'></td>";
                            echo    "<td>₱".$itemprice."</td>";
                            echo    "<td><button class='btn-success btn forChangeContent' id='".$itemname."' idPrice = '".$itemprice."' forID='".$itemid."' type='button'>Select</button></td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                        </table>
                        </fieldset>
                        </form>
                  </div>
                  <div class="tab-pane fade" id="utensils">
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
                        $qryitems = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'Utensils'");
                        while($selectedpackage = mysql_fetch_array($qryitems)){
                            $itemname = $selectedpackage['i_name'];
                            $itemprice = $selectedpackage['i_price'];
                            $itemid = $selectedpackage['i_id'];
                            echo "<tr>";
                            echo    "<td><input class='asd' type='text' value='".$itemname."'></td>";
                            echo    "<td>₱".$itemprice."</td>";
                            echo    "<td><button class='btn-success btn forChangeContent' id='".$itemname."' idPrice = '".$itemprice."' forID='".$itemid."' type='button'>Select</button></td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                        </table>
                        </fieldset>
                        </form>
                  </div>
                  <div class="tab-pane fade" id="set">
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
                        $qryitems = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'Package Set'");
                        while($selectedpackage = mysql_fetch_array($qryitems)){
                            $itemname = $selectedpackage['i_name'];
                            $itemprice = $selectedpackage['i_price'];
                            $itemid = $selectedpackage['i_id'];
                            echo "<tr>";
                            echo    "<td><input class='asd' type='text' value='".$itemname."'></td>";
                            echo    "<td>₱".$itemprice."</td>";
                            echo    "<td><button class='btn-success btn forChangeContent' id='".$itemname."' idPrice = '".$itemprice."' forID='".$itemid."' type='button'>Select</button></td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                        </table>
                        </fieldset>
                        </form>
                  </div>
                  <div class="tab-pane fade" id="others">
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
                        $qryitems = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'Others'");
                        while($selectedpackage = mysql_fetch_array($qryitems)){
                            $itemname = $selectedpackage['i_name'];
                            $itemprice = $selectedpackage['i_price'];
                            $itemid = $selectedpackage['i_id'];
                            echo "<tr>";
                            echo    "<td><input class='asd' type='text' value='".$itemname."'></td>";
                            echo    "<td>₱".$itemprice."</td>";
                            echo    "<td><button class='btn-success btn forChangeContent' id='".$itemname."' idPrice = '".$itemprice."' forID='".$itemid."' type='button'>Select</button></td>";
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
                            $itemname = $selectedpackage['i_name'];
                            $itemprice = $selectedpackage['i_price'];
                            $itemid = $selectedpackage['i_id'];
                            $forCall = $itemid+$itemname;
                            $forPut = $itemprice+$itemid;
                            echo "<tr>";
                            echo    "<td><input class='asd' type='text' value='".$itemname."'></td>";
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
                    <div class="tab-pane fade" id="chairitem">
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
                        $qryitems = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'Chair'");
                        while($selectedpackage = mysql_fetch_array($qryitems)){
                            $itemname = $selectedpackage['i_name'];
                            $itemprice = $selectedpackage['i_price'];
                            $itemid = $selectedpackage['i_id'];
                            echo "<tr>";
                            echo    "<td><input class='asd' type='text' value='".$itemname."'></td>";
                            echo    "<td>₱".$itemprice."</td>";
                            echo    "<td><button class='btn-success btn forChangeContent' id='".$itemname."' idPrice = '".$itemprice."' forID='".$itemid."' type='button'>Select</button></td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                        </table>
                        </fieldset>
                        </form>
                  </div>
                    <div class="tab-pane fade" id="clothingitem">
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
                        $qryitems = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'Clothing'");
                        while($selectedpackage = mysql_fetch_array($qryitems)){
                            $itemname = $selectedpackage['i_name'];
                            $itemprice = $selectedpackage['i_price'];
                            $itemid = $selectedpackage['i_id'];
                            echo "<tr>";
                            echo    "<td><input class='asd' type='text' value='".$itemname."'></td>";
                            echo    "<td>₱".$itemprice."</td>";
                            echo    "<td><button class='btn-success btn forChangeContent' id='".$itemname."' idPrice = '".$itemprice."' forID='".$itemid."' type='button'>Select</button></td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                        </table>
                        </fieldset>
                        </form>
                  </div>
                  <div class="tab-pane fade" id="chairitem">
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
                        $qryitems = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'Chair'");
                        while($selectedpackage = mysql_fetch_array($qryitems)){
                            $itemname = $selectedpackage['i_name'];
                            $itemprice = $selectedpackage['i_price'];
                            $itemid = $selectedpackage['i_id'];
                            echo "<tr>";
                            echo    "<td><input class='asd' type='text' value='".$itemname."'></td>";
                            echo    "<td>₱".$itemprice."</td>";
                            echo    "<td><button class='btn-success btn forChangeContent' id='".$itemname."' idPrice = '".$itemprice."' forID='".$itemid."' type='button'>Select</button></td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                        </table>
                        </fieldset>
                        </form>
                  </div>
                  <div class="tab-pane fade" id="aandvitem">
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
                        $qryitems = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'AudioVisuals'");
                        while($selectedpackage = mysql_fetch_array($qryitems)){
                            $itemname = $selectedpackage['i_name'];
                            $itemprice = $selectedpackage['i_price'];
                            $itemid = $selectedpackage['i_id'];
                            echo "<tr>";
                            echo    "<td><input class='asd' type='text' value='".$itemname."'></td>";
                            echo    "<td>₱".$itemprice."</td>";
                            echo    "<td><button class='btn-success btn forChangeContent' id='".$itemname."' idPrice = '".$itemprice."' forID='".$itemid."' type='button'>Select</button></td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                        </table>
                        </fieldset>
                        </form>
                  </div>
                  <div class="tab-pane fade" id="tablesitem">
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
                        $qryitems = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'Table'");
                        while($selectedpackage = mysql_fetch_array($qryitems)){
                            $itemname = $selectedpackage['i_name'];
                            $itemprice = $selectedpackage['i_price'];
                            $itemid = $selectedpackage['i_id'];
                            echo "<tr>";
                            echo    "<td><input class='asd' type='text' value='".$itemname."'></td>";
                            echo    "<td>₱".$itemprice."</td>";
                            echo    "<td><button class='btn-success btn forChangeContent' id='".$itemname."' idPrice = '".$itemprice."' forID='".$itemid."' type='button'>Select</button></td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                        </table>
                        </fieldset>
                        </form>
                  </div>
                  <div class="tab-pane fade" id="entertainmentitem">
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
                        $qryitems = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'Entertainment'");
                        while($selectedpackage = mysql_fetch_array($qryitems)){
                            $itemname = $selectedpackage['i_name'];
                            $itemprice = $selectedpackage['i_price'];
                            $itemid = $selectedpackage['i_id'];
                            echo "<tr>";
                            echo    "<td><input class='asd' type='text' value='".$itemname."'></td>";
                            echo    "<td>₱".$itemprice."</td>";
                            echo    "<td><button class='btn-success btn forChangeContent' id='".$itemname."' idPrice = '".$itemprice."' forID='".$itemid."' type='button'>Select</button></td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                        </table>
                        </fieldset>
                        </form>
                  </div>
                  <div class="tab-pane fade" id="utensilsitem">
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
                        $qryitems = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'Utensils'");
                        while($selectedpackage = mysql_fetch_array($qryitems)){
                            $itemname = $selectedpackage['i_name'];
                            $itemprice = $selectedpackage['i_price'];
                            $itemid = $selectedpackage['i_id'];
                            echo "<tr>";
                            echo    "<td><input class='asd' type='text' value='".$itemname."'></td>";
                            echo    "<td>₱".$itemprice."</td>";
                            echo    "<td><button class='btn-success btn forChangeContent' id='".$itemname."' idPrice = '".$itemprice."' forID='".$itemid."' type='button'>Select</button></td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                        </table>
                        </fieldset>
                        </form>
                  </div>
                  <div class="tab-pane fade" id="setitem">
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
                        $qryitems = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'Package Set'");
                        while($selectedpackage = mysql_fetch_array($qryitems)){
                            $itemname = $selectedpackage['i_name'];
                            $itemprice = $selectedpackage['i_price'];
                            $itemid = $selectedpackage['i_id'];
                            echo "<tr>";
                            echo    "<td><input class='asd' type='text' value='".$itemname."'></td>";
                            echo    "<td>₱".$itemprice."</td>";
                            echo    "<td><button class='btn-success btn forChangeContent' id='".$itemname."' idPrice = '".$itemprice."' forID='".$itemid."' type='button'>Select</button></td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                        </table>
                        </fieldset>
                        </form>
                  </div>
                  <div class="tab-pane fade" id="othersitem">
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
                        $qryitems = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'Others'");
                        while($selectedpackage = mysql_fetch_array($qryitems)){
                            $itemname = $selectedpackage['i_name'];
                            $itemprice = $selectedpackage['i_price'];
                            $itemid = $selectedpackage['i_id'];
                            echo "<tr>";
                            echo    "<td><input class='asd' type='text' value='".$itemname."'></td>";
                            echo    "<td>₱".$itemprice."</td>";
                            echo    "<td><button class='btn-success btn forChangeContent' id='".$itemname."' idPrice = '".$itemprice."' forID='".$itemid."' type='button'>Select</button></td>";
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