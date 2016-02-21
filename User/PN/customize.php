<html>
<body>
<div class='col-lg-12' align='center' style="background-color:#f0f0f0 ">
    <h2>Customize Package</h2>
</div>
<div class='col-lg-12 note-background'>
    <div class='' style='color:#fff'>
        <h3>Note:</h3>
        <h4>Customizing Package</h4>
        <p style='font-size: 15px;margin-top: -10px;margin-left: 10px;'>5% Discount will take effect for each item only if the minimum quantity is 30pcs and up.</p>
        <p style='font-size: 15px;margin-top: -10px;margin-left: 10px;'>* A check will be shown if discount is active.</p>
    </div>
</div>
<?php
include('../../connection.php');
if(isset($_POST['packageid'])){
    echo "<form method='POST' action='review.php'>";
    echo "<table class='table-striped striped' width='100%' id='packageTable'>
            <tbody>
                <tr>
                    <th width='20%'>Item Description</th>
                    <th width='15%' class = 'centerthis'>Quantity</th>
                    <th width='20%'>Item Cost</th>
                    <th width='10%'>Discount</th>
                    <th width='20%' class='centerthis'>Total Item Price</th>
                    <th class = 'centerthis'>Action</th>
                </tr>";
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
                        <td><input class='asd search' type='text' style='width:100%' value='".$newcontent."' name='itemname[]' forChange='".$item_id."' readonly></td>
                        <td class = 'centerthis'>
                            <input type='button' value='-' class='qtyminus maxwell fa fa-minus' field='".$forcall."' count = '".$forput."' equal='".$itemPrice."' forChangeId = '".$i."'/>
                            <input type='text' maxlength = '3' value='".$newquantity."' class='qty' name='itemquantity[]' id='".$forcall."' equal='".$itemPrice."' field='".$forcall."' count = '".$forput."' forChangeIdInput = '".$i."' required>
                            <input type='button' value='+' class='qtyplus maxwell fa fa-plus' field='".$forcall."' count = '".$forput."' equal='".$itemPrice."' forChangeId = '".$i."'/>
                        </td>
                        <td>
                            <span>₱</span><input class='asd' size='4' style='width:50%;display:inline-block' value = '".$itemPrice."' priceChange='".$item_id."' id='".$i."' readonly>
                        </td>
                        <td>
                            <span class = 'fa fa-check' style='display:none;color:green' count='".$forput."'>  5%</span>
                            <span display='".$forput."' style='color:red'><i>NONE</i></span>
                        </td>
                        <td class='centerthis'>
                            <span color='".$forput."'>₱<input class='thisisprice asd qty1' name='itemprice[]' value = '".$itemprice."' id='".$forput."' forPriceInput = '".$item_id."' readonly></span>
                        </td>
                        <td class = 'centerthis'>
                            <button type = 'button' priceTag='".$item_id."' changingfield='".$forcall."' searchfor = '".$item_id."'' colordisplay='".$forput."' id='".$i."' class = 'btn btn-success modalnow' data-toggle='modal' data-target='#myModal'><span class='fa fa-edit'></span></button>
                            <button type = 'button' class = 'btn btn-danger deleteme'><span class='fa fa-trash-o'></span></button>
                        </td>
                      </tr>";
                    }
                $i++;
            }
            
        }
        echo "</tbody>";
        echo "</table>
              <div class = 'col-lg-12' align = 'left' style='padding-top:20px'>
                <button class='btn btn-success btn-lg forAddNow' type = 'button' data-toggle='modal' data-target='#myModalAdd'><span class='fa fa-plus-square'></span> Add Item</button>
              </div>
              <div class='col-lg-12' align='right' style='margin-left:45px;margin-top:20px;'>
                <hr>
                <div>
                    <span>Total Package Price:</span> Php <input type='text' name='totalamount' class='asd totalthisnow' value='".number_format($itemOriginal,2)."' readonly>
                </div>
              </div>";
        echo "<div class='col-lg-12' style='padding-top:20px' align='center'>
                <button type='submit' class='btn btn-success btn-md' name='proceed'>Proceed</button>
                </form>
                <a class='btn btn-danger btn-md cancelcustomize'>Cancel</a>
              </div>";
}
?>
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
                                <th></th>
                            </tr>
                                <?php
                                $i = 0;
                                $qryitems = mysql_query("SELECT * FROM item_tbl ORDER BY i_name");
                                while($selectedpackage = mysql_fetch_array($qryitems)){
                                    $itemid = $selectedpackage['i_id'];
                                    $itemname = $selectedpackage['i_name'];
                                    $itemprice = $selectedpackage['i_price'];
                                    $forCall = $itemid."081093";
                                    $forPut = $itemid+"11";
                                    echo "<tr tableadding_id='".$itemid."'>";
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
                            $forCall = $itemid."081093";
                            $forPut = $itemid+"11";
                            echo "<tr>";
                            echo    "<td><input class='asd' type='text' value='".$itemname."' readonly></td>";
                            echo    "<td>₱".$itemprice."</td>";
                            echo    "<td><button class='btn-success btn forChangeContent' forCount='".$forPut."' colordisplay='".$forCall."' id='".$itemname."' idPrice = '".$itemprice."' forID='".$itemid."' type='button'>Select</button></td>";
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
<script src="numberformatting.js"></script>
<script src="packageselect.js"></script>

</body>
</html>