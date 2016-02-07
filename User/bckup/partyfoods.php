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
    <style>
        .carousel .item>img {
            max-width: 100%;
            height: 100%;
        }
    </style>
    <script type="text/javascript">
        function logout() {
            var txt;
            var r = confirm("Are you sure you want to logout?");
            if (r == true) {
                location.href='../logout.php';
            }
        };
        function myTime(){
            var str = document.getElementById("time").value;
            str = str.split(":");
            var hour = str[0];
            hour = parseInt(hour) + 4;
            if(str >= "12" < "08"){
            var res = hour + ':' + str[1];
            document.getElementById("test").value = res;
            }if(str <= "12" >= "13"){
            var res = hour + ':' + str[1];
            document.getElementById("test").value = "0" + res;
            }
        };
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
                <a class="navbar-brand" href="index.php"><img src = '../../images/logoliit.png' style = 'height:50px; width:260px; margin-top:-15px;margin-left:-18px;'></a>
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
        <div class="col-lg-12">
            <nav>
                <ol class="cd-multi-steps text-bottom count">
                    <li class="visited"><a href="#0" class="not-active">Information</a></li>
                    <li class="visited"><em>Party Needs</em></li>
                    <li class="current"><em>Party Foods</em></li>
                    <li><em>Review</em></li>
                    <li><em>Billing</em></li>
                </ol>
            </nav>
            <hr>
                <div class='col-lg-12' style = 'text-align:center'>
                 <?php
                    echo "<h3><label>Budget:&nbsp&nbsp₱".$_SESSION['budget']."</label></h3><a href = 'review.php' class = 'btn btn-default'>Proceed to next step</a>";
                    ?>
                   <hr>
                    <p style = 'font-family:san; font-size: 2em'><i>Suggested food packages</i></p>
                    <hr>
                    <?php
                    $event = $_SESSION['typeofevent'];
                    $even = mysql_query("SELECT * from filter_event_tbl where filter_event = '".$event."'");
                    while($newevent = mysql_fetch_array($even)){
                        $qry = "SELECT * FROM foodpackage_tbl where p_id = '".$newevent['p_id']."'";
                        $qrytbl = mysql_query($qry);
                        if(mysql_num_rows($qrytbl)>0){
                        while($row4pack = mysql_fetch_array($qrytbl)){
                            echo "<div class = 'col-lg-4' style = 'font-size:20px'>";
                            echo "<table height = '500px'; border = '3'; width = '350px';>";
                            echo "<tbody>";
                                echo "<tr>";
                                    echo "<td>
                                    <h4 style = 'color:red';>".$row4pack['p_name']." (P".$row4pack['p_price'].")</h4>
                                    <hr>".$row4pack['f1']."<br>".$row4pack['f2']."<br>".$row4pack['f3']."<br>".$row4pack['f4']."<br>
                                    ".$row4pack['f5']."<br>".$row4pack['f6']."<br>".$row4pack['f7']."<br>".$row4pack['f8']."<br>
                                    ".$row4pack['f9']."<br>
                                    <button class='btn btn-success' data-toggle='modal' data-target='#myModal".$row4pack['p_id']."'>
                                            Add to tray</button></td>";

                                echo "<tr>";
                            echo "</tbody>";
                            echo "</table>";
                            echo "</div>";
                        }
                    }
                    }
                    ?>
                </div> 
                </div>
                <?php
    $modal = mysql_query("SELECT * FROM foodpackage_tbl");
    while($modalnew = mysql_fetch_array($modal)){
        $new = $modalnew['p_id'];
        $packname = $modalnew['p_name'];
            echo "<div id='myModal".$new."' class='modal fade' role='dialog' style = 'font-size:25px;text-align:center'>";
              echo "<div class='modal-dialog'>";
                echo "<div class='modal-content'>";
                  echo "<div class='modal-header'>";
                    echo "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
                    echo "<h3 class='modal-title'>".$packname."</h3>";
                  echo "</div>";
                  echo "<div class='modal-body' style = 'height:100px;align:center;'>";
                    echo "<div class = 'wrapper' align = 'center'>";
                        echo "<table width = '50%'>";
                            echo "<tr>";
                                echo "<td>";
                                    echo "<b>Quantity:</b>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<form action = 'process1_3.php' method = 'POST'>";
                                    echo "<input type ='text' name ='id' value ='".$new."'' hidden>";
                                    echo "<input type ='number' name ='quantity' min = '50' value = '50'>";
                                echo "</td>";
                            echo "</tr>";
                        echo "</table>";
                    echo "</div>";
                  echo "</div>";
                  echo "<div class='modal-footer' style = 'text-align:center'>";
                  echo "<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
                  echo "<input type='submit' name='submit' class='btn btn-default' value='Submit'>";
                  echo "</form>";
                  echo "</div>";
                echo "</div>";

              echo "</div>";
            echo "</div>";
        }
    ?>
<!-- modal -->
        </div>

    <!-- /.container -->

    <!-- jQuery -->
    <script src="../../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>

</body>

</html>
