<!DOCTYPE html>
<?php 
include('connection.php');
session_start();
if(isset($_SESSION['u_id'])){
    header('location:User/index.php');
}
if(isset($_GET['subreg'])){

    $todaysDate = date("m/d/Y");
    $u_id = 'E';
    for ($i = 0; $i < 1; $i++) {
        $u_id .= intval(rand(100, 999));
    }
    $firstname = $_GET['fname'];
    $firstname = ucwords($firstname);
    $firstname = ucwords(strtolower($firstname));
    $lastname = $_GET['lname'];
    $lastname = ucwords($lastname);
    $lastaname = ucwords(strtolower($lastname));
    $middlename = $_GET['mname'];
    $middlename = ucwords($middlename);
    $middlename = ucwords(strtolower($middlename));
    $mnumber = $_GET['mnumber'];
    $address = $_GET['street'].", ".$_GET['barangay'].", ".$_GET['city'];
    $address = ucwords($address);
    $address = ucwords(strtolower($address));
    $username = $_GET['uname'];
    $password = $_GET['pass'];
    $email = $_GET['email'];
    $question = $_GET['quest'];
    $answer = $_GET['secans'];
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
    sleep(5);
    $qry = mysql_query("INSERT INTO users_tbl(u_id,u_fname,u_lname,u_mname,u_address,mnumber,u_acc,u_pass,u_email,u_dateReg,u_timereg,u_secAns,s_id,u_status,u_type)
        VALUES ('$u_id','$firstname','$lastname','$middlename','$address','$mnumber','$username','$password','$email','$todaysDate','$timenow','$answer','$sec','$status','$type')");
    if($qry){
        $script =  "<script language=javascript>alert(\"Registration Success!\");</script>"; 
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
        <!-- HEADER -->
        <div class="col-lg-12" align = 'center'>
        <br>
        <h2>Your request is processing</h2>
        <img src = 'img/loading.gif'>
        <h2>Please wait ...</h2>
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
