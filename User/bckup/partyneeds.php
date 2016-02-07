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
                    <li class="current"><em>Party Needs</em></li>
                    <li><em>Party Foods</em></li>
                    <li><em>Review</em></li>
                    <li><em>Billing</em></li>
                </ol>
            </nav>
            <hr>
        <div class="col-lg-12" style = 'text-align:center'>
        <?php
        echo "<h3><label>Budget:&nbsp&nbsp₱".$_SESSION['budget']."</label></h3><a href = 'partyfoods.php' class = 'btn btn-default'>Proceed to next step</a>";
        ?>
        <hr>
        </div>
                <div class='col-lg-12'>
                <?php
                if(isset($_SESSION['budget'])){
                    echo "<div class = 'col-lg-6 scroll' style = 'height: 500px;'>
                <div style = 'position'>";
                    echo "<h2 style = 'text-align:center;'>Suggested packages depending on your budget</h2>";
                }else{
                    echo "<div class = 'col-lg-6 scroll' style = 'height: 500px;'>
                <div style = 'position'>";
                echo "<h1 style = 'text-align:center;'>Suggested Packages</h1>";
                }
                ?>
                </div>
                <hr>
                <div>
                    <ul id = 'toggle-view'>
                        <?php
                        if(isset($_SESSION['budget'])){
                        $budget = $_SESSION['budget'];
                        $thisqry = mysql_query("SELECT * FROM packages_tbl where pk_price <= '$budget'");
                        while($etopo = mysql_fetch_array($thisqry)){
                            $_id = $etopo['pk_id'];
                            echo "<li data-toggle='modal' data-target='#myModal".$_id."'>";
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
                                echo "<button type='button' class='btn btn-info' data-toggle='modal' data-target='#myModal".$_id."'>Add item</button>";
                                echo " <-Choose Action";
                                echo "</div>";
                                echo "</li>";
                            }
                        }else{
                        $thisqry = mysql_query("SELECT * FROM (SELECT * FROM packages_tbl ORDER BY rand() LIMIT 6)packages_tbl WHERE pk_suggest LIKE '%Birthday%' ORDER BY pk_price");
                        while($etopo = mysql_fetch_array($thisqry)){
                            $_id = $etopo['pk_id'];
                            echo "<li data-toggle='modal' data-target='#myModal".$_id."'>";
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
                                echo "<button type='button' class='btn btn-info' data-toggle='modal' data-target='#myModal".$_id."'>Add item</button>";
                                echo " <-Choose Action";
                                echo "</div>";
                                echo "</li>";
                            }
                        }
                        ?>
                    </ul>
                </div>
                </div>
                <div class = 'col-lg-6 scroll' style = 'height: 500px;'>
                <div style = 'position'>
                <?php
                if(isset($_SESSION['budget'])){
                    echo "<h2 style = 'text-align:center;'>All Packages<br><h5 style = 'text-align:center;'><span>(You can view all packages but you can't choose.)</span></h5></h2>";
                }else{
                    echo "<h2 style = 'text-align:center;'>All Packages</h2>";
                }
                ?>
                </div>
                <hr>
                <div>
                    <ul id = 'toggle-view'>
                        <?php
                        if(isset($_SESSION['budget'])){
                            $thisqry = mysql_query("SELECT * FROM packages_tbl");
                            while($etopo = mysql_fetch_array($thisqry)){
                            $_id = $etopo['pk_id'];
                            echo "<li data-toggle='modal' data-target='#myModal".$_id."'>";
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
                                echo "</div>";
                                echo "</li>";
                            }
                        }else{
                            $thisqry = mysql_query("SELECT * FROM packages_tbl");
                            while($etopo = mysql_fetch_array($thisqry)){
                            $_id = $etopo['pk_id'];
                            echo "<li data-toggle='modal' data-target='#myModal".$_id."'>";
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
                                echo "<button type='button' class='btn btn-info' data-toggle='modal' data-target='#myModal".$_id."'>Add item</button>";
                                echo " <-Choose Action";
                                echo "</div>";
                                echo "</li>";
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="col-lg-12 paper" style = 'text-align:center'>
                        <div class = 'col-lg-12'>
                            <hr class = 'style-seven'>
                            <h3>Customize your own or create your own list of party needs</h3>
                            <div class = 'footerhere'>
                            <a class = 'btn btn-success' style = 'width:120px; height:45px; font-size:20px' href = 'createmenu.php'>Create</a><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->
    <?php
    $modal = mysql_query("SELECT * FROM packages_tbl");
    while($modalnew = mysql_fetch_array($modal)){
        $new = $modalnew['pk_id'];
        $packname = $modalnew['pk_name'];
            echo "<div id='myModal".$new."' class='modal fade' role='dialog' style = 'font-size:25px;text-align:center'>";
              echo "<div class='modal-dialog'>";
                echo "<div class='modal-content'>";
                  echo "<div class='modal-header'>";
                    echo "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
                    echo "<h1 class='modal-title'>".$packname."</h1>";
                    echo "<h3>₱".$modalnew['pk_price']."</h3>";
                  echo "</div>";
                  echo "<div class='modal-body scroll' style = 'height:400px;align:center;'>";
                    echo "<div class = 'wrapper' align = 'center'>";
                        echo "<table width = '50%'>";
                            echo "<tr>";
                                $content = $modalnew['pk_content'];
                                $content1 = explode(",", $content);
                                echo "<td>";
                                foreach($content1 as $newcontent){
                                    echo $newcontent."<br>";
                                }
                                echo "</td>";
                                echo "<td style = 'padding-left:20px'>";
                                $quantity = $modalnew['pk_quan'];
                                $quantity1 = explode(",", $quantity);
                                foreach($quantity1 as $newquantity){
                                    echo $newquantity."<br>";
                                }
                                echo "</td>";
                            echo "</tr>";
                        echo "</table>";
                    echo "</div>";
                  echo "</div>";
                  echo "<div class='modal-footer'>";
                  if(isset($_SESSION['budget'])){
                  if($budget <= $modalnew['pk_price']){
                    echo "<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
                    echo "<a href = 'customized?id=".$new."' class='btn btn-primary'>Click to customize</a>";
                    echo "<a href = 'proceed1_2.php?id=".$new."' class='btn btn-success hidden'>Add to Cart</a>";
                    }else{
                    echo "<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
                    echo "<a href = 'customized.php?id=".$new."' class='btn btn-primary'>Click to customize</a>";
                    echo "<a href = 'process1_2.php?id=".$new."' class='btn btn-success'>Add to cart</a>"; 
                    }
                  }else{
                    echo "<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
                    echo "<a href = 'customize.php?id=".$new."' class='btn btn-primary'>Click to customize</a>";
                    echo "<a href = 'process1_2.php?id=".$new."' class='btn btn-success'>Add to Cart</a>"; 
                  }
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
