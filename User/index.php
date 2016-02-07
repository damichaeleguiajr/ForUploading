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
                        <li><a href="profile.php">Profile</a></li>
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

        <!-- Jumbotron Header -->
        <header class = 'page-header'>
            <img src = '../images/banner.png' style = 'width: 100%;'>
        </header>
            <div class = 'well'>
            <h3><span class ='glyphicon glyphicon-hand-right'>&nbsp</span>YOUR ONE STOP PARTY SHOP&nbsp&nbsp&nbsp<span class ='glyphicon glyphicon-hand-left'></span></h3>
            </div>
        <div class = 'col-lg-12'>
        <div class = 'row well1'>
        <!--Carousel-->
            <div class = 'col-lg-8'>
                    <div id="myCarousel" class="carousel slide forcarousel" data-ride="carousel" style = 'width:100%;height:450px;'>
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                      </ol>

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox" style = 'height:100%'>
                        <div class="item active">
                          <img src="../images/carousel/c1.jpg" alt="">
                        </div>

                        <div class="item">
                          <img src="../images/carousel/c.jpg" alt="">
                        </div>

                        <div class="item">
                          <img src="../images/carousel/c2.jpg" alt="">
                        </div>

                        <div class="item">
                          <img src="../images/carousel/c3.jpg" alt="">
                        </div>
                      </div>

                      <!-- Left and right controls -->
                      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                </div><!-- Carousel -->
                <div class = 'col-lg-4'>
                <h1 style = 'font-size: 50px;font-family: KB'><b>Eh Kasi Bata</b></h1>
                    <p>Ehkasibata rentals and party needs is a shop that offers everything you need in your party, living up to its tagline “YOUR ONE STOP PARTY SHOP.” It offers a wide variety of party favors like balloons, tarpulins and toys. it also offers services like catering, balloon decorations, flower arrangements and entertainment (clowns, magicians, facepaint, mascot).</p>
                </div>
        </div>
        <!-- /.row -->
        <hr>
        <!-- Page Features -->
        <div class="col-lg-12 text-center">
        <br>
            <div class="col-md-4 col-sm-8 hero-feature">
                <div class="thumbnail">
                    <h2><b><i class = 'fa fa-bullhorn'></i> Announcements <i class = 'fa fa-exclamation'></i></b></h2>
                    <hr>
                    <div class="caption">
                        <h3>No announcements yet</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-default">View All</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-8 hero-feature">
                <div class="thumbnail">
                    <h2><b><i class = 'fa fa-thumbs-o-up'></i> Tipid Packages</b></h2>
                    <hr>
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-8 hero-feature">
                <div class="thumbnail">
                    <h2><b><i class = 'fa fa-calendar-check-o'></i> Upcoming Events</b></h2>
                    <hr>
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-default">View All</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->

        

        <!-- Footer -->
        <footer>
            <div class="col-lg-12 well1">
                <hr>
                <div class"row">
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <label><span class ='glyphicon glyphicon-user'></span>&nbsp&nbspEdliana Bautista</label><br>
                            <label><span class ='glyphicon glyphicon-phone-alt'></span>&nbsp&nbspContact Number</label><br>
                            <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMobile: 09155645157,  09236821390<br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbspTelephone: 3767506, 9852022</p>
                            <label><span class ='glyphicon glyphicon-globe'></span>&nbsp&nbspjhanatot@gmail.com</label><br>
                            <label><span class ='glyphicon glyphicon-home'></span>&nbsp&nbspAlong 10th Avenue, Across Max's Restaurant</label>

                        </div>
                        <br>
                        <div class="col-lg-6" style="text-align:center">
                            <img src = '../images/logoliit.png' style = 'height:50px; width:260px; margin-top:-15px;margin-left:-18px;'>
                            <p>Ehkasibata rentals and party needs is a shop that offers everything you need in your party, living up to its tagline “YOUR ONE STOP PARTY SHOP.” It offers a wide variety of party favors.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <?php

        if(mysql_num_rows($checkpay)>0){
            $alert= "<script language=javascript>
                    var ask = confirm(\"Your request has been approve. View it now?\");
                    if(ask==true){
                      window.location.href = 'myreservations.php';
                    }
                    </script>";
              usleep(1000000);
              echo $alert;
        }
        ?>
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
