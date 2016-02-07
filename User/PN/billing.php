<!DOCTYPE html>
<?php 

include('../../connection.php');
session_start();
if(isset($_POST['paynow'])){
    $u_id = $_SESSION['u_id'];
    $reference = $_POST['reference'];
    $amountpayed = $_POST['amountpayed'];
    
    if(isset($_GET['id'])){
    $validated = $_POST['typepay'];
    $reser_id = $_GET['id'];
    $payment = mysql_query("UPDATE reservation_tbl SET r_pay=1 WHERE r_user='$u_id'");
    $qry = mysql_query("INSERT INTO payed_customer_tbl(py_r_id,py_user,py_referrence,py_ammount,py_typepayment,py_validated) VALUES('$reser_id','$u_id','$reference','$amountpayed','$validated',0)");
        if($qry && $payment){
            $alert= "<script language=javascript>
                alert(\"Done! Thank You for choosing Eh Kasi Bata Rentals and Party Needs.\");</script>";
            echo $alert;
            $locationpage = "<script language=javascript>location.href='../../index.php'</script>"; 
                echo $locationpage;
        }
    }else{
        $validated = $_POST['typepay'];
        $reser_id = $_POST['py_id'];
        $payment = mysql_query("UPDATE reservation_tbl SET r_pay=1 WHERE r_user='$u_id'");
        $qry = mysql_query("INSERT INTO payed_customer_tbl(py_r_id,py_user,py_referrence,py_ammount,py_typepayment,py_validated) VALUES('$reser_id','$u_id','$reference','$amountpayed','$validated',0)");
            if($qry && $payment){
                $alert= "<script language=javascript>
                    alert(\"Done! Thank You for choosing Eh Kasi Bata Rentals and Party Needs.\");</script>";
                echo $alert;
                $locationpage = "<script language=javascript>location.href='../../index.php'</script>"; 
                    echo $locationpage;
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
                        <a href="../avail.php"><span class ='glyphicon glyphicon-check'></span>&nbsp&nbspAvail Now</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right" style = 'font-size:20px;'>
                    <li class="dropdown">
                      <a style = 'color:#fff;' href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><?php echo $fname."&nbsp".$lname; ?><span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="../myreservations.php">My Reservation</a></li>
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
                    <li class="visited"><a href="#0" class="not-active">Review</a></li>
                    <li class="current"><em>Billing</em></li>
                </ol>
            </nav>
            <hr>
            <?php
            if(isset($_GET['id'])){
                $r_id = $_GET['id'];
                $qry = mysql_query("SELECT * FROM reservation_tbl WHERE r_user ='$u_id' AND r_id = '$r_id'");
                while ($accept = mysql_fetch_array($qry)) {
                $stat = $accept['r_status'];
                $r_id = $accept['r_id'];
                if($stat == '1'){
                echo "<div class='col-lg-12' align='center' style='font-size:22px'>
                <fieldset>
                    <div style = 'font-size:20px' align = 'center'>
                      <div class='panel-heading'>
                        <h3>Billing(Bank Deposit)</h3>
                        <div>
                            <h4>Pay/Deposit at any BDO Branch Nationwide.</h4>
                            <h4>Acount number: 32123-32134-32134</h4>
                        </div>
                      </div>
                      <div class=''>
                        <form class='form-horizontal' action = 'billing.php?".$r_id."' method = 'POST'>
                          <div class='form-group'>
                            <label class='control-label col-md-4 col-md-offset-2'>Type of Payment:</label>
                            <div class='col-md-6'>
                              <div class='col-md-8'>
                                <div class='form-group' align='left'>
                                    <label><input type='radio' name='typepay' value='0' required>Partial Payment</label>
                                    <label><input type='radio' name='typepay' value='1'>Full Payment</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label class='control-label col-md-4 col-md-offset-2'>Reference Number:</label>
                            <div class='col-md-6'>
                              <div class='col-md-5'>
                                <div class='form-group'>
                                    <input type='text' name='reference' class='form-control' onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength='16'>
                                    <input type='text' class='hide' name='py_id' value='".$r_id."'>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label class='control-label col-md-4 col-md-offset-2'>Amount Payed:</label>
                            <div class='col-md-6'>
                              <div class='col-md-5'>
                                <div class='form-group'>
                                    <input type='text' name='amountpayed' class='form-control' onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class='col-lg-12'>
                        <input type='submit' class='btn btn-success' name='paynow' value='Send'>
                        <a href='../index.php' type='button' class='btn btn-danger'>Pay Later</a>
                        </form>
                      </div>
                    </div>
                </fieldset>
            </div>";
            } else {
                echo "<div class='col-lg-12' align='center' style='font-size:22px'>
                <fieldset>
                    <div style = 'font-size:20px' align = 'center'>
                      <div class='panel-heading'>
                        <h3>Billing(Bank Deposit)</h3>
                      </div>
                      <div class='well1'>
                        <h3>Please wait for the confirmation of the Administrator while<br>your request is being processed.</h3>
                        <h3>A text message will be send to you by the Administrator<br>if your request is confirmed.</h3>
                      </div>
                    </div>
                </fieldset>
                <hr>
                <div class='col-lg-12'>
                    <form method='POST' action='../avail.php'>
                    <input type='submit' class='btn btn-default btn-lg' value='Make another transaction' name='transacanother'>
                    </form>
                    <br>
                    <a href='../index.php' style='font-size:20px;'><i>Back to home.</i></a>
                </div>
            </div>";
            }
            }
            }else{
            $r_id = $_SESSION['r_id'];
            $qry = mysql_query("SELECT * FROM reservation_tbl WHERE r_user ='$u_id' AND r_id = '$r_id'");
            while ($accept = mysql_fetch_array($qry)) {
                $stat = $accept['r_status'];
                $r_id = $accept['r_id'];
                if($stat == '1'){
                echo "<div class='col-lg-12' align='center' style='font-size:22px'>
                <fieldset>
                    <div style = 'font-size:20px' align = 'center'>
                      <div class='panel-heading'>
                        <h3>Billing(Bank Deposit)</h3>
                        <div>
                            <h4>Pay/Deposit at any BDO Branch Nationwide.</h4>
                            <h4>Acount number: 32123-32134-32134</h4>
                        </div>
                      </div>
                      <div class=''>
                        <form class='form-horizontal' action = 'billing.php' method = 'POST'>
                          <div class='form-group'>
                            <label class='control-label col-md-4 col-md-offset-2'>Type of Payment:</label>
                            <div class='col-md-6'>
                              <div class='col-md-8'>
                                <div class='form-group' align='left'>
                                    <label><input type='radio' name='typepay' value='0' required>Partial Payment</label>
                                    <label><input type='radio' name='typepay' value='1'>Full Payment</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label class='control-label col-md-4 col-md-offset-2'>Reference Number:</label>
                            <div class='col-md-6'>
                              <div class='col-md-5'>
                                <div class='form-group'>
                                    <input type='text' name='reference' class='form-control' onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    <input type='text' class='hide' name='py_id' value='".$r_id."'>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label class='control-label col-md-4 col-md-offset-2'>Amount Payed:</label>
                            <div class='col-md-6'>
                              <div class='col-md-5'>
                                <div class='form-group'>
                                    <input type='text' name='amountpayed' class='form-control'>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class='col-lg-12'>
                        <input type='submit' class='btn btn-success' name='paynow' value='Send'>
                        <a href='../index.php' type='button' class='btn btn-danger'>Pay Later</a>
                        </form>
                      </div>
                    </div>
                </fieldset>
            </div>";
            } else {
                echo "<div class='col-lg-12' align='center' style='font-size:22px'>
                <fieldset>
                    <div style = 'font-size:20px' align = 'center'>
                      <div class='panel-heading'>
                        <h3>Billing(Bank Deposit)</h3>
                      </div>
                      <div class='well1'>
                        <h3>Please wait for the confirmation of the Administrator while<br>your request is being processed.</h3>
                        <h3>A text message will be send to you by the Administrator<br>if your request is confirmed.</h3>
                      </div>
                    </div>
                </fieldset>
                <hr>
                <div class='col-lg-12'>
                    <form method='POST' action='../avail.php'>
                    <input type='submit' class='btn btn-default btn-lg' value='Make another transaction' name='transacanother'>
                    </form>
                    <br>
                    <a href='../index.php' style='font-size:20px;'><i>Back to home.</i></a>
                </div>
            </div>";
            }
            }
        }
            ?>
            
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

