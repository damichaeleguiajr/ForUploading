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
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="css/additionalcss.css" rel="stylesheet">
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
            <div class='col-lg-12 control-div'>
                <form method='POST' action = 'next.php'>
                <div class='panel-header' align='center' style='padding-bottom: 50px;'>
                    <h3><span>STEP 2:</span>  Selecting Party Needs/Party Packages</h3>
                </div>
                <div class='col-lg-6'>
                    <div class='form-group'>
                        <div class='div-header'>
                            <label clas='form-label col-md-offset-2'>Please Input Your Budget.</label>
                        </div>
                        <input class='form-control' type='text' id='inputbudget' originalvalue=''>
                    </div>
                    <div class='form-group'>
                        <div class='div-header'>
                            <label clas='form-label col-md-offset-2'>Estimated Number of Guest Attending.</label>
                        </div>
                        <input class='form-control' type='text' id='numberguest' required><span style='color:red;display:inline'>* Required</span>
                    <div class='form-group display-none' style='padding-top: 5px;' id='forkids'>
                        <div class='div-header'>
                            <label clas='form-label col-md-offset-2'>Please input the number of kids.</label>
                        </div>
                        <input class='form-control' type='text' id='numberkids'>
                    </div>
                        <label class='display-none' style='font-size: 18px' id='checkkids'><input type='checkbox' id='kids'>  Inlcude kids to the number of guest attending.</label>
                    </div>
                    <div class='form-group'>
                        <div class='div-header'>
                            <label clas='form-label col-md-offset-2'>Please check your desired needs for your event.</label>
                        </div>
                        <table>
                            <tr>
                                <td width='45%'><label><input type='checkbox' class='category' id='category' for='tables' required> Tables</label></td>
                                <td width='35%'><label><input type='checkbox' class='category' id='category' for='services' required> Services</label></td>
                                <td width='35%'><label><input type='checkbox' class='category' id='category' for='others' required> Others</label></td>
                            </tr>
                            <tr>
                                <td width='45$%'><label><input type='checkbox' class='category' id='category' for='chairs' required> Chairs</label></td>
                                <td width='35%'><label><input type='checkbox' class='category' id='category' for='tableware' required> Tableware</label></td>
                            </tr>
                            <tr>
                                <td width='45%'><label><input type='checkbox' class='category' id='category' for='a-and-d' required> Audio/Visuals</label></td>
                                <td width='35%'><label><input type='checkbox' class='category' id='category' for='drinkware' required> Drinkware</label></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class='col-lg-6'>
                    <div class='form-group display-none' id='tables'>
                        <div class='div-header'>
                            <label clas='form-label col-md-offset-2'>Tables</label>
                        </div>
                        <table>
                            <?php
                               $qrytable = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'Table'");
                               for($i=0;$i<2;$i++){
                                echo "<tr>";
                               }
                               $column = 0;
                               while($row = mysql_fetch_array($qrytable)){
                                echo "<td width='40%'><label><input type='checkbox' class='item' id='".$row['i_id']."' name='item[]' value='".$row['i_name']."'> ".$row['i_name']." <span style='color:orange;display:inline'>(Php ".number_format($row['i_price'],2)."/qty)</span></label></td>";
                                $column++;
                                if($column == 2){
                                    echo "</tr>";
                                    $column = 0;
                                }
                               }
                            ?>
                        </table>
                    </div>
                    <div class='form-group display-none' id='chairs'>
                        <div class='div-header'>
                            <label clas='form-label col-md-offset-2'>Chairs</label>
                        </div>
                        <table>
                            <?php
                               $qrytable = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'Chair'");
                               for($i=0;$i<2;$i++){
                                echo "<tr>";
                               }
                               $column = 0;
                               while($row = mysql_fetch_array($qrytable)){
                                echo "<td width='40%'><label><input type='checkbox' class='item' id='".$row['i_id']."' name='item[]' value='".$row['i_name']."'> ".$row['i_name']." <span style='color:orange;display:inline'>(Php ".number_format($row['i_price'],2).")</span></label></td>";
                                $column++;
                                if($column == 2){
                                    echo "</tr>";
                                    $column = 0;
                                }
                               }
                            ?>
                        </table>
                    </div>
                    <div class='form-group display-none' id='a-and-d'>
                        <div class='div-header'>
                            <label clas='form-label col-md-offset-2'>Audio/Visuals</label>
                        </div>
                        <table>
                            <?php
                               $qrytable = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'AudioVisuals'");
                               for($i=0;$i<2;$i++){
                                echo "<tr>";
                               }
                               $column = 0;
                               while($row = mysql_fetch_array($qrytable)){
                                echo "<td width='40%'><label><input type='checkbox' class='item' id='".$row['i_id']."' name='item[]' value='".$row['i_name']."'> ".$row['i_name']." <span style='color:orange;display:inline'>(Php ".number_format($row['i_price'],2).")</span></label></td>";
                                $column++;
                                if($column == 2){
                                    echo "</tr>";
                                    $column = 0;
                                }
                               }
                            ?>
                        </table>
                    </div>
                    <div class='form-group display-none' id='services'>
                        <div class='div-header'>
                            <label clas='form-label col-md-offset-2'>Services</label>
                        </div>
                        <table>
                            <?php
                               $qrytable = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'Service'");
                               for($i=0;$i<2;$i++){
                                echo "<tr>";
                               }
                               $column = 0;
                               while($row = mysql_fetch_array($qrytable)){
                                echo "<td width='40%'><label><input type='checkbox' class='item' id='".$row['i_id']."' name='item[]' value='".$row['i_name']."'> ".$row['i_name']." <span style='color:orange;display:inline'>(Php ".number_format($row['i_price'],2).")</span></label></td>";
                                $column++;
                                if($column == 2){
                                    echo "</tr>";
                                    $column = 0;
                                }
                               }
                            ?>
                        </table>
                    </div>
                    <div class='form-group display-none' id='tableware'>
                        <div class='div-header'>
                            <label clas='form-label col-md-offset-2'>Tableware</label>
                        </div>
                        <table>
                            <?php
                               $qrytable = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'Tableware'");
                               for($i=0;$i<2;$i++){
                                echo "<tr>";
                               }
                               $column = 0;
                               while($row = mysql_fetch_array($qrytable)){
                                echo "<td width='40%'><label><input type='checkbox' class='item' id='".$row['i_id']."' name='item[]' value='".$row['i_name']."'> ".$row['i_name']." <span style='color:orange;display:inline'>(Php ".number_format($row['i_price'],2).")</span></label></td>";
                                $column++;
                                if($column == 2){
                                    echo "</tr>";
                                    $column = 0;
                                }
                               }
                            ?>
                        </table>
                    </div>
                    <div class='form-group display-none' id='drinkware'>
                        <div class='div-header'>
                            <label clas='form-label col-md-offset-2'>Drinkware</label>
                        </div>
                        <table>
                            <?php
                               $qrytable = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'drinkware'");
                               for($i=0;$i<2;$i++){
                                echo "<tr>";
                               }
                               $column = 0;
                               while($row = mysql_fetch_array($qrytable)){
                                echo "<td width='40%'><label><input type='checkbox' class='item' id='".$row['i_id']."' name='item[]' value='".$row['i_name']."'> ".$row['i_name']." <span style='color:orange;display:inline'>(Php ".number_format($row['i_price'],2).")</span></label></td>";
                                $column++;
                                if($column == 2){
                                    echo "</tr>";
                                    $column = 0;
                                }
                               }
                            ?>
                        </table>
                    </div>
                    <div class='form-group display-none' id='clothing'>
                        <div class='div-header'>
                            <label clas='form-label col-md-offset-2'>Clothing</label>
                        </div>
                        <table>
                            <?php
                               $qrytable = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'Clothing'");
                               for($i=0;$i<2;$i++){
                                echo "<tr>";
                               }
                               $column = 0;
                               while($row = mysql_fetch_array($qrytable)){
                                echo "<td width='40%'><label><input type='checkbox' class='item' id='".$row['i_id']."' name='item[]' value='".$row['i_name']."'> ".$row['i_name']." <span style='color:orange;display:inline'>(Php ".number_format($row['i_price'],2).")</span></label></td>";
                                $column++;
                                if($column == 2){
                                    echo "</tr>";
                                    $column = 0;
                                }
                               }
                            ?>
                        </table>
                    </div>
                    <div class='form-group display-none' id='others'>
                        <div class='div-header'>
                            <label clas='form-label col-md-offset-2'>Others</label>
                        </div>
                        <table>
                            <?php
                               $qrytable = mysql_query("SELECT * FROM item_tbl WHERE i_category = 'Others'");
                               for($i=0;$i<2;$i++){
                                echo "<tr>";
                               }
                               $column = 0;
                               while($row = mysql_fetch_array($qrytable)){
                                echo "<td width='40%'><label><input type='checkbox' class='item' id='".$row['i_id']."' name='item[]' value='".$row['i_name']."'> ".$row['i_name']." <span style='color:orange;display:inline'>(Php ".number_format($row['i_price'],2).")</span></label></td>";
                                $column++;
                                if($column == 2){
                                    echo "</tr>";
                                    $column = 0;
                                }
                               }
                            ?>
                        </table>
                    </div>
                </div>
                <div class='col-lg-12' align='center'>
                    <button type='submit' name='next' class='proceed btn btn-default btn-success' disabled>Proceed</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../../js/jquery.js"></script>
    <script src="js/step2.js"></script>
    <script src="../../js/jquery-ui.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>

</body>

</html>
