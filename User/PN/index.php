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
                <div class='col-lg-12' style='background-color: #f0f0f0;margin-bottom: 10px;'>
                    <h3>Note:</h3>
                    <p style='font-size: 18px;margin-top: -10px;margin-left: 10px;'>All of the packages shown below has 5% discount for the total package price.</p>
                </div>
                <div class='col-lg-6' style='margin-left: -25px;'>
                    <div class="tabs tabs-style-underline tabs-withoutbudget" id='tabs-styles'>
                    <nav id='navtable'>
                        <ul>
                            <li><a href="#section-underline-1"><span>Packages for <?php echo $type; ?></span></a></li>
                            <li style='border-right:1px solid #e7ecea'><a href="#section-underline-2"><span>All Packages</span></a></li>
                        </ul>
                    </nav>
                    <div class="content-wrap"  style='border:1px solid #e7ecea;font-size:17px' id=''>
                        <section id="section-underline-1">
                            <ul id="toggle-view" class="scroll containspackages">
                                <?php
                                  $thisqry = mysql_query("SELECT * FROM packages_tbl WHERE pk_category = '$type'");
                                            while($etopo = mysql_fetch_array($thisqry)){
                                            $_id = $etopo['pk_id'];
                                            echo "<li>";
                                                echo "<h3>".$etopo['pk_name']."&nbsp(₱".$etopo['pk_price'].")</h3>";
                                                echo "<span>Click to view details  +</span>";
                                                echo "<div class = 'panel'>";
                                                echo "<table width='100%' class='table-striped'>";
                                                echo "<tbody>";
                                                echo "<tr>";
                                                    echo "<th class='forselectpackage'>Item Description</th>";
                                                    echo "<th class='forselectpackage'>Individual Price</th>";
                                                    echo "<th class='forselectpackage'>Item Quantity</th>";
                                                echo "</tr>";
                                                $content = $etopo['pk_content'];
                                                $content1 = explode(",", $content);
                                                $quantity = $etopo['pk_quan'];
                                                $quantity1 = explode(",", $quantity);
                                                    foreach(array_combine($content1,$quantity1) as $newcontent => $newquantity){
                                                        echo "<tr class='forselectpackage'>";
                                                        echo "<td width='40%'>".$newcontent."</td>";
                                                            $qry = mysql_query("SELECT * FROM item_tbl WHERE i_name = '$newcontent'");
                                                            while($row = mysql_fetch_array($qry)){
                                                                echo "<td>Php ".number_format($row['i_price'],2)."</td>";
                                                            }
                                                        echo "<td>".$newquantity."</td>";
                                                        echo "</tr>";
                                                    }
                                                echo "</tbody>";
                                                echo "</table><br>";
                                                echo "<button type='button' class='btn btn-info forselect' id='selectthis' value='".$_id."' price='".$etopo['pk_price']."'>Select/Customize this Package</button>";
                                                echo "<br></div>";
                                                echo "</li>";
                                            }
                                    ?>
                                </ul>
                        </section>
                        <section id="section-underline-2">
                            <div class='col-lg-12' align='left' style='background-color: #f0f0f0;font-size: 25px;'>
                                <label>Sort by:</label>
                                <select style='margin-left: 10px;margin-top: 15px; font-size: 20px;' id='sorting'>
                                    <option value='pk_name'>Name</option>
                                    <option value='pk_price'>Price</option>
                                    <option value='pk_category'>Event Category</option>
                                </select>
                            </div>
                                <ul id="toggle-view" class="scroll containspackages name">
                                    <?php
                                      $thisqry = mysql_query("SELECT * FROM packages_tbl ORDER BY pk_name");
                                                while($etopo = mysql_fetch_array($thisqry)){
                                                $_id = $etopo['pk_id'];
                                                echo "<li>";
                                                    echo "<h3>".$etopo['pk_name']."&nbsp(₱".$etopo['pk_price'].")</h3>";
                                                    echo "<span>Click to view details  +</span>";
                                                    echo "<div class = 'panel'>";
                                                    echo "<table width='100%' class='table-striped'>";
                                                    echo "<tbody>";
                                                    echo "<tr>";
                                                        echo "<th class='forselectpackage'>Item Description</th>";
                                                        echo "<th class='forselectpackage'>Individual Price</th>";
                                                        echo "<th class='forselectpackage'>Item Quantity</th>";
                                                    echo "</tr>";
                                                    $content = $etopo['pk_content'];
                                                    $content1 = explode(",", $content);
                                                    $quantity = $etopo['pk_quan'];
                                                    $quantity1 = explode(",", $quantity);
                                                        foreach(array_combine($content1,$quantity1) as $newcontent => $newquantity){
                                                            echo "<tr class='forselectpackage'>";
                                                            echo "<td width='40%'>".$newcontent."</td>";
                                                                $qry = mysql_query("SELECT * FROM item_tbl WHERE i_name = '$newcontent'");
                                                                while($row = mysql_fetch_array($qry)){
                                                                    echo "<td>Php ".number_format($row['i_price'],2)."</td>";
                                                                }
                                                            echo "<td>".$newquantity."</td>";
                                                            echo "</tr>";
                                                        }
                                                    echo "</tbody>";
                                                    echo "</table><br>";
                                                    echo "<button type='button' class='btn btn-info forselect' id='selectthis' value='".$_id."' price='".$etopo['pk_price']."'>Select/Customize this Package</button>";
                                                    echo "<br></div>";
                                                    echo "</li>";
                                                     
                                                }
                                        ?>
                                </ul>
                                <ul id="toggle-view" class="scroll containspackages hide price">
                                    <?php
                                      $thisqry = mysql_query("SELECT * FROM packages_tbl ORDER BY pk_price");
                                                while($etopo = mysql_fetch_array($thisqry)){
                                                $_id = $etopo['pk_id'];
                                                echo "<li>";
                                                    echo "<h3>".$etopo['pk_name']."&nbsp(₱".$etopo['pk_price'].")</h3>";
                                                    echo "<span>Click to view details  +</span>";
                                                    echo "<div class = 'panel'>";
                                                    echo "<table width='100%' class='table-striped'>";
                                                    echo "<tbody>";
                                                    echo "<tr>";
                                                        echo "<th class='forselectpackage'>Item Description</th>";
                                                        echo "<th class='forselectpackage'>Individual Price</th>";
                                                        echo "<th class='forselectpackage'>Item Quantity</th>";
                                                    echo "</tr>";
                                                    $content = $etopo['pk_content'];
                                                    $content1 = explode(",", $content);
                                                    $quantity = $etopo['pk_quan'];
                                                    $quantity1 = explode(",", $quantity);
                                                        foreach(array_combine($content1,$quantity1) as $newcontent => $newquantity){
                                                            echo "<tr class='forselectpackage'>";
                                                            echo "<td width='40%'>".$newcontent."</td>";
                                                                $qry = mysql_query("SELECT * FROM item_tbl WHERE i_name = '$newcontent'");
                                                                while($row = mysql_fetch_array($qry)){
                                                                    echo "<td>Php ".number_format($row['i_price'],2)."</td>";
                                                                }
                                                            echo "<td>".$newquantity."</td>";
                                                            echo "</tr>";
                                                        }
                                                    echo "</tbody>";
                                                    echo "</table><br>";
                                                    echo "<button type='button' class='btn btn-info forselect' id='selectthis' value='".$_id."' price='".$etopo['pk_price']."'>Select/Customize this Package</button>";
                                                    echo "<br></div>";
                                                    echo "</li>";
                                                     
                                                }
                                        ?>
                                </ul>
                                <ul id="toggle-view" class="scroll containspackages hide event">
                                    <?php
                                      $thisqry = mysql_query("SELECT * FROM packages_tbl ORDER BY pk_category");
                                                while($etopo = mysql_fetch_array($thisqry)){
                                                $_id = $etopo['pk_id'];
                                                echo "<li>";
                                                    echo "<h3>".$etopo['pk_name']."&nbsp(₱".$etopo['pk_price'].")</h3>";
                                                    echo "<span>Click to view details  +</span>";
                                                    echo "<div class = 'panel'>";
                                                    echo "<table width='100%' class='table-striped'>";
                                                    echo "<tbody>";
                                                    echo "<tr>";
                                                        echo "<th class='forselectpackage'>Item Description</th>";
                                                        echo "<th class='forselectpackage'>Individual Price</th>";
                                                        echo "<th class='forselectpackage'>Item Quantity</th>";
                                                    echo "</tr>";
                                                    $content = $etopo['pk_content'];
                                                    $content1 = explode(",", $content);
                                                    $quantity = $etopo['pk_quan'];
                                                    $quantity1 = explode(",", $quantity);
                                                        foreach(array_combine($content1,$quantity1) as $newcontent => $newquantity){
                                                            echo "<tr class='forselectpackage'>";
                                                            echo "<td width='40%'>".$newcontent."</td>";
                                                                $qry = mysql_query("SELECT * FROM item_tbl WHERE i_name = '$newcontent'");
                                                                while($row = mysql_fetch_array($qry)){
                                                                    echo "<td>Php ".number_format($row['i_price'],2)."</td>";
                                                                }
                                                            echo "<td>".$newquantity."</td>";
                                                            echo "</tr>";
                                                        }
                                                    echo "</tbody>";
                                                    echo "</table><br>";
                                                    echo "<button type='button' class='btn btn-info forselect' id='selectthis' value='".$_id."' price='".$etopo['pk_price']."'>Select/Customize this Package</button>";
                                                    echo "<br></div>";
                                                    echo "</li>";
                                                     
                                                }
                                        ?>
                                </ul>
                        </section>
                    </div><!-- /content -->
                </div><!-- /tabs -->
                </div>
                <div class='col-lg-6' style='display:none' id='allpackageselect'>

                </div>
                <div class='col-lg-6 info' align='center' id='budgeting'>
                    <div class='col-lg-12' style='padding-top:40px;color:#fff'>
                        <p style='font-size:30px'>PLEASE SELECT A PACKAGE</p>
                        <p style='font-size:30px'>OR</p>
                        <hr>
                        <a href='../Avail' class='btn btn-lg' style='color:#fff'>
                            <span class='fa fa-pencil-square' style='font-size:50px'></span>
                            <p>CLICK HERE TO CREATE PACKAGE</p>
                            <p>(BUDGETING)</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class='col-md-12' style='display:none;padding-top: 150px;padding-bottom: 500px;' align='center' id='loading'>
                    <h3>Please Wait</h3>
                    <img src = '../../img/load.gif'>
            </div>
            <div class='col-lg-12' style='display:none' id='customizepackage'>
                    
            </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../../js/jquery.js"></script>
    <script src="../../js/onclick.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery-ui.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/cbpFWTabs.js"></script>
    <script src="packageselect.js"></script>
    <script>
            (function() {

                [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
                    new CBPFWTabs( el );
                });

            })();
    </script>
</body>

</html>
