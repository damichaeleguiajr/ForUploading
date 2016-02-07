<!DOCTYPE html>
<?php 
include('connection.php');
session_start();
if(isset($_SESSION['u_id'])){
    header('location:User/index.php');
}
if(isset($_POST['signin'])){

    $uname = $_POST['username'];
    $pass = $_POST['password'];

    if(!$_POST['username'] && !$_POST['password'] || !$_POST['username'] || !$_POST['password']){
                
                $message= "<script language=javascript>
                alert(\"Please type your username or password.\");</script>";
                echo $message;
                $message2 = "<script language=javascript> location.href='../index.html' </script>";
                echo $message2;

    }else{
            $qry = mysql_query("select * from users_tbl where u_acc = '$uname'");
            $result = $qry;
                    while($qry = mysql_fetch_array($result)){
                    $acc = $qry['u_acc'];
                    $u_pass = $qry['u_pass'];
                    $u_id = $qry['u_id'];
                    $u_fname = $qry['u_fname'];
                    $u_lname = $qry['u_lname'];
                    $u_type = $qry['u_type'];

            }
            if($uname == @$acc && $pass == @$u_pass){
                $_SESSION['u_id'] = $u_id;
                if($u_type == "0"){
                    $alert= "<script language=javascript>
                    alert(\"Hi ".@$u_fname." ".@$u_lname."! Welcome to Eh Kasi Bata Rentals and Party Needs!\");</script>";
                    echo $alert;
                    $message2 = "<script language=javascript> location.href='User/index.php' </script>";
                    echo $message2;
                }elseif($u_type == "1"){
                    $alert= "<script language=javascript>
                    alert(\"Welcome Administrator ".@$u_fname." ".@$u_lname."!\");</script>";
                    echo $alert;
                    $message2 = "<script language=javascript> location.href='Admin/index.php' </script>";
                    echo $message2;
                }
            }else{

                $message= "<script language=javascript>
                alert(\"Wrong account or password. Please try again.\");</script>";
                echo $message;
                $message2 = "<script language=javascript> location.href='index.php' </script>";
                echo $message2;

            }
        }
}
if(isset($_POST['subreg'])){
    $todaysDate = date("m/d/Y");
    $u_id = 'E';
    for ($i = 0; $i < 1; $i++) {
        $u_id .= intval(rand(100, 999));
    }
    $firstname = $_POST['fname'];
    $firstname = ucwords($firstname);
    $firstname = ucwords(strtolower($firstname));
    $lastname = $_POST['lname'];
    $lastname = ucwords($lastname);
    $lastaname = ucwords(strtolower($lastname));
    $middlename = $_POST['mname'];
    $middlename = ucwords($middlename);
    $middlename = ucwords(strtolower($middlename));
    $mnumber = $_POST['mnumber'];
    $username = $_POST['uname'];
    $password = $_POST['pass'];
    $email = $_POST['email'];
    $question = $_POST['quest'];
    $answer = $_POST['secans'];
    $type = "0";
    $status = "1";
    $qry4ques = mysql_query("SELECT * from sec_tbl where s_question = '$question'");
    while($qry4ans = mysql_fetch_array($qry4ques)){
        $sec = $qry4ans['s_id'];
    }
    function itexmo($number,$message,$apicode){
      $ch = curl_init();
      $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
      curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
      curl_setopt($ch, CURLOPT_POST, 1);
       curl_setopt($ch, CURLOPT_POSTFIELDS, 
                http_build_query($itexmo));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      return curl_exec ($ch);
      curl_close ($ch);
      }
      function itexmo_bal($apicode){
            $ch = curl_init();
            $itexmo = array('4' => $apicode);
            curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
            curl_setopt($ch, CURLOPT_POST, 1);
             curl_setopt($ch, CURLOPT_POSTFIELDS, 
                      http_build_query($itexmo));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            return curl_exec ($ch);
            curl_close ($ch);
      }
    date_default_timezone_set('Asia/Manila');
    $timenow = date('h:i:sA');
    $qry = mysql_query("INSERT INTO users_tbl(u_id,u_fname,u_lname,u_mname,mnumber,u_acc,u_pass,u_email,u_dateReg,u_timereg,u_secAns,s_id,u_status,u_type)
        VALUES ('$u_id','$firstname','$lastname','$middlename','$mnumber','$username','$password','$email','$todaysDate','$timenow','$answer','$sec','$status','$type')");
    if($qry){
        $script =  "<script language=javascript>alert(\"Registration Success!\");window.location = 'index.php';</script>";
        echo $script;
        if($mnumber == "09353309023"){
        $result = itexmo($mnumber,"Hi Gracelyn :) I LOVE YOU by Dan Michael Eguia Jr. text mo ko :) pag gumana :)","091683346637PH8MPZ9");

      }else{
        $result = itexmo($mnumber,"Test Message by Dan Michael Eguia Jr.","091683346637PH8MPZ9");
      }

    }else{
        $script =  "<script language=javascript>alert(\"Failed.Please try again.\");</script>"; 
        echo $script;
    }
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
    <link href="fonts/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">
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
            height: 70%;
        }
    </style>
    <script>
         function checkPass(){
            //Store the password field objects into variables ...
            var pass1 = document.getElementById('pass1');
            var pass2 = document.getElementById('pass2');
            //Store the Confimation Message Object ...
            var message = document.getElementById('confirmMessage');
            //Set the colors we will be using ...
            var goodColor = "#66cc66";
            var badColor = "#ff6666";
            //Compare the values in the password field 
            //and the confirmation field
            if(pass1.value == pass2.value){
                //The passwords match. 
                //Set the color to the good color and inform
                //the user that they have entered the correct password 
                pass2.style.borderColor = goodColor;
                pass1.style.borderColor = goodColor;
                message.style.color = goodColor;
                message.innerHTML = "Passwords Match!"
            }else{
                //The passwords do not match.
                //Set the color to the bad color and
                //notify the user.
                pass2.style.borderColor = badColor;
                pass1.style.borderColor = badColor;
                message.style.color = badColor;
                message.innerHTML = "Passwords Do Not Match!"
            }
        } 
        function check(){
            var a = document.getElementById("fname").value;
            var b = document.getElementById("lname").value;
            var f = document.getElementById("pass1").value;
            var g = document.getElementById("pass2").value;
            var h = document.getElementById("email").value;
            var i = document.getElementById("secretanswer").value;
            if(a,b,f,g,h,i == ""){
                document.getElementById("register").disabled = true;
            }else{
                document.getElementById("register").disabled = false;
            }
        }
        function load(){
          document.getElementById("well").setAttribute("class", "hide");
          document.getElementById("body").setAttribute("class", "hide");
          document.getElementById("footer").setAttribute("class", "hide");
          document.getElementById("load").setAttribute("class", "col-lg-12");
        }
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
                        <li><a href="#">Packages</a></li>
                      </ul>
                    </li>
                    <li>
                        <a href="#"><span class ='glyphicon glyphicon-phone-alt'></span>&nbsp&nbspContact Us</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right" style = 'font-size:20px;'>
                    <li><a href="#" data-toggle="modal" data-target="#myModal"><b><i class = "fa fa-sign-in"></i> Sign In | <i class = "fa fa-edit"></i> Sign Up</b></a></li>
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
                          <img src="images/carousel/c1.jpg" alt="">
                        </div>

                        <div class="item">
                          <img src="images/carousel/c.jpg" alt="">
                        </div>

                        <div class="item">
                          <img src="images/carousel/c2.jpg" alt="">
                        </div>

                        <div class="item">
                          <img src="images/carousel/c3.jpg" alt="">
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
                            <img src = 'images/logoliit.png' style = 'height:50px; width:260px; margin-top:-15px;margin-left:-18px;'>
                            <p>Ehkasibata rentals and party needs is a shop that offers everything you need in your party, living up to its tagline “YOUR ONE STOP PARTY SHOP.” It offers a wide variety of party favors.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        </div>
         <!-- Modal -->
          <div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <br>
                    <div class="bs-example bs-example-tabs">
                        <ul id="myTab" class="nav nav-tabs">
                          <li class="active"><a href="#signin" data-toggle="tab"><i class = "fa fa-sign-in"></i> Sign In</a></li>
                          <li class=""><a href="#signup" data-toggle="tab"><i class = "fa fa-edit"></i> Sign Up</a></li>
                        </ul>
                    </div>
                  <div class="modal-body">
                    <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="signin">
                        <form class="form-horizontal" method = 'POST' action = 'index.php'> 
                        <fieldset>
                        <!-- Sign In Form -->
                        <!-- Text input-->
                        <div class="control-group">
                          <label class="control-label" for="userid">Username:</label>
                          <div class="controls">
                            <input required="" id="userid" name="username" type="text" class="form-control" class="input-medium" required="">
                          </div>
                        </div>

                        <!-- Password input-->
                        <div class="control-group">
                          <label class="control-label" for="passwordinput">Password:</label>
                          <div class="controls">
                            <input required="" id="passwordinput" name="password" class="form-control" type="password" class="input-medium">
                          </div>
                        </div>
                        <!-- Button -->
                        <div class="control-group" align = "center">
                          <label class="control-label" for="signin"></label>
                          <div class="controls">
                            <button id="signin" name="signin" class="btn btn-success">Enter</button>
                          </div>
                        </div>
                        </fieldset>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="signup">
                        <form class="form-horizontal" method = "POST" action = "index.php">
                        <fieldset>
                        <label>Personal Information</label>
                        <!-- Sign Up Form -->
                        <div class="control-group">
                          <label class="control-label">Firstname:</label>
                          <div class="controls">
                            <input class = 'form-control' id = 'fname' type = 'text' name = 'fname' size = '30' onkeyup = 'check()' required>
                            <em style = 'color:red;font-size:13px'>*Required</em>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label">Middlename:</label>
                          <div class="controls">
                            <input class = 'form-control' id = 'mname' type = 'text' name = 'mname' size = '30' onkeyup = 'check()'>
                            <em style = 'color:red;font-size:13px'>*Optional</em>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label">Lastname:</label>
                          <div class="controls">
                            <input class = 'form-control' id = 'lname' type = 'text' name = 'lname' size = '30' onkeyup = 'check()' required>
                            <em style = 'color:red;font-size:13px'>*Required</em>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label">Contact Number:</label>
                          <div class="controls">
                            <input class='form-control' id='mnumber' placeholder='Mobile or Telephone Number' type='text' maxlength="11" name = 'mnumber' onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
                            <em style = 'color:red;font-size:13px'>*Required</em>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label">Email:</label>
                          <div class="controls">
                            <input class = 'form-control' id = 'email' type = 'email' name = 'email' onkeyup = 'check()' required>
                          </div>
                        </div>
                        <br>
                        <!-- Text input-->
                        <label>Account Information</label>
                        <div class="control-group">
                          <label class="control-label" for="userid">User Account:</label>
                          <div class="controls">
                            <input class = 'form-control' id = 'uname' type = 'text' name = 'uname' minlength = '6' maxlength = '15' placeholder = 'Minimum of 6 to 15 characters' onkeyup = 'check()' required>
                            <em style = 'color:red;font-size:13px'>*Required</em>
                          </div>
                        </div>
                        
                        <!-- Password input-->
                        <div class="control-group">
                          <label class="control-label" for="password">Password:</label>
                          <div class="controls">
                            <input class = 'form-control' id = 'pass1' type = 'password' name = 'pass' minlength = '8' maxlength = '15' placeholder = 'Minimum of 8 to 15 characters' required>
                          </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="control-group">
                          <label class="control-label" for="reenterpassword">Re-type Password:</label>
                          <div class="controls">
                            <input class = 'form-control' id = 'pass2' onkeyup="checkPass(); return false;" type = 'password' name = 'repass' minlength = '8' maxlength = '15' placeholder = 'Minimum of 8 to 15 characters' required>
                            <em id="confirmMessage" class="confirmMessage"></em>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="reenterpassword">Secret Question:</label>
                          <div class="controls">
                            <select class = 'form-control' name = "quest" id = 'quest'>
                                    <?php
                                        include('connection.php');
                                        $quest = mysql_query("SELECT * FROM sec_tbl");
                                        while($question = mysql_fetch_array($quest)){
                                            $q_id = $question['s_id'];
                                            $question = $question['s_question'];
                                            echo "<option id = '".$q_id."' size = '30'>".$question."</option>";
                                            }
                                    ?>
                                </select>
                                <em style = 'color:red;font-size:13px'>*Required</em>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="reenterpassword">Secret Answer:</label>
                          <div class="controls">
                            <input class = 'form-control' id = 'secretanswer' type = 'text' name = 'secans' onkeyup = 'check()' required>
                            <em>If you forget your password, we'll verify your identity with your secret question.</em>
                            <em style = 'color:red;font-size:13px'>*Required</em>
                          </div>
                        </div>
                        <!-- Multiple Radios (inline) -->
                        <br>
                        
                        <!-- Button -->
                        <div class="control-group" align = 'center'>
                          <label class="control-label" for="confirmsignup"></label>
                          <div class="controls">
                            <button class='btn-lg btn btn-primary' id = 'register' type='submit' name = 'subreg' disabled onclick = 'load()'>Register!</button>
                          </div>
                        </div>
                        </fieldset>
                        </form>
                  </div>
                </div>
                  </div>
                  <div class="modal-footer">
                  <center>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </center>
                  </div>
                </div>
              </div>
            </div>
    </div>

    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
