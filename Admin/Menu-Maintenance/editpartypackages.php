<!DOCTYPE html>
<?php 

include('../../connection.php');
session_start();
if(isset($_SESSION['u_id'])){
$u_id = $_SESSION['u_id'];
$qry = mysql_query("SELECT * FROM users_tbl where u_id = '$u_id'");
$result = $qry;
    while($qry = mysql_fetch_array($result)){
        $fname = $qry['u_fname'];
        $lname = $qry['u_lname'];
        $fname = ucwords($fname);
        $lname = ucwords($lname);
    }
}else{
    header('location:../../index.php');
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../favicon.ico">

    <title>Admin Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	 <link href="../../fonts/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">
	   <link rel="stylesheet" href="../css/styles.css">
   <script src="../js/jquery-latest.min.js" type="text/javascript"></script>
   <script src="../js/script.js"></script>

    <!-- Custom styles for this template -->
    <link href="../dashboard.css" rel="stylesheet">
    <script src="../js/dropdown.js"></script>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
    function logout() {
    var txt;
    var r = confirm("Are you sure you want to logout?");
    if (r == true) {
        location.href='../logout.php';
    }
    };
    </script>
    <style>
      .qty1 {
    
    width: 150px;
    height: 25px;
    text-align: left;
    }
    .centerthis{
      text-align: center;
    }
      .qty {
      width: 40px;
      height: 30px;
      text-align: center;
    }
    </style>
  </head>

  <body style = 'font-family:san;font-size:18px;'>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src = '../pic/logoliit.png' style = 'height:50px; width:260px; margin-top:-15px;'></a>
        </div>
        <div class="navbar-collapse collapse">
        <!-- Right nav -->
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a style = 'color:#fff;' href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><?php echo $fname."&nbsp".$lname; ?><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Profile</a></li>
                <li><a href="#">Messages</a></li>
                <li class="divider"></li>
                <li><a href="#" onclick = 'logout()'>Logout</a></li>
              </ul>
            </li>
          </ul>
    </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
	  <div class="col-sm-3 col-md-2 sidebar">
        <div id='cssmenu'>
			<ul>
			<li><a href='../index.php'><span>Home</span></a></li>
			<li class='has-sub'><a href='#'><span>User Accounts</span></a>
      <ul>
      <li><a href='../User-Accounts/admins.php'><span>Administrators</span></a></li>
      <li class = 'last'><a href='../User-Accounts/customers.php'><span>Customers</span></a></li>
      </ul>
      </li>
			<li class='has-sub'><a href='#'><span>Menu Maintenance</span></a>
			<ul>
			<li><a href='#'><span>Food Packages</span></a></li>
			<li><a href='#'><span>Party Packages</span></a></li>
      <li><a href='#'><span>Promo Packages</span></a></li>
			<li class='last'><a href='itempackages.php'><span>Items</span></a></li>
			</ul>
			</li>
			<li class='has-sub'><a href='#'><span>Reservations</span></a>
      <ul>
      <li><a href='#'><span>Pending Reservations</span></a></li>
      <li ><a href='#'><span>Approved Reservations</span></a></li>
      <li class='last'><a href='#'><span> Declined Reservations</span></a></li>
      </ul>
      </li>
			<li class='has-sub'><a href='#'><span>About</span></a>
			<ul>
			<li><a href='#'><span>Company</span></a></li>
			<li class='last'><a href='#'><span>Contact</span></a></li>
			</ul>
			</li>
			<li class='last'><a href='#'><span>Contact</span></a></li>
			</ul>
			</div>
		</div>	

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Menu Maintenance</h1>
          <div>
          <h2 class="sub-header">Edit Package</h2>
          </div>
          <?php
    if(isset($_GET['Edit'])){
        echo '<form method="POST" action="" id="review">';
        echo "<div class='row'>";
        echo "<div class='col-lg-12'>";
        echo "<table width = '100%' class='table-striped table-hover' id = 'packageTable'>
                <thead style='background-color:green;color:#fff;'>
                  <tr>
                    <th>Item Description</th>
                    <th>Item Price</th>
                    <th>Quantity</th>
                    <th width = '30%'>Total Amount</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <tr>";
    $packageid = $_GET['Edit'];
    $qryitems = mysql_query("SELECT * FROM packages_tbl where pk_id = '$packageid'");
    while($selectedpackage = mysql_fetch_array($qryitems)){
            $recommended = array();
            $recommended = explode(",",$selectedpackage['pk_suggest']);
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
                  <td>
                    <span>₱ </span><input class='asd' size='4' value = '".$itemPrice."' priceChange='".$item_id."' id='".$i."' readonly>
                  </td>
                  <td>
                    <input type='button' value='-' class='qtyminus maxwell fa fa-minus' field='".$forcall."' count = '".$forput."' equal='".$itemPrice."' forChangeId = '".$i."'/>
                    <input type='text' maxlength = '3' value='".$newquantity."' class='qty' name='itemquantity[]' id='".$forcall."' equal='".$itemPrice."' field='".$forcall."' count = '".$forput."' forChangeIdInput = '".$i."'>
                    <input type='button' value='+' class='qtyplus maxwell fa fa-plus' field='".$forcall."' count = '".$forput."' equal='".$itemPrice."' forChangeId = '".$i."'/>
                  </td>
                  <td>
                    <span>₱ </span>
                    <input class='thisisprice asd qty1' value = '".number_format($itemprice,2)."' id='".$forput."' forPriceInput = '".$item_id."' readonly>
                    <input class='thisisprice asd qty1 hide' name='itemprice[]' value = '".$itemprice."' id='".$forput."' forPriceInput = '".$item_id."' readonly>
                  </td>
                  <td>
                    <button type = 'button' priceTag='".$item_id."' searchfor = '".$item_id."'' id='".$i."' class = 'btn btn-success modalnow' data-toggle='modal' data-target='#myModal'><span class='fa fa-edit'></span></button>
                    <button type = 'button' class = 'btn btn-danger deleteme'><span class='fa fa-trash-o'></span></button>
                  </td>
                  </tr>";
                }
              $i++;
            }
            
        echo "</tr></tbody></table>";
        echo "<div class='col-lg-6'>
                <div class='col-lg-12'>
                <h2>Package Information</h2>
                  <div class='form-group'>
                    <label class='col-lg-4'>Original Price:</label>
                    <input class='' type='text' value='".$itemOriginal."'>
                  </div>
                  <div class='form-group'>
                    <label class='col-lg-4'>Web Price:</label>
                    <input type='text' value='".$priceThis."'>
                  </div>
                  <div class='form-group'>
                    <label class='col-lg-4'>Recommend this to:</label>";
                    foreach ($recommended as $key) {
                    echo "<select class='col-lg-5' name='event'>";
                    echo "<option>".$key."</option>";
                    $event = mysql_query("SELECT * FROM event_tbl");
                    while($eventview = mysql_fetch_array($event)){
                      echo "<option id = '".$eventview['e_id']."'>".$eventview['e_name']."</option>";
                    }
                    echo "</select>";
                    }
              echo "</div>";
        echo    "</div>
              </div>
              <div class='col-lg-12' align='center'>
                <button class='btn btn-success btn-lg' type='submit' name='changes'>Save</button>
              </div>";
        echo "</form>";
      }
    }
        ?>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type = 'text/javascript' src = '../js/numberformatting.js'></script>
    <script type = 'text/javascript' src = '../js/editajax.js'></script>
    <script src="../js/jquery-1.11.2.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../js/vendor/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
