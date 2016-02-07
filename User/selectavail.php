<!DOCTYPE html>
<?php 

include('../connection.php');
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
    header('location:../index.php');
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>EhKasiBata</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <!-- Optional Bootstrap theme -->
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <!-- JS
    ================================================== -->
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
    $('.dropdown-toggle').dropdown();
    function logout() {
    var txt;
    var r = confirm("Are you sure you want to logout?");
    if (r == true) {
        location.href='logout.php';
    }
};
    </script>
</head>
<body>
<div class = 'padd'>
    <div class="navbar navbar-inverse col-lg-12" role="navigation">
      <div class="navbar-header">
        <div class = 'col-lg-2'></div>
        <div class = 'col-lg-5'><a class="navbar-brand" href="index.php"><img src = '../images/logoliit.png' style = 'height:50px; width:260px; margin-top:-15px;'></a></div>
      </div>
    <div class="navbar-collapse collapse">
        <!-- Right nav -->
        <ul class="nav navbar-nav navbar-right">
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
    </div><!--/.nav-collapse -->
    </div>
</div>
    <div class = 'container'>
        <div class = 'col-lg-12 forbody' style = 'font-family:san'>
        <div class = 'col-lg-12' style = 'text-align:center'>
            <hr>
            <p style = 'font-family:san; font-size: 2em'><i>Chooose an option for your event to continue the process.</i></p>
            <hr>
        </div>
        <!--/ For COMBINATION -->
            <div class="col-lg-4 paper" style = 'text-align:center'>
                <div class = 'col-lg-12'>
                    <hr class = 'style-seven'>
                    <h3 style = 'margin-top: -27px; margin-bottom: 20px;'>Party Needs and Catering Services</h3>
                    <hr class = 'style-eight'>
                    <div class = 'bodyhere'>
                    <p style = 'font-size: 25px'>Select from party packages that we offer with food packages. This includes Tables and Chairs, Spoon and Fork, Balloons
                        and many more.</p>
                    </div>
                    <div class = 'footerhere'>
                    <a class = 'btn-success btn' style = 'width:100px; height:50px; font-size:20px' href = 'PNCS/information.php'>Proceed</a>
                    </div>
                </div>
            </div>
        <!--/ For PARTY NEEDS ONLY -->
            <div class="col-lg-4 paper" style = 'text-align:center'>
                <div class = 'col-lg-12'>
                    <hr class = 'style-seven'>
                    <h3 style = 'margin-top: -18px; margin-bottom: 38px;'>Party Needs Rental</h3>
                    <hr class = 'style-eight'>
                    <div class = 'bodyhere'>
                    <p style = 'font-size:25px;'>Choose your desired party needs for your event or just create your own list of items that you need.</p>
                    </div>
                    <div class = 'footerhere'>
                    <a class = 'btn-success btn' style = 'width:100px; height:50px; font-size:20px' href = 'PN/availreservation.php'>Proceed</a>
                    </div>
                </div>
            </div>
        <!--/ For CATERING ONLY -->
            <div class="col-lg-4 paper" style = 'text-align:center'>
                <div class = 'col-lg-12'>
                    <hr class = 'style-seven'>
                    <h3 style = 'margin-top: -18px; margin-bottom: 38px;'>Catering Services</h3>
                    <hr class = 'style-eight'>
                    <div class = 'bodyhere'>
                    <p style = 'font-size:25px;'>Choose your desired food package for your event.</p>
                    </div>
                    <div class = 'footerhere'>
                    <a class = 'btn-success btn' style = 'width:100px; height:50px; font-size:20px' href = 'Catering/availreservation.php'>Proceed</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>