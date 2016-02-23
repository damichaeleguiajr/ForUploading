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
    $date = $_SESSION['date'];
    $strttime = $_SESSION['strttime'];
    if(isset($_SESSION['guest'])){
        $guest = $_SESSION['guest'];
    }
    $r_id = $_SESSION['r_id'];
    $_SESSION['r_id'] = $r_id;
    $location = $_SESSION['location'];
    $address = $_SESSION['address'];
    $type = $_SESSION['type'];
    $_SESSION['type'] = $type;
    if(isset($_SESSION['motif'])){
        $motif = $_SESSION['motif'];
        $_SESSION['motif'] = $motif;
    } else if(isset($_SESSION['selectedpic'])){
        $selectedpic = $_SESSION['selectedpic'];
        $_SESSION =$selectedpic;
    }else{
        $uploadedpic = $_SESSION['uploadedpic'];
        $_SESSION['uploadedpic'] = $uploadedpic;
    }

}else{
    header('location:../index.php');
}
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EhKasiBata</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../fonts/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../fonts/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../css/heroic-features.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../css/tabs.css" />
    <link rel="stylesheet" type="text/css" href="../../css/tabstyles.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        function logout() {
            var txt;
            var r = confirm("Are you sure you want to logout?");
            if (r == true) {
                location.href='logout.php';
            }
        };
        window.addEventListener("beforeunload", function (e) {
            
            if (formSubmitting) {
            return undefined;
            }

            var confirmationMessage = 'It looks like you are not done yet. '
                                    + 'If you leave, your form will be lost.';

            (e || window.event).returnValue = confirmationMessage; //Gecko + IE
            return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
        });
    </script>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src = '../../images/logoliit.png'></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" style = 'font-size:18px;'>
                    <li>
                        <a href="index.php"><span class ='glyphicon glyphicon-home'></span>&nbsp&nbspHome</a>
                    </li>
                    <li>
                        <a href="About Us.php"><span class ='glyphicon glyphicon-user'></span>&nbsp&nbspAbout Us</a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class ='glyphicon glyphicon-th-list'></span>&nbsp&nbspProducts<span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu" style = 'font-size:20px;background-color:#eee;'>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Rates</a></li>
                        <li><a href="#">Packages</a></li>
                      </ul>
                    </li>
                    <li>
                        <a href="#"><span class ='glyphicon glyphicon-phone-alt'></span>&nbsp&nbspContact Us</a>
                    </li>
                    <li>
                        <a href="#"><span class ='glyphicon glyphicon-check'></span>&nbsp&nbspAvail Now</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right" style = 'font-size:20px;'>
                    <li class="dropdown">
                      <a style = 'color:#fff;' href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><?php echo $fname."&nbsp".$lname; ?><span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="myreservations.php">My Reservation</a></li>
                        <li><a href="#">Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#" onclick="logout()">Logout</a></li>
                      </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container jumbotron forbody">
    <br>
        <div class="col-lg-12 well1">
            <nav>
                <ol class="cd-multi-steps text-bottom count">
                    <li class="visited"><a href="#0" class="not-active">Information</a></li>
                    <li class="current"><em>Party Needs</em></li>
                    <li><em>Review</em></li>
                    <li><em>Billing</em></li>
                </ol>
            </nav>
            <hr>
            <div class='panel-header' align='center' style='padding-bottom: 30px;' id='tofocus'>
                <h3><span>STEP 2:</span>  Selecting Party Needs/Event Packages</h3>
            </div>
            <div class='col-lg-12 control-div' id='fullpage'>
<?php
if(isset($_POST['next'])){
	$i = 0;
	$budgetremaining = $_POST['budget'];
	$items = array();
	$items = $_POST['item'];
	$adult = $_POST['adult'];
	$guest = $_POST['guest'];
	if(!isset($_POST['kid'])){
		$kid = '1';
	} else {
		$kid = $_POST['kid'];
	}
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
	foreach($items as $key){
		$qry = mysql_query("SELECT * FROM item_tbl WHERE i_name ='$key'");
		while($pricelist = mysql_fetch_array($qry)){
			if($pricelist['i_name'] == 'Kiddy Table'){
				$person = $pricelist['i_person'];
				$newcontent = floor($kid/$person);
				$itemprice = $pricelist['i_price']*$newcontent;
			} else if($pricelist['i_name'] == 'Kiddy Chair'){
				$person = $pricelist['i_person'];
				$newcontent = floor($kid/$person);
				$itemprice = $pricelist['i_price']*$newcontent;
			} else if($pricelist['i_name'] == 'Adult Table'){
				$person = $pricelist['i_person'];
				$newcontent = floor($adult/$person);
				$itemprice = $pricelist['i_price']*$newcontent;
			} else if($pricelist['i_name'] == 'Adult Chair'){
				$person = $pricelist['i_person'];
				$newcontent = floor($adult/$person);
				$itemprice = $pricelist['i_price']*$newcontent;
			} else {
				if($pricelist['i_person'] == '0'){
					$person = '1';
					$newcontent = floor($guest/$person);
					$itemprice = $pricelist['i_price']*$newcontent;
				} else {
					$person = $pricelist['i_person'];
					$newcontent = floor($guest/$person);
					$itemprice = $pricelist['i_price']*$newcontent;
				}
			}
			$item_id = $pricelist['i_id'];
            $item_name = $pricelist['i_name'];
            $itemPrice = $pricelist['i_price'];
            $forput = $item_id."081093";
            $forcall = $item_id+"11";
			echo "<tr id = '".$i."' blinked='".$item_id."' class='iLoveCode'>
					<td><input class='asd search' type='text' style='width:100%' value='".$pricelist['i_name']."' name='itemname[]' forChange='".$item_id."' readonly></td>
                    <td class = 'centerthis'>
                    	<input type='button' value='-' class='qtyminus maxwell fa fa-minus' field='".$forcall."' count = '".$forput."' equal='".$itemPrice."' forChangeId = '".$i."'/>
                        <input type='text' maxlength = '3' value='".$newcontent."' class='qty' name='itemquantity[]' id='".$forcall."' equal='".$itemPrice."' field='".$forcall."' count = '".$forput."' forChangeIdInput = '".$i."' required>
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
                <div>
                    <span>Budget Remaining:</span> Php <input type='text' class='asd budgetremaining' value='".number_format($budgetremaining,2)."' readonly>
                </div>
                <hr>
                <div>
                    <span>Total Package Price:</span> Php <input type='text' class='asd totalthisnow' value='' readonly>
                    <input style='display:none' name='totalamount' value='' id='trueamount'>
                </div>
              </div>";
        echo "<div class='col-lg-12' style='padding-top:20px' align='center'>
                <button type='submit' class='btn btn-success btn-md' name='proceed'>Proceed</button>
                </form>
                <a class='btn btn-danger btn-md cancelcustomize'>Cancel</a>
              </div>";
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
            </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/numberformatting.js"></script>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/onclick.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery-ui.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/cbpFWTabs.js"></script>
    <script src="js/create.js"></script>
    <script>
            (function() {

                [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
                    new CBPFWTabs( el );
                });

            })();
    </script>
</body>

</html>