<!DOCTYPE html>
<!DOCTYPE html>
<?php 
include('connection.php');
session_start();
if(isset($_SESSION['u_id'])){
    header('location:User/index.php');
}
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EhKasiBata-About Us</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">

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
                <a class="navbar-brand" href="index.php"><img src = 'images/logoliit.png' style = 'height:50px; width:260px; margin-top:-15px;margin-left:-18px;'></a>
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
                        <li><a href="services.php">Services</a></li>
                        <li><a href="rates.php">Rates</a></li>
                        <li><a href="packages.php">Packages</a></li>
                      </ul>
                    </li>
                    <li>
                        <a href="#"><span class ='glyphicon glyphicon-phone-alt'></span>&nbsp&nbspContact Us</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right" style = 'font-size:20px;'>
                    <li><a href="register.php"><b>Register</b></a></li>
                    <li class = 'divider'>
                    <li><a href="#" data-toggle="modal" data-target="#myModal"><b>Login</b></a></li>
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
            <img src = 'images/banner.png' style = 'width: 100%;'>
        </header>
        <div class = 'well'>
            <h3><span class ='glyphicon glyphicon-hand-right'>&nbsp</span>ABOUT US&nbsp&nbsp&nbsp<span class ='glyphicon glyphicon-hand-left'></span></h3>
        </div>
        <div class = 'col-lg-12 well1'>
            <div class="row">
                <div class="col-lg-6">
                    <div class="thumbnail">
                        <img src="images/ehkasi.jpg">
                        <h4 class="pull-right">77 Stotsenburg St. 10th Ave Caloocan</h4>
                        <h4>EhKasiBata Shop</h4>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h1 style = 'font-size: 60px;'><b>Eh Kasi Bata</b></h1>
                        <p align="justify">Ehkasibata rentals and party needs is a shop that offers everything you need in your party, living up to its tagline “YOUR ONE STOP PARTY SHOP.” It offers a wide variety of party favors like balloons, tarpulins and toys. it also offers services like catering, balloon decorations, flower arrangements and entertainment (clowns, magicians, facepaint, mascot).The business started early 2006 by its owner REMOR AYDEE FLORES. He started with rentals of chairs and tables targeting customers who wants DIY party.</p>
                </div>
            </div>
            <div class="row">
                    <p align="justify">His market grew bigger and bigger so he added more to his product line to cope up with the rapid changes on the needs of his customers. Now he also offers for rent machines like chocolate fountain., bubble machines, sound system, lights, foodcart and catering utensils. He already have avid caterer clients like pink heaven, smej catering, mama virings and aces, who regularly rents catering equipments for their catering setup.If there`s one thing EHKASIBATA is well known for, it is its balloon decorations setup.</p></br>
                    <p> It offers affordable balloon decoration packages that will give color and life to your party. We adjust to the customer`s needs and budget without compromising the quality of the service. It started only to CAMANAVA area and expanded all over metro manila. and just recently, EHKASIBATA now also offer balloon decoration services to nearby provinces, expanding its means to accommodate more market. Among its valuable clients for balloon decoration service are University of santo tomas (UST), Teleperformance, Contact IMC, University of the East (UE), Red cross, Nails, Glow and Floresco Funerals. As focus as it is large companies. It also gives the same value to small scale customers. Because more than profit, EHKASIBATA Aims for full customer satisfaction, the secret why it stayed in the business for so long.</p></br>
                    <p>Late 2012, EHKASIBATA started venturing also to catering services giving its customer a more hassle free party. Included in its catering package are the full setup of the venue, balloon decorations, food and drinks, food attendants and complete catering utensils. Its cost is lower than other caterers because it doesn`t charge service free. Transportation and other miscellaneous fee. Since it touches the food industry already. It decided to include in its productline cakes, cupcakes and chocolate lollies making it really your one stop party shop.</p>  
            </div>
            <hr>
        </div>
        <!-- Title -->
        
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="col-lg-12 well1">
                <div class"col-lg-12">
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <label><span class ='glyphicon glyphicon-user'></span>&nbsp&nbspEdliana Bautista</label><br>
                            <label><span class ='glyphicon glyphicon-phone-alt'></span>&nbsp&nbspContact Number</label><br>
                            <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMobile: 09155645157,  09236821390<br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbspTelephone: 3767506, 9852022</p>
                            <label><span class ='glyphicon glyphicon-globe'></span>&nbsp&nbspjhanatot@gmail.com</label><br>
                            <label><span class ='glyphicon glyphicon-home'></span>&nbsp&nbspAlong 10th Avenue, Across Max's Restaurant</label>

                        </div>
                        <div class="col-lg-6" style="text-align:center">
                            <img src = 'images/logoliit.png' style = 'height:50px; width:260px; margin-top:-15px;margin-left:-18px;'>
                            <p>Ehkasibata rentals and party needs is a shop that offers everything you need in your party, living up to its tagline “YOUR ONE STOP PARTY SHOP.” It offers a wide variety of party favors.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
