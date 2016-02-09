<!DOCTYPE html>
<?php 

include('../../connection.php');
session_start();
if(isset($_POST['Proceed'])){
    function itexmo($number,$message,$apicode){
      $ch = curl_init();
      $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
      curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
      curl_setopt($ch, CURLOPT_POST, 1);
       curl_setopt($ch, CURLOPT_POSTFIELDS, 
                http_build_query($itexmo));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      return curl_exec ($ch);
      curl_close ($ch);
      }
    if(isset($_POST['motif'])){
        $motif = array();
        $motif = $_POST['motif'];
        $motif = implode(",",$motif);
        $u_id = $_SESSION['u_id'];
        $contactname = $_POST['contactname'];
        $contactnumber = $_POST['contactnumber'];
        $contactemail = $_POST['contactemail'];
        $type = $_POST['eventtype'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $location = $_POST['location'];
        $address = $_POST['address'];
        $nameofitem = $_POST['nameofitem'];
        $nameofitem = implode(",",$nameofitem);
        $quanofitem = $_POST['quanofitem'];
        $quanofitem = implode(",",$quanofitem);
        $shipfee = $_POST['shipfee'];
        $addfee = $_POST['addfee'];
        $totalamount = $_POST['totalamount'];
        $downpayment = $_POST['downpayment'];
        $cashdeliver = $_POST['cashdeliver'];
        $todaysDate = date("m/d/Y");
        $status = '0';
        $pay = '0';
        $r_id = $_SESSION['r_id'];
        $qry = mysql_query("INSERT INTO reservation_tbl(r_id,r_user,r_type,r_motif,r_date,r_time,r_location,r_address,r_nameofitem,r_quanofitem,
                        r_shipfee,r_addfee,r_totalamount,r_downpayment,r_cashdeliver,r_person,r_person_email,r_person_contact,r_status,r_submit,r_pay)
                        VALUES ('$r_id','$u_id','$type','$motif','$date','$time','$location','$address','$nameofitem','$quanofitem','$shipfee','$addfee','$totalamount','$downpayment','$cashdeliver','$contactname','$contactemail','$contactnumber','$status','$todaysDate','$pay')");

        if($qry){
            $script = "<script language=javascript>alert(\"Request Sent. Please wait 6hrs-12hrs to confirm your request. A text message will be send to you by the Administrator before you proceed to Billing. Thank You\");</script>";
            echo $script;
            $sms = itexmo("09357991114","1 Reservation request from ".$contactname,"09357991114QMURDYYP");
            echo $sms;
            $page = "<script language=javascript>location.href='billing.php'</script>";
            echo $page;
        }
    }
    else if(isset($_POST['selectedpic'])){
        $selectedpic = $_POST['selectedpic'];
        $u_id = $_SESSION['u_id'];
        $contactname = $_POST['contactname'];
        $contactnumber = $_POST['contactnumber'];
        $contactemail = $_POST['contactemail'];
        $type = $_POST['eventtype'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $location = $_POST['location'];
        $address = $_POST['address'];
        $nameofitem = $_POST['nameofitem'];
        $nameofitem = implode(",",$nameofitem);
        $quanofitem = $_POST['quanofitem'];
        $quanofitem = implode(",",$quanofitem);
        $shipfee = $_POST['shipfee'];
        $addfee = $_POST['addfee'];
        $totalamount = $_POST['totalamount'];
        $downpayment = $_POST['downpayment'];
        $cashdeliver = $_POST['cashdeliver'];
        $todaysDate = date("m/d/Y");
        $status = '0';
        $pay = '0';
        $r_id = $_SESSION['r_id'];
        $qry = mysql_query("INSERT INTO reservation_tbl(r_id,r_user,r_type,r_selectedpic,r_date,r_time,r_location,r_address,r_nameofitem,r_quanofitem,
                        r_shipfee,r_addfee,r_totalamount,r_downpayment,r_cashdeliver,r_person,r_person_email,r_person_contact,r_status,r_submit,r_pay)
                        VALUES ('$r_id','$u_id','$type','$selectedpic','$date','$time','$location','$address','$nameofitem','$quanofitem','$shipfee','$addfee','$totalamount','$downpayment','$cashdeliver','$contactname','$contactemail','$contactnumber','$status','$todaysDate','$pay')");

        if($qry){
            $script = "<script language=javascript>alert(\"Request Sent. Please wait 6hrs-12hrs to confirm your request. A text message will be send to you by the Administrator before you proceed to Billing. Thank You\");</script>";
            echo $script;
            $sms = itexmo("09357991114","1 Reservation request from ".$contactname,"09357991114QMURDYYP");
            echo $sms;
            $page = "<script language=javascript>location.href='billing.php'</script>";
            echo $page;
        }
    }
    else if(isset($_POST['uploadedpic'])){
        $uploadedpic = $_POST['uploadedpic'];
        $u_id = $_SESSION['u_id'];
        $contactname = $_POST['contactname'];
        $contactnumber = $_POST['contactnumber'];
        $contactemail = $_POST['contactemail'];
        $type = $_POST['eventtype'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $location = $_POST['location'];
        $address = $_POST['address'];
        $nameofitem = $_POST['nameofitem'];
        $nameofitem = implode(",",$nameofitem);
        $quanofitem = $_POST['quanofitem'];
        $quanofitem = implode(",",$quanofitem);
        $shipfee = $_POST['shipfee'];
        $addfee = $_POST['addfee'];
        $totalamount = $_POST['totalamount'];
        $downpayment = $_POST['downpayment'];
        $cashdeliver = $_POST['cashdeliver'];
        $todaysDate = date("m/d/Y");
        $r_id = $u_id;
        $status = '0';
        $pay = '0';
        $r_id = $_SESSION['r_id'];
        $qry = mysql_query("INSERT INTO reservation_tbl(r_id,r_user,r_type,r_uploadedpic,r_date,r_time,r_location,r_address,r_nameofitem,r_quanofitem,
                        r_shipfee,r_addfee,r_totalamount,r_downpayment,r_cashdeliver,r_person,r_person_email,r_person_contact,r_status,r_submit,r_pay)
                        VALUES ('$r_id','$u_id','$type','$uploadedpic','$date','$time','$location','$address','$nameofitem','$quanofitem','$shipfee','$addfee','$totalamount','$downpayment','$cashdeliver','$contactname','$contactemail','$contactnumber','$status','$todaysDate','$pay')");

        if($qry){
            $script = "<script language=javascript>alert(\"Request Sent. Please wait 6hrs-12hrs to confirm your request. A text message will be send to you by the Administrator before you proceed to Billing. Thank You\");</script>";
            echo $script;
            $sms = itexmo("09357991114","1 Reservation request from ".$contactname,"09357991114QMURDYYP");
            echo $sms;
            $page = "<script language=javascript>location.href='billing.php'</script>";
            echo $page;
        }
    }
}
if(isset($_SESSION['u_id'])){
$u_id = $_SESSION['u_id'];
$qry = mysql_query("SELECT * FROM users_tbl where u_id = '$u_id'");
$result = $qry;
    while($qry = mysql_fetch_array($result)){
        $fname = $qry['u_fname'];
        $lname = $qry['u_lname'];
        $fname = ucwords($fname);
        $lname = ucwords($lname);
        $mnumber = $qry['mnumber'];
        $email = $qry['u_email'];
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
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EhKasiBata</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='../../css/style.css' />
    <link rel='stylesheet' type='text/css' href='../../css/print.css' media="print" />
    <!-- Custom CSS -->
    <link href="../../css/heroic-features.css" rel="stylesheet">

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
                location.href='../logout.php';
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
    <style>
    tr .forselectpack{
        height:100px;
    }
    </style>
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
                        <a href="../index.php"><span class ='glyphicon glyphicon-home'></span>&nbsp&nbspHome</a>
                    </li>
                    <li>
                        <a href="../About Us.php"><span class ='glyphicon glyphicon-user'></span>&nbsp&nbspAbout Us</a>
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
                        <li><a href="#">My Reservation</a></li>
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
                    <li class="visited"><a href="#0" class="not-active">Party Needs</a></li>
                    <li class="current"><em>Review</em></li>
                    <li><em>Billing</em></li>
                </ol>
            </nav>
            <hr>
            <div class='col-lg-12'>
            <div class='col-lg-7'>
            <form method='POST' action='review.php'>
            <table width ='100%' id='meta'>
                <tbody>
                    <tr>
                        <td class='meta-head1' colspan="2">Contact Information</td>
                    </tr>
                    <tr>
                        <td class='meta-head'><label>Contact Person:</label></td>
                        <td><input type='text' class='asd' name='contactname' value='<?php echo $fname." ".$lname; ?>' readonly></td>
                    </tr>
                    <tr>
                        <td class='meta-head'><label>Contact Number:</label></td>
                        <td><input type='text' class='asd' name='contactnumber' value='<?php echo $mnumber; ?>' readonly></td>
                    </tr>
                    <tr>
                        <td class='meta-head' width='30%'><label>Email Address:</label></td>
                        <td><input size='40' type='text' class='asd' name='contactemail' value='<?php echo $email; ?>' readonly></td>
                    </tr>
                </tbody>
            </table>
            <table width ='100%' id='meta'>
                <tbody>
                    <tr>
                        <td class='meta-head1' colspan="2">Event Information</td>
                    </tr>
                    <?php
                    if(isset($_SESSION['type'])){
                        $type = $_SESSION['type'];
                        echo "<tr>
                            <td class='meta-head' width='30%'><label>Type of event:</label></td>
                            <td><input size='40' type='text' class='asd' name='eventtype' value='".$type."' readonly></td>
                        </tr>";
                    }
                    if(isset($_SESSION['motif'])){
                        $motif = array();
                        $motif = implode(",",$_SESSION['motif']);
                        echo "<tr>
                            <td class='meta-head'><label>Motif Color/s:</label></td>
                            <td><input type='text' size='40' class='asd' name='motif[]' value='";
                            echo $motif;
                            echo "' readonly></td>";
                        echo "</tr>";
                    }else if(isset($_SESSION['selectedpic'])){
                        $selectedpic = $_SESSION['selectedpic'];
                        echo "<tr>
                            <td class='meta-head'><label>Party Theme:</label></td>
                            <td class='hide'><input type='text' class='hide' name='selectedpic' value='".$selectedpic."'></td>
                            <td align='left'><img src='../".$selectedpic."' class='uploadedpic'></td>
                        </tr>";
                    }else{
                        $uploadedpic = $_SESSION['uploadedpic'];
                        echo "<tr>
                            <td class='meta-head'><label>Party Theme</label></td>
                            <td class='hide'><input type='text' class='hide' name='uploadedpic' value='".$uploadedpic."'></td>
                            <td><img src='../".$uploadedpic."' class='uploadedpic'></td>
                        </tr>";
                    }
                    if(isset($_SESSION['date'])){
                        $date = $_SESSION['date'];
                        echo "<tr>
                            <td class='meta-head'><label>Date of event:</label></td>
                            <td><input type='text' class='asd' name='date' value='".date('F j, Y', strtotime($date))."' readonly></td>
                        </tr>";
                    }
                    if(isset($_SESSION['strttime'])){
                        $strttime = $_SESSION['strttime'];
                        echo "<tr>
                            <td class='meta-head'><label>Time of event:</label></td>
                            <td><input type='text' class='asd' name='time' value='".date('h:i A', strtotime($strttime))."' readonly></td>
                        </tr>";
                    }
                    if(isset($_SESSION['location'])){
                        $location = $_SESSION['location'];
                        echo "<tr>
                            <td class='meta-head'><label>Location:</label></td>
                            <td><input type='text' class='asd' name='location' value='".$location."' readonly></td>
                        </tr>";
                    }
                    if(isset($_SESSION['address'])){
                        $address = $_SESSION['address'];
                        echo "<tr>
                            <td class='meta-head'><label>Venue Address:</label></td>
                            <td><input type='text' class='asd' name='address' value='".$address."' readonly></td>
                        </tr>";
                    }
                    ?>
                    
                </tbody>
            </table>
            </div>
            <div class='col-lg-5'>
              	<?php
				if(isset($_POST['proceed'])){
					$itemname = array();
					$itemname = $_POST['itemname'];
					$itemquantity = array();
					$itemquantity = $_POST['itemquantity'];
					$totalamount = $_POST['totalamount'];
                    $downpayment = (50/100)*$totalamount;
                    $cashdeliver = $totalamount-$downpayment;
					echo "<table width='100%' id='meta'>";
					echo "<tbody>";
                    echo "<tr>
                            <td class='meta-head1' colspan='2'>Party Needs</td>
                          </tr>";
					echo "<tr>";
						echo "<td class='meta-head'>Item Description</td>";
						echo "<td class='meta-head'>Quantity</td>";
					echo "</tr>";
					foreach(array_combine($itemname,$itemquantity) as $nameofitem => $quanofitem){
						echo "<tr>";
						echo "<td><input type='text' class='asd' name='nameofitem[]' value='".$nameofitem."' readonly></td>";
						echo "<td><input type='text' class='asd' name='quanofitem[]' value='".$quanofitem."' readonly></td>";
						echo "</tr>";
					}
					echo "</tbody>";
					echo "</table>";
				}
				?>
              </div>
              <div class='col-lg-7'>
                    <table width='100%' id='meta'>
                        <tbody>
                            <tr>
                                <td class='meta-head1' colspan="2">Summary</td>
                            </tr>
                            <tr>
                                <td class='meta-head' width='30%'><label>Shipping Fee</label></td>
                                <td align="right"><span><input type='text' class='asd' value='Free' name='shipfee' readonly></span></td>
                            </tr>
                            <tr>
                                <td class='meta-head'><label>Addtional Fee</label></td>
                                <td align='right'><span><input type='text' class='asd' value='None' name='addfee' readonly></span></td>
                            </tr>
                            <tr>
                                <td class='meta-head'><label>Subtotal</label></td>
                                <td align='right'><span>₱</span><input type='text' class='asd' value='<?php echo number_format($totalamount,2); ?>' name='totalamount' readonly></td>
                            </tr>
                            <tr>
                                <td class='meta-head'><label>Total</label></td>
                                <td align='right'><span>₱</span><input type='text' class='asd' value='<?php echo number_format($totalamount,2); ?>' readonly></td>
                            </tr>
                            <tr>
                                <td class='meta-head'><label>Downpayment(50%)</label></td>
                                <td align='right'><span>₱</span><input type='text' class='asd' value='<?php echo number_format($downpayment,2); ?>' name='downpayment' readonly></td>
                            </tr>
                            <tr>
                                <td class='meta-head'><label>Cash on delivery(50%)</label></td>
                                <td align='right'><span>₱</span><input type='text' class='asd' value='<?php echo number_format($cashdeliver,2); ?>' name='cashdeliver' readonly></td>
                            </tr>
                        </tbody>
                    </table></div>
              <div class = 'col-lg-12' style='padding-bottom:10px;padding-top:10px' align="center">
                <input class='btn proceed-request' type='submit' name='Proceed' value='Proceed' style="font-size:30px">
              </form>
              </div>
              </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../../js/jquery.js"></script>
    <script src="../../js/onclick.js"></script>
    <script type="text/javascript" src="../../js/ajax.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>

</body>

</html>

