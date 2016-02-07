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
                    <li class='visited'><a href="#0" class="not-active">Information</a></li>
                    <li class='visited'><em>Party Needs</em></li>
                    <li class='visited'><em>Party Foods</em></li>
                    <li class="current"><em>Review</em></li>
                    <li><em>Billing</em></li>
                </ol>
            </nav>
            <hr>
                <div class='col-lg-12' style = 'text-align:center'>
                    <h2>Confirmation</h2>
                    <hr>
                </div>
                <div class='col-lg-12'>
                    <table height = '300px' width = '500px'>
                             <tr>
                                <td class = ''><b>Date of event: </b></td>
                                <td><span><?php echo date("F j, Y", strtotime($_SESSION['dateofevent'])); ?></span></td>
                            </tr>
                            <tr>
                                <td class = ''><b>From: </b></td>
                                <td><span><?php echo $_SESSION['timeformat12']; ?></span></td>
                            </tr>
                            <tr>
                                <td class = ''><b>To: </b></td>
                                <td><span><?php echo $_SESSION['endformat12']; ?></span></td>
                            </tr>
                            <tr>
                                <td><b>Type of event: </b></td>
                                <td><span><?php echo $_SESSION['typeofevent']; ?></span></td>
                            </tr>
                            <tr>
                                <td class = ''><b>Name of Celebrant: </b></td>
                                <td class = ''><span><?php echo $_SESSION['celname']; ?></span></td>
                            </tr>
                            <tr>
                                <td><b>Event Theme: </b></td>
                                <td><span><?php echo $_SESSION['eventtheme']; ?></span></td>
                            </tr>
                            <tr>
                                <td><b>Theme Color: </b></td>
                                <td><span><?php echo $_SESSION['colorsonevent']; ?></span></td>
                            </tr>
                            <tr>
                                <td><b>Venue: </b></td>
                                <td><span><?php echo $_SESSION['placeofevent']; ?></span></td>
                            </tr>
                            <tr>
                                <td class = ''><b>Contact Person: </b></td>
                                <td class = ''><span><?php echo $_SESSION['persontocontact']; ?></span></td>
                            </tr>
                            <tr>
                                <td class = ''><b>Contact Number: </b></td>
                                <td class = ''><span><?php echo $_SESSION['personcontactnumber']; ?></span></td>
                            </tr>
                    </table>
                </div>
                <div class = 'col-lg-12'>
                    <div class ='col-lg-12' style = 'font-size:20px;'>
                    <hr>
                    <h2>Party Needs</h2>
                    <?php
                            $sum = 0;
                            foreach($_SESSION['package_id'] as $lahat){
                            $qry = mysql_query("SELECT * FROM packages_tbl where pk_id = '".$lahat."'");
                            while($etoo = mysql_fetch_array($qry)){
                                $total = $etoo['pk_price'];
                            }
                            $sum += $total;
                            $_SESSION['sum'] = $sum;
                            }
                            echo "<h3><label>Total:&nbsp&nbsp₱".$_SESSION['sum'].
                            "</label></h3>";
                    ?>
                    <hr>
                    <?php
                    foreach($_SESSION['package_id'] as $s_id){
                        $thisqry = mysql_query("SELECT * FROM packages_tbl where pk_id = '".$s_id."'");
                        while($etopo = mysql_fetch_array($thisqry)){
                            echo "<div class='col-lg-4'>";
                            echo "<h3>".$etopo['pk_name']."&nbsp(P".$etopo['pk_price'].")</h3>";
                            echo "<div>";
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
                            echo "</div>";
                        }
                    }
                    ?>
                    </div>
                </div>
                <div class ='col-lg-12' style = 'font-size:20px;'>
                    <hr>
                    <h2>Party Foods</h2>
                    <?php
                        if(isset($_SESSION['food_id'])){
                            $quantt = 0;
                            $sum = 0;
                            foreach($_SESSION['food_id'] as $lahat){
                            $qry = mysql_query("SELECT * FROM foodpackage_tbl where p_id = '".$lahat."'");
                            while($etoo = mysql_fetch_array($qry)){
                                $total = $etoo['p_price'];
                            }
                            foreach($_SESSION['quantity'] as $quant){
                                $quant1 = $quant;
                            }
                            $sum += $total * $quant1;
                            $quantt += $quant1;
                            $foodtotal = $sum + $quantt;
                            }
                            echo "<h3><label>Total:&nbsp&nbsp₱".$sum.
                            "</label></h3>";
                        }else{
                            $foodtotal = 0;
                        }
                    ?>
                    <hr>
                    <?php
                    if(isset($_SESSION['food-id'])){
                    foreach($_SESSION['food_id'] as $s_id){
                    foreach($_SESSION['quantity'] as $quant){
                                $quant1 = $quant;
                            }
                        $thisqry = mysql_query("SELECT * FROM foodpackage_tbl where p_id = '".$s_id."'");
                        while($row4pack = mysql_fetch_array($thisqry)){
                            echo "<div class='col-lg-4' style = 'height:300px;'>";
                            echo "<div>";
                            echo "<tr>";
                                     $foodtot = $quant * $row4pack['p_price'];
                                     $foodtot = number_format($foodtot, 2, '.', '');
                                     echo "<td><b><label>Quantity:</label></b></td>";
                                     echo "<td><b>".$quant."*₱".$row4pack['p_price']."=₱".$foodtot."</b></td>";
                                echo "</tr>";
                            echo "<table>";
                                echo "<tbody>";
                                    echo "<tr>";
                                        echo "<td>
                                        <h4 style = 'color:red';>".$row4pack['p_name']." (₱".$row4pack['p_price'].")</h4>
                                        <hr>".$row4pack['f1']."<br>".$row4pack['f2']."<br>".$row4pack['f3']."<br>".$row4pack['f4']."<br>
                                        ".$row4pack['f5']."<br>".$row4pack['f6']."<br>".$row4pack['f7']."<br>".$row4pack['f8']."<br>
                                        ".$row4pack['f9'];

                                    echo "<tr>";
                                echo "</tbody>";
                                echo "</table>";
                                echo "</div>";
                            echo "</div>";
                        }
                    }
                    }else{
                        echo "<h3>No chosen food package/s.</h3>";
                    }
                    ?>
                    <div class='col-lg-12'>
                        <?php
                        $overall = 0;
                        $overall = $foodtotal + $_SESSION['sum'];
                        $totalamount = number_format($overall, 2, '.', '');
                        $_SESSION['totalamount'] = $totalamount;
                        $fifty = $_SESSION['totalamount'] * .50;
                        echo "<hr><label><b><h2>Total Amount:₱".$_SESSION['totalamount']."</h2></b></label>";
                        ?>
                    </div>
                    <div class = 'col-lg-12' style = 'text-align:center;'>
                    <hr>
                        <a href = 'billing.php' class = 'btn btn-default'>Proceed to billing</a><br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>

</body>

</html>
