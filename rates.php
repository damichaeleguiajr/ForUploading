<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EhKasiBata</title>

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
            <h3><span class ='glyphicon glyphicon-hand-right'>&nbsp</span>YOUR ONE STOP PARTY SHOP&nbsp&nbsp&nbsp<span class ='glyphicon glyphicon-hand-left'></span></h3>
        </div>
        <div class = 'col-lg-12'>
        <div class = 'row'>
            <div class="row">
                 <div class="col-md-3">
                     <div class="thumbnail">
                            <img src="img/irate/kiddietbl.png">
                            <div class="caption">
                                <h4 class="pull-right">₱30.00</h4>
                                <h4><a href="#">Kiddie Table</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/kiddiechr.png">
                            <div class="caption">
                                <h4 class="pull-right">₱5.00</h4>
                                <h4><a href="#">Kiddie Chair</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/atable.png">
                            <div class="caption">
                                <h4 class="pull-right">₱50.00</h4>
                                <h4><a href="#">Adult Table</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-md-3">
                     <div class="thumbnail">
                            <img src="img/irate/achair.png">
                            <div class="caption">
                                <h4 class="pull-right">₱7.00</h4>
                                <h4><a href="#">Adult Chair</a>
                                </h4>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/longtbl.jpg">
                            <div class="caption">
                                <h4 class="pull-right">₱60.00</h4>
                                <h4><a href="#">Long Table</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/buffetbl.jpg">
                            <div class="caption">
                                <h4 class="pull-right">₱110.00</h4>
                                <h4><a href="#">Buffet Table</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-md-3">
                     <div class="thumbnail">
                            <img src="img/irate/kiddyset.jpg">
                            <div class="caption">
                                <h4 class="pull-right">₱40.00</h4>
                                <h4><a href="#">Kiddy Set</a></h4>
                                <h4 class="pull-right">₱70.00</h4>
                                <h4><a href="#">Adult Set</a></h4>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/roundtbl4.jpg">
                            <div class="caption">
                                <h4 class="pull-right">₱70.00</h4>
                                <h4><a href="#">Round Table(4)</a>
                                </h4>
                                <h4 class="pull-right">₱90.00</h4>
                                <h4><a href="#">Round Set(4)</a>
                                </h4>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/roundtbl8.jpg">
                            <div class="caption">
                                <h4 class="pull-right">₱130.00</h4>
                                <h4><a href="#">Round Table(8)</a>
                                </h4>
                                <h4 class="pull-right">₱180.00</h4>
                                <h4><a href="#">Round Set(8)</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-md-3">
                     <div class="thumbnail">
                            <img src="img/irate/tblcloth.png">
                            <div class="caption">
                                <h4 class="pull-right">₱20.00</h4>
                                <h4><a href="#">Table Cloth</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/seatcov.png">
                            <div class="caption">
                                <h4 class="pull-right">₱15.00</h4>
                                <h4><a href="#">Seat Cover</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/skirting.jpg">
                            <div class="caption">
                                <h4 class="pull-right">₱15.00</h4>
                                <h4><a href="#">Skirting</a>
                                </h4>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                     <div class="thumbnail">
                            <img src="img/irate/ribbon.png">
                            <div class="caption">
                                <h4 class="pull-right">₱5.00</h4>
                                <h4><a href="#">Ribbon</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/foodwarmer.png">
                            <div class="caption">
                                <h4 class="pull-right">₱80.00</h4>
                                <h4><a href="#">Food Warmer (Small)</a>
                                </h4>
                                <h4 class="pull-right">₱120.00</h4>
                                <h4><a href="#">Food Warmer (Big)</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/plate.png">
                            <div class="caption">
                                <h4 class="pull-right">₱8.00</h4>
                                <h4><a href="#">Plate</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-md-3">
                     <div class="thumbnail">
                            <img src="img/irate/glass.png">
                            <div class="caption">
                                <h4 class="pull-right">₱5.00</h4>
                                <h4><a href="#">Glass</a>
                                </h4>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/spoonfork.png">
                            <div class="caption">
                                <h4 class="pull-right">₱4.00</h4>
                                <h4><a href="#">Spoon Fork</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/goblet.png">
                            <div class="caption">
                                <h4 class="pull-right">₱10.00</h4>
                                <h4><a href="#">Goblet</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-md-3">
                     <div class="thumbnail">
                            <img src="img/irate/soupbowl.png">
                            <div class="caption">
                                <h4 class="pull-right">₱4.00</h4>
                                <h4><a href="#">Soup Bowl</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/platito.png">
                            <div class="caption">
                                <h4 class="pull-right">₱4.00</h4>
                                <h4><a href="#">Platito</a>
                                </h4>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/pitcher.png">
                            <div class="caption">
                                <h4 class="pull-right">₱15.00</h4>
                                <h4><a href="#">Pitcher</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-md-3">
                     <div class="thumbnail">
                            <img src="img/irate/beertower.png">
                            <div class="caption">
                                <h4 class="pull-right">₱150.00</h4>
                                <h4><a href="#">Beer Tower</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/chocofountain.png">
                            <div class="caption">
                                <h4 class="pull-right">₱500.00</h4>
                                <h4><a href="#">Chocolate Fountain</a>
                                </h4>
                                <h4 class="pull-right">₱800.00</h4>
                                <h4><a href="#">Chocolate Fountain w/Chocolate</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/tarpulin.jpg">
                            <div class="caption">
                                <h4 class="pull-right">₱300.00</h4>
                                <h4><a href="#">Tarpulin (2x3)/a>
                                </h4>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                     <div class="thumbnail">
                            <img src="img/irate/bubblemachine.png">
                            <div class="caption">
                                <h4 class="pull-right">₱300.00</h4>
                                <h4><a href="#">Bubble Machine</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/discolight.png">
                            <div class="caption">
                                <h4 class="pull-right">₱100.00</h4>
                                <h4><a href="#">Disco Light</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/clown.png">
                            <div class="caption">
                                <h4 class="pull-right">₱600.00</h4>
                                <h4><a href="#">Clown</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-md-3">
                     <div class="thumbnail">
                            <img src="img/irate/mascot.jpg">
                            <div class="caption">
                                <h4 class="pull-right">₱3000.00</h4>
                                <h4><a href="#">Mascot</a>
                                </h4>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/magician.jpg">
                            <div class="caption">
                                <h4 class="pull-right">₱4000.00</h4>
                                <h4><a href="#">Magician</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/facepaint.png">
                            <div class="caption">
                                <h4 class="pull-right">₱1800.00</h4>
                                <h4><a href="#">Face Paint</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-md-3">
                     <div class="thumbnail">
                            <img src="img/irate/waiter.jpg">
                            <div class="caption">
                                <h4 class="pull-right">₱600.00</h4>
                                <h4><a href="#">Waiter</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/icecream.png">
                            <div class="caption">
                                <h4 class="pull-right">₱3000.00</h4>
                                <h4><a href="#">Ice Cream</a>
                                </h4>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/cottoncandy.png">
                            <div class="caption">
                                <h4 class="pull-right">₱1400.00</h4>
                                <h4><a href="#">Cotton Candy</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-md-3">
                     <div class="thumbnail">
                            <img src="img/irate/vcoverage.jpg">
                            <div class="caption">
                                <h4 class="pull-right">₱4000.00</h4>
                                <h4><a href="#">Video Coverage</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/photo&video.jpg">
                            <div class="caption">
                                <h4 class="pull-right">₱8000.00</h4>
                                <h4><a href="#">Photo & Video</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/balloonsbig.jpg">
                            <div class="caption">
                                <h4 class="pull-right">₱40.00</h4>
                                <h4><a href="#">Balloon (Big)</a>
                                </h4>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                     <div class="thumbnail">
                            <img src="img/irate/balloonsmall.jpg">
                            <div class="caption">
                                <h4 class="pull-right">₱13.00</h4>
                                <h4><a href="#">Balloon (Small)</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/phats.png">
                            <div class="caption">
                                <h4 class="pull-right">₱4.00</h4>
                                <h4><a href="#">Party Hats</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/banner.jpg">
                            <div class="caption">
                                <h4 class="pull-right">₱35.00</h4>
                                <h4><a href="#">Banner</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-md-3">
                     <div class="thumbnail">
                            <img src="img/irate/invitation.jpg">
                            <div class="caption">
                                <h4 class="pull-right">₱35.00</h4>
                                <h4><a href="#">Invitation (12pcs)</a>
                                </h4>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/pabitinwtoys.jpg">
                            <div class="caption">
                                <h4 class="pull-right">₱300.00</h4>
                                <h4><a href="#">Pabitin w/Toys</a>
                                </h4>
                                <h4 class="pull-right">₱50.00</h4>
                                <h4><a href="#">Pabitin w/o Toys</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/soundsystem.png">
                            <div class="caption">
                                <h4 class="pull-right">₱1500.00</h4>
                                <h4><a href="#">Sound System</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-md-3">
                     <div class="thumbnail">
                            <img src="img/irate/photobooth.png">
                            <div class="caption">
                                <h4 class="pull-right">₱4000.00</h4>
                                <h4><a href="#">Photo Booth</a>
                                </h4>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">
                     <div class="thumbnail">
                            <img src="img/irate/balloondecor.jpg">
                            <div class="caption">
                                <h4 class="pull-right">₱4000.00</h4>
                                <h4><a href="#">Balloon Decor</a>
                                </h4>
                            </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
        <!-- /.row -->
        <hr>
        <!-- Page Features -->
        
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
        <hr>
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
         <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Login</h3>
                </div>
                <div class="modal-body">
                    <form action = 'PHP/login.php' method = 'POST'>
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" id = 'account' name = 'username'><br>
                        <input type="password" class="form-control" placeholder="Password" id = 'password' name = 'password'>
                        <label style = 'font-size:15px;float:right'>Don't have account?<a href = 'register.php'><label>Click here!</label></a>
                      </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-success" name="submit">Login</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
    </div>

    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
