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
    <link href="../../fonts/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">

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
                    <li class="current"><em>Party Needs</em></li>
                    <li><em>Review</em></li>
                    <li><em>Billing</em></li>
                </ol>
            </nav>
            <hr>
            <div class="col-lg-12">
            <div class='col-lg-12' style='padding-bottom:10px' id='buttonbudget'>
                <button class='btn btn-warning btn-lg' style='width:100%' id='budgetme'><span class='fa fa-cart-arrow-down fa-lg'> </span> Click here to budget your Party Needs</button>
            </div>
            <div class='col-lg-12 hide' style='padding-bottom:10px' id='enterbudget'>
                <div class='col-lg-6'>
                    <div class='form-group'>
                        <label>Please input your budget.</label>
                        <input type='text' id='budgetamount' placeholder='Your budget here'>
                    </div>
                </div>
                <div class='col-lg-6' align='right'>
                    <div class='form-group'>
                        <button id='cancelbudget' class='btn btn-danger btn-lg'>Cancel Budgeting</button>
                    </div>
                </div>
            </div>
                <div class='col-lg-12 hide' id='fullload' align='center' style='padding-top:150px;padding-bottom:150px'>
                    <img src = '../../img/load.gif' style='width:80px'>
                </div>
                <div class="tabs tabs-style-underline tabs-withoutbudget" id='tabs-styles'>
                    <nav id='navtable'>
                        <ul>
                            <li><a href="#section-underline-1"><span>All Packages</span></a></li>
                            <li style='border-right:1px solid #e7ecea'><a href="#section-underline-2"><span>Recommended Packages</span></a></li>
                        </ul>
                    </nav>
                    <div class="content-wrap"  style='border:1px solid #e7ecea;font-size:17px' id=''>
                        <section id="section-underline-1">
                            <div class='row' align='left' style='padding-bottom:20px'>
                            <button class='btn btn-success btn-lg forcreate'><span class='fa fa-plus-circle fa-lg'> </span> Click here to create own package</button> 
                            </div>
                            <img src = '../../img/load.gif' id='allpackageload' class='hide'>
                            <div class='row' id='allpackageselect'>
                            </div>
                            <div class='row'>
                            <table width="100%" class='table-bordered table-striped table-hover' id='table-hide'>
                                <thead>
                                    <tr>
                                        <td>Package Name</td>
                                        <td>Package Content</td>
                                        <td>Package Price</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                            $packageselect = mysql_query("SELECT * FROM packages_tbl ORDER BY pk_price");
                            while($package = mysql_fetch_array($packageselect)){
                                echo "<tr>
                                        <td>".$package['pk_name']."<br>(Good for ".$package['pk_person']." persons)</td>
                                        <td width='40%'><table class='table-bordered' width='100%'>
                                                <tbody>";
                                                $content = explode(",", $package['pk_content']);
                                                $quantity = explode(",", $package['pk_quan']);
                                                foreach(array_combine($content,$quantity) as $packagecontent => $packagequantity){
                                                    echo "<tr>
                                                            <td width='60%'>".$packagecontent."</td>
                                                            <td width='20%'>".$packagequantity."</td>
                                                          </tr>";
                                                }
                                echo            "</tbody>
                                            </table>
                                        </td>
                                        <td>Php ".number_format($package['pk_price'], 2)."</td>
                                        <td><button type='button' class='btn btn-info forselect' id='selectthis' value='".$package['pk_id']."' price='".$package['pk_price']."'>Select</button></td>";
                            }
                            ?>
                                </tbody>
                            </table>
                            </div>
                        </section>
                        <section id="section-underline-2">
                        <div class='row' align='left' style='padding-bottom:20px'>
                            <button class='btn btn-success btn-lg recommendedcreate'><span class='fa fa-plus-circle fa-lg'> </span> Click here to create own package</button> 
                            </div>
                            <img src = '../../img/load.gif' id='recommendedload' class='hide'>
                            <div class='row' id='recommendedselect'>
                            </div>
                            <div class='row'>
                            <table width="100%" class='table-bordered table-striped table-hover' id='recommended-table'>
                                <thead>
                                    <tr>
                                        <td>Package Name</td>
                                        <td>Package Content</td>
                                        <td>Package Price</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                            $suggest = $_SESSION['type'];
                            $packageselect = mysql_query("SELECT * FROM packages_tbl WHERE pk_suggest LIKE '%$suggest%' ORDER BY pk_price");
                            while($package = mysql_fetch_array($packageselect)){
                                echo "<tr>
                                        <td>".$package['pk_name']."<br>(Good for ".$package['pk_person']." persons)</td>
                                        <td width='40%'><table class='table-bordered' width='100%'>
                                                <tbody>";
                                                $content = explode(",", $package['pk_content']);
                                                $quantity = explode(",", $package['pk_quan']);
                                                foreach(array_combine($content,$quantity) as $packagecontent => $packagequantity){
                                                    echo "<tr>
                                                            <td width='60%'>".$packagecontent."</td>
                                                            <td width='20%'>".$packagequantity."</td>
                                                          </tr>";
                                                }
                                echo            "</tbody>
                                            </table>
                                        </td>
                                        <td>Php ".number_format($package['pk_price'], 2)."</td>
                                        <td><button type='button' class='btn btn-info recommendedpackageselect' id='selectthis' value='".$package['pk_id']."' price='".$package['pk_price']."'>Select</button></td>";
                            }
                            ?>
                                </tbody>
                            </table>
                            </div>
                        </section>
                        <section id="section-underline-3"><p>3</p></section>
                    </div><!-- /content -->
                </div><!-- /tabs -->
                <div class="tabs tabs-style-underline tabs-budget hide" id='tabs-styles'>
                    <nav id='navtable'>
                        <ul>
                            <li><a href="#section-underline-1"><span>Suggested Packages</span></a></li>
                        </ul>
                    </nav>
                    <div class="content-wrap"  style='border:1px solid #e7ecea;font-size:17px' id=''>
                        <section id="section-underline-1">
                            <div class='row hide' align='left' style='padding-bottom:20px' id='forbutton'>
                            <button class='btn btn-success btn-lg budgetcreate'><span class='fa fa-plus-circle fa-lg'> </span> Click here to create own package</button> 
                            </div>
                            <img src = '../../img/load.gif' id='budgetload' class='hide'>
                            <p style='color:#C8C8C8;font-size:25px' id='text'>Please input a budget.</p>
                            <div class='row' id='budgettable'>
                            </div>
                            <div class='row' id='budgetselected'>
                            </div>
                        </section>
                    </div><!-- /content -->
                </div><!-- /tabs -->
            </div>
        </div>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script>
        
    </script>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/onclick.js"></script>
    <script src="../../js/cbpFWTabs.js"></script>
    <script type="text/javascript" src="../../js/ajax.js"></script>
    <script type='text/javascript' src='JQuery/budgeting-ajax.js'></script>
    <script>
            (function() {

                [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
                    new CBPFWTabs( el );
                });

            })();
    </script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>

</body>

</html>
