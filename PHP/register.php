<!DOCTYPE html>
<?php 

include('connection.php');
session_start();
if(isset($_POST['submit'])){

    $uname = $_POST['username'];
    $pass = $_POST['password'];

            $qry = mysql_query("select * from users_tbl where u_acc = '$uname'");
            $result = $qry;
                    while($qry = mysql_fetch_array($result)){
                    $_SESSION['account'] = $qry['u_acc'];
                    $_SESSION['user_id'] = $qry['u_id'];
                    $u_pass = $qry['u_pass'];
            }
    if($uname == $_SESSION['account']){

        echo "galing";

    }
    else{
        echo "tanga";
    }
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>EhKasiBata</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!-- Optional Bootstrap theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <!-- JS
    ================================================== -->
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/jquery-1.11.3.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript">
    function reload(){
    img = document.getElementById("refresh");
    img.src="generatecap.php?rand_number=" + Math.random();
}
</script>
</head>
<body>
<div class = 'padd'>
    <div class="navbar navbar-inverse navbar-static-top col-lg-12" role="navigation">
      <div class="navbar-header">
        <div class = 'col-lg-2'></div>
        <div class = 'col-lg-5'><a class="navbar-brand" href="../index.php"><img src = 'images/logoliit.png' style = 'height:50px; width:260px; margin-top:-15px;'></a></div>
      </div>
    <div class="navbar-collapse collapse">
        <!-- Right nav -->
        <ul class="nav navbar-nav navbar-right">
         <form class="navbar-form navbar-left" name = 'login' id = 'myFunction()' action = 'index.php' method = 'POST'>
          <div class="form-group">
            Don't have account?<a href = ''><label>Click here!</label></a>
            <input type="text" class="form-control" placeholder="Username" id = 'account' name = 'username'>
            <input type="password" class="form-control" placeholder="Password" id = 'password' name = 'password'>
          </div>
          <button type="submit" class="btn btn-default" name = 'submit'>Login</button>
        </form>
        </ul>
    </div><!--/.nav-collapse -->
    </div>
</div>
    <div class = 'container'>
        <img class = 'left' src = 'images/banner.png' style = 'width: 100%;'>
        <nav class="navbar navbar-eto">
          <div class="container-fluid">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navhome navbar-nav navbar-left fontsize">
                <li><a href="#">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Utilities</a></li>
                <li><a href="#">About Us</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        <div class = 'col-lg-12 forbody'>
            <div class = 'col-lg-12 foruserregistration'>
            <h2>User Registration</h2>
            </div>
            <div class = 'col-lg-12 padding-bot fontbottom'>
                <div class = 'col-lg-6'>
                    <div class = 'col-lg-12'>
                        <label><h2>User Information</h2></label>
                    </div>
                    <div class = 'col-lg-12'>
                    
                        <table>
                            <tr>
                                <td class = 'registration'>Firstname: </td>
                                <td class = 'registration'><input type = 'text'></td>
                            </tr>
                            <tr>
                                <td class = 'registration'>Middlename: </td>
                                <td class = 'registration'><input type = 'text'></td>
                            </tr>
                            <tr>
                                <td class = 'registration'>Lastname: </td>
                                <td class = 'registration'><input type = 'text'></td>
                            </tr>
                            <tr>
                                <td class = 'registration'>Contact Number: </td>
                                <td class = 'registration'><input type = 'text'></td>
                            </tr>
                            <tr>
                                <td class = 'registration'>Address: </td>
                                <td class = 'registration'><input type = 'text'></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class = 'col-lg-6'>
                    <div class = 'col-lg-12'>
                        <label><h2>Account Information</h2></label>
                    </div>
                    <div class = 'col-lg-12'>
                        <table>
                            <tr>
                                <td class = 'registration'>Username: </td>
                                <td class = 'registration'><input type = 'text'></td>
                            </tr>
                            <tr>
                                <td class = 'registration'>Password: </td>
                                <td class = 'registration'><input type = 'text'></td>
                            </tr>
                            <tr>
                                <td class = 'registration'>Re-type Password: </td>
                                <td class = 'registration'><input type = 'text'></td>
                            </tr>
                            <tr>
                                <td class = 'registration'>E-mail Address: </td>
                                <td class = 'registration'><input type = 'text'></td>
                            </tr>
                            <tr>
                                <td class = 'registration'>Address: </td>
                                <td class = 'registration'><input type = 'text'></td>
                            </tr>
                        </table>
                    </div>
                </div><!-- -->
                <div class = 'col-lg-12'>
                <hr>
                        <div class = 'col-lg-6'>
                        <table>
                            <tr>
                                <td class = 'registration'>Security Question: </td>
                                <td class = 'registration'><select name = "quest" id = 'quest'>
                                    <option id = "0">Choose Question</option>
                                    <?php
                                        include('connection.php');
                                        $quest = mysql_query("SELECT * FROM sec_tbl");
                                        while($question = mysql_fetch_array($quest)){
                                    echo "<option id = '".$question['s_id']."'>".$question['s_question']."</option>";
                                    }
                                    ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div>
                           <img class = 'captcha' src = 'generatecap.php' id = 'refresh'>
                                <label><input type = 'button' onclick = 'reload();' value = 'Reload Image' style="border:0px;background-color:transparent;cursor:pointer;cursor:hand;text-decoration:underline;" /></label></td>
                            <table>    
                            <tr>
                                <td class = 'registration'><label>Please type the code if you<br>are not a robot.</label></td>
                                <td class = 'registration'><input type = 'text' size = '6' name = 'secure'></td>
                            </tr>
                            </table>
                        </div>
                        </div>
                <div class = 'col-lg-12 centersub'>
                    <input type = 'button' name = 'subreg' value = 'Cancel'>
                    <input type = 'button' name = 'subreg' value = 'Proceed'>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

</html>