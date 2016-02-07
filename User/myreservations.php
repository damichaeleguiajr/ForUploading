<!DOCTYPE html>
<?php 

include('../connection.php');
session_start();
if(isset($_POST['paynow'])){
    $u_id = $_SESSION['u_id'];
    $reference = $_POST['reference'];
    $amountpayed = $_POST['amountpayed'];
    $payment = mysql_query("UPDATE reservation_tbl SET r_pay=1 WHERE r_user='$u_id'");
    $qry = mysql_query("INSERT INTO payed_customer_tbl(py_user,py_referrence,py_ammount) VALUES('$u_id','$reference','$amountpayed')");
    if($qry && $payment){
        $alert= "<script language=javascript>
            alert(\"Done! Thank You for choosing Eh Kasi Bata Rentals and Party Needs.\");</script>";
        echo $alert;
        $locationpage = "<script language=javascript>location.href='../index.php'</script>"; 
            echo $locationpage;
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
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../fonts/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/heroic-features.css" rel="stylesheet">

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
                <a class="navbar-brand" href="index.php"><img src = '../images/logoliit.png'></a>
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
                        <a href="avail.php"><span class ='glyphicon glyphicon-check'></span>&nbsp&nbspAvail Now</a>
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
                <div class='col-lg-12' align="center">
                    <div align='left'>
                        <h2><i>My Reservations</i></h2>
                    </div>
                    <hr>
                </div>
                <div class='col-lg-12'>
                    <?php
                        //Pending
                        $reservations = mysql_query("SELECT * FROM reservation_tbl WHERE r_user='$u_id'");
                        $count = mysql_num_rows($reservations);
                        if($count > 0){
                            $pendingreservation = mysql_query("SELECT * FROM reservation_tbl WHERE r_user='$u_id' AND r_status=0");
                            $countpending = mysql_num_rows($pendingreservation);
                            if($countpending > 0){
                            echo "<div class='panel panel-default'>
                                    <div class='panel-heading' align='center'>
                                        <h2 class='panel-title'><b><i>Pending Reservations</i></b></h2>
                                    </div>
                                    <div class='panel-body'>
                                        <div class='table-responsive'>
                                            <table class='table table-bordered table-hover table-striped'>
                                                <thead>
                                                    <tr>
                                                        <td>Reservation #</td>
                                                        <td>Event</td>
                                                        <td>Time of Event</td>
                                                        <td>Date of Event</td>
                                                        <td>Total Amount</td>
                                                        <td>Required Downpayment(50%)</td>
                                                        <td>Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody>";
                                                while($p_reservation=mysql_fetch_array($pendingreservation)){
                                                    echo "<tr>
                                                            <td>".$p_reservation['r_id']."</td>
                                                            <td>".$p_reservation['r_type']."</td>
                                                            <td>".$p_reservation['r_time']."</td>
                                                            <td>".date('F j, Y', strtotime($p_reservation['r_date']))."</td>
                                                            <td>".$p_reservation['r_totalamount']."</td>
                                                            <td>".$p_reservation['r_downpayment']."</td>
                                                            <td>
                                                                <a href='MyReservations/myreservations.php?pending=".$p_reservation['r_id']."'><button type = 'button' class = 'btn btn-default' id=''><span class='fa fa-eye'></span></button></a>
                                                                <button type = 'button' class = 'btn btn-danger rejectit' id='".$p_reservation['r_id']."' forthis='decline'><span class='fa fa-close'></span></button>
                                                            </td>
                                                          </tr>";
                                                }
                            echo                "</tbody>
                                            </table>
                                        </div>
                                    </div>
                                 </div>";
                            }
                                 //Approved
                            $approvereservation = mysql_query("SELECT * FROM reservation_tbl WHERE r_user='$u_id' AND r_status=1 AND r_pay=0");
                            $countapprove = mysql_num_rows($approvereservation);
                            if($countapprove>0){
                            echo "<div class='panel panel-default'>
                                    <div class='panel-heading' align='center'>
                                        <h2 class='panel-title'><b><i>Approved Reservations</i></b></h2>
                                    </div>
                                    <div class='panel-body'>
                                        <div class='table-responsive'>
                                            <table class='table table-bordered table-hover table-striped'>
                                                <thead>
                                                    <tr>
                                                        <td>Reservation #</td>
                                                        <td>Event</td>
                                                        <td>Time of Event</td>
                                                        <td>Date of Event</td>
                                                        <td>Total Amount</td>
                                                        <td>Required Downpayment(50%)</td>
                                                        <td>Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody>";
                                                while($p_reservation=mysql_fetch_array($approvereservation)){
                                                    echo "<tr>
                                                            <td>".$p_reservation['r_id']."</td>
                                                            <td>".$p_reservation['r_type']."</td>
                                                            <td>".$p_reservation['r_time']."</td>
                                                            <td>".date('F j, Y', strtotime($p_reservation['r_date']))."</td>
                                                            <td>".$p_reservation['r_totalamount']."</td>
                                                            <td>".$p_reservation['r_downpayment']."</td>
                                                            <td class='centerthis'>
                                                                <a href='PN/billing.php?id=".$p_reservation['r_id']."'><button type = 'button' class = 'btn btn-default'><span>Pay now</span></button></a>
                                                            </td>
                                                          </tr>";
                                                }
                            echo                "</tbody>
                                            </table>
                                        </div>
                                    </div>
                                 </div>";
                            }
                            //Payed
                            $payedreservation = mysql_query("SELECT * FROM payed_customer_tbl WHERE py_user='$u_id' and py_validated=0");
                            $countdone = mysql_num_rows($payedreservation);
                            if($countdone>0){
                            echo "<div class='panel panel-default'>
                                    <div class='panel-heading' align='center'>
                                        <h2 class='panel-title'><b><i>Payed Reservations</i></b></h2>
                                    </div>
                                    <div class='panel-body'>
                                        <div class='table-responsive'>
                                            <table class='table table-bordered table-hover table-striped'>
                                                <thead>
                                                    <tr>
                                                        <td>Reservation #</td>
                                                        <td>Event</td>
                                                        <td>Time of Event</td>
                                                        <td>Date of Event</td>
                                                        <td>Total Amount</td>
                                                        <td colspan='2'>Required | Payed Downpayment(50%)</td>
                                                        <td>Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody>";
                                                while($selectpayed=mysql_fetch_array($payedreservation)){
                                                    $selectedid = $selectpayed['py_r_id'];
                                                    $r_downpayment = $selectpayed['py_ammount'];
                                                $pili = mysql_query("SELECT * FROM reservation_tbl WHERE r_id='$selectedid'");
                                                while($p_reservation=mysql_fetch_array($pili)){
                                                    echo "<tr>
                                                            <td>".$p_reservation['r_id']."</td>
                                                            <td>".$p_reservation['r_type']."</td>
                                                            <td>".$p_reservation['r_time']."</td>
                                                            <td>".date('F j, Y', strtotime($p_reservation['r_date']))."</td>
                                                            <td>".$p_reservation['r_totalamount']."</td>
                                                            <td>".$p_reservation['r_downpayment']."</td>
                                                            <td>".$r_downpayment."</td>
                                                            <td class='centerthis'>
                                                                <a href='MyReservations/myreservations.php?id=".$p_reservation['r_id']."'><button type = 'button' class = 'btn btn-default' id=''><span class='fa fa-eye'></span></button></a>
                                                            </td>
                                                          </tr>";
                                                    }
                                                }
                            echo                "</tbody>
                                            </table>
                                        </div>
                                    </div>
                                 </div>";
                            }
                        //Onprocess
                        $onprocess = mysql_query("SELECT * FROM payed_customer_tbl WHERE py_user='$u_id' AND py_validated=1");
                            while($xyz=mysql_fetch_array($onprocess)){
                            $aydi = $xyz['py_user'];
                            $reserveonprocess = mysql_query("SELECT * FROM reservation_tbl WHERE r_user='$aydi' AND r_pay=1");
                            $countdone = mysql_num_rows($reserveonprocess);
                            if($countdone>0){
                            echo "<div class='panel panel-default'>
                                    <div class='panel-heading' align='center'>
                                        <h2 class='panel-title'><b><i>On Process</i></b></h2>
                                    </div>
                                    <div class='panel-body'>
                                        <div class='table-responsive'>
                                            <table class='table table-bordered table-hover table-striped'>
                                                <thead>
                                                    <tr>
                                                        <td>Reservation #</td>
                                                        <td>Event</td>
                                                        <td>Time of Event</td>
                                                        <td>Date of Event</td>
                                                        <td>Total Amount</td>
                                                        <td colspan='2'>Required | Payed Downpayment(50%)</td>
                                                        <td>Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody>";
                                                $payed = mysql_query("SELECT * FROM payed_customer_tbl WHERE py_user='$aydi' AND py_validated=1");
                                                while($pquery=mysql_fetch_array($payed)){
                                                    $r_id = $pquery['py_r_id'];
                                                    $r_downpayment = $pquery['py_ammount'];
                                                $payedreserve = mysql_query("SELECT * FROM reservation_tbl WHERE r_id='$r_id'");
                                                while($p_reservation=mysql_fetch_array($payedreserve)){
                                                    echo "<tr>
                                                            <td>".$p_reservation['r_id']."</td>
                                                            <td>".$p_reservation['r_type']."</td>
                                                            <td>".$p_reservation['r_time']."</td>
                                                            <td>".date('F j, Y', strtotime($p_reservation['r_date']))."</td>
                                                            <td>".$p_reservation['r_totalamount']."</td>
                                                            <td>".$p_reservation['r_downpayment']."</td>
                                                            <td>".$r_downpayment."</td>
                                                            <td class='centerthis'>
                                                                <a href='MyReservations/myreservations.php?id=".$p_reservation['r_id']."'><button type = 'button' class = 'btn btn-default' id=''><span class='fa fa-eye'></span></button></a>
                                                            </td>
                                                          </tr>";
                                                    }
                                                }
                            echo                "</tbody>
                                            </table>
                                        </div>
                                    </div>
                                 </div>";
                                }
                            }
                        }
                    ?>
                <div class='col-lg-12' align='center'>
                    <a href='../index.php' class='btn btn-default btn-lg'>Back to home</a>
                </div>
                </div>
        </div>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/ajax.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/onclick.js"></script>
    <script type="text/javascript" src="../js/onclick.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>

