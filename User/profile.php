<!DOCTYPE html>
<?php 

include('../connection.php');
session_start();
if(isset($_SESSION['u_id'])){
$u_id = $_SESSION['u_id'];
$qry = mysql_query("SELECT * FROM users_tbl where u_id = '$u_id'");
$checkpay = mysql_query("SELECT * FROM reservation_tbl WHERE r_user='$u_id' AND r_status=1 AND r_pay=0");
$result = $qry;
    while($qry = mysql_fetch_array($result)){
        $fname = $qry['u_fname'];
        $lname = $qry['u_lname'];
        $fname = ucwords($fname);
        $lname = ucwords($lname);
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

    <!-- Custom CSS -->
    <link href="../css/heroic-features.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .carousel .item>img {
            max-width: 100%;
            height: 100%;
        }
    </style>
    <script src ="../js/onclick.js"></script>
    <script>
        function logout() {
            var txt;
            var r = confirm("Are you sure you want to logout?");
            if (r == true) {
                location.href='logout.php';
            }
        };
    </script>
</head>

<body onload = "loadscreen()">
    <!-- Navigation -->
    <div>
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
                <a class="navbar-brand" href="index.php"><img src = '../images/logoliit.png' style = 'height:50px; width:260px; margin-top:-15px;margin-left:-18px;'></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" style = 'font-size:18px;'>
                    <li>
                        <a href="#"><span class ='glyphicon glyphicon-home'></span>&nbsp&nbspHome</a>
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
                        <a href="avail.php"><span class ='glyphicon glyphicon-check'></span>&nbsp&nbspAvail Now</a>
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

        <div class='col-lg-12 well1 form-horizontal'>
            <header><h1>Profile</h1></header>
            <div class='col-lg-12'>
            <?php
            $id = $_SESSION['u_id'];
            $qry = mysql_query("SELECT * FROM users_tbl WHERE u_id = '$id'");
            while($user = mysql_fetch_array($qry)){
            ?>
                <h2>User Information</h2>
                <hr>
                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-1' for='event'>Firstname:</label>
                    <div class='col-md-7'>
                        <div class='col-md-1'>
                            <div class='form-group internal'>
                                <input type='text' size='35' value='<?php echo $user['u_fname']; ?>'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-1' for='event'>Middlename:</label>
                    <div class='col-md-7'>
                        <div class='col-md-1'>
                            <div class='form-group internal'>
                                <input type='text' size='35' value='<?php echo $user['u_mname']; ?>'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-1' for='event'>Lastname:</label>
                    <div class='col-md-7'>
                        <div class='col-md-1'>
                            <div class='form-group internal'>
                                <input type='text' size='35' value='<?php echo $user['u_lname']; ?>'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-1' for='event'>Mobile/Telephone Number:</label>
                    <div class='col-md-7'>
                        <div class='col-md-1'>
                            <div class='form-group internal'>
                                <input type='text' size='35' value='<?php echo $user['mnumber']; ?>'>
                            </div>
                        </div>
                    </div>
                </div>
                <h2>Account Information</h2>
                <hr>
                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-1' for='event'>Account:</label>
                    <div class='col-md-7'>
                        <div class='col-md-1'>
                            <div class='form-group internal'>
                                <input type='text' size='35' value='<?php echo $user['u_acc']; ?>'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-1' for='event'>Password:</label>
                    <div class='col-md-7'>
                        <div class='col-md-1'>
                            <div class='form-group internal'>
                                <input type='password' size='35' value='<?php echo $user['u_pass']; ?>'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-1' for='event'>E-mail Address:</label>
                    <div class='col-md-7'>
                        <div class='col-md-1'>
                            <div class='form-group internal'>
                                <input type='text' size='35' value='<?php echo $user['u_email']; ?>'>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
        
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <script type="text/JavaScript" src="../js/ajax.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
