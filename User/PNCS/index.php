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
                    <li class="current"><em>Party Needs</em></li>
                    <li><em>Catering</em></li>
                    <li><em>Review</em></li>
                    <li><em>Billing</em></li>
                </ol>
            </nav>
            <hr>
            <div class="col-lg-12">
              <div class="col-lg-6">
                <div class='col-lg-12 well'>
                <h2>Select a package</h2>
                </div>
                <ul id="toggle-view" class="scroll containspackages">
                <?php
                  $thisqry = mysql_query("SELECT * FROM packages_tbl");
                            while($etopo = mysql_fetch_array($thisqry)){
                            $_id = $etopo['pk_id'];
                            echo "<li>";
                                echo "<h3>".$etopo['pk_name']."&nbsp(₱".$etopo['pk_price'].")</h3>";
                                echo "<span>Click to view details  +</span>";
                                echo "<div class = 'panel'>";
                                echo "<table>";
                                echo "<tr>";
                                $content = $etopo['pk_content'];
                                $content1 = explode(",", $content);
                                echo "<td>";
                                foreach($content1 as $newcontent){
                                    echo $newcontent."<br>";
                                }
                                echo "</td>";
                                echo "<td style = 'padding-left:20px'>";
                                $quantity = $etopo['pk_quan'];
                                $quantity1 = explode(",", $quantity);
                                foreach($quantity1 as $newquantity){
                                    echo $newquantity."<br>";
                                }
                                echo "</td>";
                                echo "</tr>";
                                echo "</table>";
                                echo "<hr>";
                                echo "<button type='button' class='btn btn-info forselect' id='selectthis' value='".$_id."'>Select</button>";
                                echo "<form method='POST'>";
                                echo "<input type='hidden' class='valueinput' name='selectedpackage' id='thisisit' value='".$_id."'>";
                                echo "</form>";
                                echo "<br></div>";
                                echo "</li>";
                            }
                    ?>
                </ul>
              </div>
              <div class='col-lg-6'>
                <div class='col-lg-12 well'>
                <h2>Selected Package</h2>
                </div>
                <div class='col-lg-12' id='selectedpackage'>

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
