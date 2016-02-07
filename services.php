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
    <div class="container jumbotron forbody well1">

        <!-- Jumbotron Header -->
        <header class = 'page-header'>
            <img src = 'images/banner.png' style = 'width: 100%;'>
        </header>
        <div class = 'well'>
            <h3><span class ='glyphicon glyphicon-hand-right'>&nbsp</span>YOUR ONE STOP PARTY SHOP&nbsp&nbsp&nbsp<span class ='glyphicon glyphicon-hand-left'></span></h3>
        </div>
        <div class = 'row'>
         <div class="col-lg-3">
                <div class="list-group">
                    <a href="audiovisual.html" class="list-group-item active">Audio Visuals</a>
                    <a href="pvcoverage.html" class="list-group-item">Photo/Video Coverage</a>
                    <a href="entertainment.html" class="list-group-item">Entertainment</a>
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

        </div>

        <!-- /.row -->
        <hr>
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
