<!DOCTYPE html>
<?php 
include('connection.php');
session_start();
if(isset($_SESSION['u_id'])){
    header('location:User/index.php');
}
if(isset($_POST['subreg'])){
    sleep(5);
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
    $address = $_POST['street'].", ".$_GET['barangay'].", ".$_GET['city'];
    $address = ucwords($address);
    $address = ucwords(strtolower($address));
    $username = $_POST['uname'];
    $password = $_POST['pass'];
    $email = $_GET['email'];
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
    $qry = mysql_query("INSERT INTO users_tbl(u_id,u_fname,u_lname,u_mname,u_address,mnumber,u_acc,u_pass,u_email,u_dateReg,u_timereg,u_secAns,s_id,u_status,u_type)
        VALUES ('$u_id','$firstname','$lastname','$middlename','$address','$mnumber','$username','$password','$email','$todaysDate','$timenow','$answer','$sec','$status','$type')");
    if($qry){
        $script =  "<script language=javascript>alert(\"Registration Success!\");window.location = 'register.php';</script>";
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
    <script>
        function reload(){
            img = document.getElementById("refresh");
            img.src="PHP/generatecap.php?rand_number=" + Math.random();
        }
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
                message.style.color = goodColor;
                message.innerHTML = "Passwords Match!"
            }else{
                //The passwords do not match.
                //Set the color to the bad color and
                //notify the user.
                pass2.style.borderColor = badColor;
                message.style.color = badColor;
                message.innerHTML = "Passwords Do Not Match!"
            }
        } 
        function check(){
            var a = document.getElementById("fname").value;
            var b = document.getElementById("lname").value;
            var c = document.getElementById("street").value;
            var d = document.getElementById("barangay").value;
            var e = document.getElementById("city").value;
            var f = document.getElementById("pass1").value;
            var g = document.getElementById("pass2").value;
            var h = document.getElementById("email").value;
            var i = document.getElementById("secretanswer").value;
            if(a,b,c,d,e,f,g,h,i == ""){
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
                        <a href="index.html"><span class ='glyphicon glyphicon-home'></span>&nbsp&nbspHome</a>
                    </li>
                    <li>
                        <a href="About Us.html"><span class ='glyphicon glyphicon-user'></span>&nbsp&nbspAbout Us</a>
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
                </ul>
                <ul class="nav navbar-nav navbar-right" style = 'font-size:20px;'>
                    <li><a href="#"><b>Register</b></a></li>
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
    <br>
        <div class="col-lg-12 hide" align = 'center' id = 'load'>
        <br>
        <h2>Your request is processing</h2>
        <img src = 'img/loading.gif'>
        <h2>Please wait ...</h2>
        </div>
        <!-- HEADER -->
        <div class = 'well' id = 'well'>
            <h3><span class ='glyphicon glyphicon-hand-right'>&nbsp</span>Registration&nbsp&nbsp&nbsp<span class ='glyphicon glyphicon-hand-left'></span></h3>
        </div>
        <!-- HEADER -->
        <div class="col-lg-12" align = 'center' id = 'body'>
        <br>
            <div style = 'font-size:20px' align = 'center'>
                      <div class='panel-heading'>
                        <h3>Personal Information</h3>
                      </div>
                      <hr>
                      <div class=''>
                        <form class='form-horizontal' role='form' action = 'register.php' method = 'GET'>
                          <div class='form-group'>
                            <label class='control-label col-md-3 col-md-offset-2' for='firstname'>Firstname</label>
                            <div class='col-md-3'>
                              <input class = 'form-control' id = 'fname' type = 'text' name = 'fname' size = '30' onkeyup = 'check()' required>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label class='control-label col-md-3 col-md-offset-2' for='middlename'>Middlename</label>
                            <div class='col-md-3'>
                              <input class = 'form-control' id = 'mname' type = 'text' name = 'mname' size = '30'>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label class='control-label col-md-3 col-md-offset-2' for='lastname'>Lastname</label>
                            <div class='col-md-3'>
                              <input class = 'form-control' id = 'lname' type = 'text' name = 'lname' size = '30' onkeyup = 'check()' required>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label class='control-label col-md-3 col-md-offset-2' for='contact'>Contact Number</label>
                            <div class='col-md-6'>
                              <div class='form-group internal'>
                                <div class='col-md-6'>
                                  <input class='form-control' id='mnumber' placeholder='Mobile: 09x - xxxx xxxx' type='text' maxlength="11" name = 'mnumber' onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label class='control-label col-md-3 col-md-offset-2' for='venue'>Address</label>
                            <div class='col-md-6'>
                              <div class='form-group'>
                                <div class='col-md-6'>
                                  <input class='form-control' id='street' placeholder='Street Address' type='text' onkeyup = 'check()' name = 'street'>
                                </div>
                              </div>
                              <div class='form-group'>
                                <div class='col-md-6'>
                                  <input class='form-control' id='barangay' placeholder='Barangay' type='text' onkeyup = 'check()' name = 'barangay'>
                                </div>
                              </div>
                              <div class='form-group internal'>
                                <div class='col-md-6'>
                                  <input class='form-control' id='city' placeholder='City' type='text' onkeyup = 'check()' name = 'city'>
                                </div>
                              </div>
                            </div>
                          </div>
                          <hr>
                          <div class='panel-heading'>
                            <h3>Account Information</h3>
                          </div>
                          <hr>
                          <div class='form-group'>
                            <label class='control-label col-md-3 col-md-offset-2' for='username'>User Account</label>
                            <div class='col-md-3'>
                              <input class = 'form-control' id = 'uname' type = 'text' name = 'uname' minlength = '6' maxlength = '15' placeholder = 'Minimum of 6 to 15 characters' onkeyup = 'check()' required>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label class='control-label col-md-3 col-md-offset-2' for='password'>Password</label>
                            <div class='col-md-3'>
                              <input class = 'form-control' id = 'pass1' type = 'password' name = 'pass' minlength = '8' maxlength = '15' placeholder = 'Minimum of 8 to 15 characters' required>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label class='control-label col-md-3 col-md-offset-2' for='repass'>Re-type Password</label>
                            <div class='col-md-3'>
                              <input class = 'form-control' id = 'pass2' onkeyup="checkPass(); return false;" type = 'password' name = 'repass' minlength = '8' maxlength = '15' placeholder = 'Minimum of 8 to 15 characters' required>
                              <span id="confirmMessage" class="confirmMessage"></span>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label class='control-label col-md-3 col-md-offset-2' for='email'>E-mail Address</label>
                            <div class='col-md-3'>
                              <input class = 'form-control' id = 'email' type = 'email' name = 'email' onkeyup = 'check()' required>
                            </div>
                          </div>
                          <hr>
                          <div class='form-group'>
                            <label class='control-label col-md-3 col-md-offset-2' for='squestion'>Secret Question</label>
                            <div class='col-md-5'>
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
                            </div>
                          </div>
                          <div class='form-group'>
                            <label class='control-label col-md-3 col-md-offset-2' for='firstname'>Secret Answer</label>
                            <div class='col-md-5'>
                              <input class = 'form-control' id = 'secretanswer' type = 'text' name = 'secans' onkeyup = 'check()' required>
                              <span style = 'font-size:19px'>If you forget your password, we'll verify your identity with your secret question.</span>
                            </div>
                          </div>
                          <div class='form-group'>
                            <div class='col-md-offset-4 col-md-4'>
                              <button class='btn-lg btn btn-primary' id = 'register' type='submit' name = 'subreg' disabled onclick = 'load()'>Register!</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
        </div>
        <div class="col-lg-12" id = 'footer'>
        <hr>
        <!-- Footer -->
        <footer>
            <div class="col-lg-12">
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
    </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
