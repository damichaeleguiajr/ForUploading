<html>
<body>
<div class='col-lg-12' align='center' style="background-color:#f0f0f0 ">
    <h2>Selected Package</h2>
</div>
<div class='col-lg-12 note-background'>
    <div class='' style='color:#fff'>
        <h3>Note:</h3>
        <h4>Customizing Package</h4>
        <p style='font-size: 15px;margin-top: -10px;margin-left: 10px;'>Upon customizing this package, 5% discount for the total package price will be removed and 5% discount for the individual item will take effect only if minimum item quantity is 30pcs and up.</p>
    </div>
</div>
<div>
<?php
include('../../connection.php');
if(isset($_POST['packageid'])){
    $budget = $_POST['budget'];
    echo "<form method ='POST' action='review.php'>";
    echo "<table class='table-striped striped' width='100%'>
            <tr>
                <th>Item Description</th>
                <th>Quantity</th>
                <th>Item Cost</th>
                <th>Price</th>
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
                        <td width='45%'><input class='asd search' type='text' value='".$newcontent."' name='itemname[]' readonly style='width:100%'></td>
                        <td width='15%'>
                            <input type='text' style='width:100%;text-align:left' value='".$newquantity."' class='qty asd' name='itemquantity[]' readonly>
                        </td>
                        <td width='20%'>
                            <span>₱</span><input class='asd' size='4' value = '".$itemPrice."' readonly>
                        </td>
                        <td width='20%'>
                            <span>₱</span><input class='thisisprice asd' style='width:30%' name='itemprice[]' value = '".$itemprice."' readonly>
                        </td>
                      </tr>";
                    }
                $i++;
            }
            
        }
        echo "</table>
              <div class='col-lg-12' align='right' style='margin-left:45px;margin-top:20px;'>
                <div>
                    <span>Original Price:</span> Php <input type='text' class='asd' value='".number_format($itemOriginal,2)."' readonly>
                </div>
                <div style='margin-right:10px'>
                    <span class = 'fa fa-check' style='color:green'>5% Discount</span>
                </div>
                <hr>
                <div>
                    <span>Budget:</span> Php <input type='text' class='asd' value='".number_format($budget,2)."' readonly>
                </div>
                <div>
                    <span>Total Package Price:</span> Php <input type='text' class='asd' value='".number_format($priceThis,2)."' readonly>
                    <input style='display:none' name='totalamount' value='".$priceThis."'>
                </div>
                <div>
                    <span>Remaining Budget:</span> Php <input type='text' class='asd' value='".number_format($budget-$priceThis,2)."' readonly>
                </div>
              </div>";
        echo "<div class='col-lg-12' style='padding-top:20px' align='center'>
                <button type='submit' class='btn btn-success btn-md' name='proceed'>Select this package and proceed</button>
                </form>
                <a class='btn btn-primary btn-md customizewithbudget' id='".$packageid."' budget='".$budget."'>Customize this package</a>
                <a class='btn btn-danger btn-md cancelselectbudget'>Cancel</a>
              </div>";
}
?>
</div>
<script src="packageselect.js"></script>
</body>
</html>