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
}else{
    header('location:../../index.php');
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

    <!-- Custom CSS -->
    <link href="../../css/heroic-features.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .indent-small {
          margin-left: 5px;
        }
        .form-group.internal {
          margin-bottom: 0;
        }
        .dialog-panel {
          margin: 10px;
        }
        .datepicker-dropdown {
          z-index: 200 !important;
        }
        .panel-body {
          background: #e5e5e5;
          /* Old browsers */
          background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
          /* FF3.6+ */
          background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
          /* Chrome,Safari4+ */
          background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
          /* Chrome10+,Safari5.1+ */
          background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
          /* Opera 12+ */
          background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
          /* IE10+ */
          background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
          /* W3C */
          filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
          /* IE6-9 fallback on horizontal gradient */
          font: 600 15px "Open Sans", Arial, sans-serif;
        }
        label.control-label {
          font-weight: 600;
          color: #777;
        }
        form p {
            font-size: 10px;
        }
    </style>
    <script type="text/javascript">
        function logout() {
            var txt;
            var r = confirm("Are you sure you want to logout?");
            if (r == true) {
                location.href='logout.php';
            }
        };
        function myTime(){
            var str = document.getElementById("time").value;
            str = str.split(":");
            var hour = str[0];
            hour = parseInt(hour) + 4;
            if(str >= "12:00" < "08"){
            var res = hour + ':' + str[1];
            document.getElementById("test").value = res;
            }if(str <= "12" >= "13"){
            var res = hour + ':' + str[1];
            document.getElementById("test").value = "0" + res;
            }
        };
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
                <a class="navbar-brand" href="index.php"><img src = '../../images/logoliit.png' style = 'height:50px; width:260px; margin-top:-15px;margin-left:-18px;'></a>
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
                        <li><a href="#">My Reservation</a></li>
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
        <div class="col-lg-12">
            <nav>
                <ol class="cd-multi-steps text-bottom count">
                    <li class="current"><a href="#0" class="not-active">Information</a></li>
                    <li><em>Party Needs</em></li>
                    <li><em>Party Foods</em></li>
                    <li><em>Review</em></li>
                    <li><em>Billing</em></li>
                </ol>
            </nav>
                <fieldset>
                    <?php $todaysDate = date("Y-m-d");
                          $date = date('Y-m-d', strtotime($todaysDate. ' + 7 days'));
                          $max = "2015-12-31";
                          $maxtime = '19:00';
                          $mintime = '06:00';
                    ?>
                    <div style = 'font-size:20px' align = 'center'>
                      <div class='panel-heading'>
                        <h3>Even Information</h3>
                      </div>
                      <div class=''>
                        <form class='form-horizontal' role='form'>
                          <div class='form-group'>
                            <label class='control-label col-md-3 col-md-offset-2' for='date'>Date</label>
                            <div class='col-md-2'>
                              <input class = "form-control" type = "date" id = "date" name = "date" value = "<?php echo $date; ?>" min = "<?php echo $date; ?>" max = "<?php echo $max; ?>" onclick = "timeChange()">
                            </div>
                          </div>
                          <div class='form-group'>
                            <label class='control-label col-md-3 col-md-offset-2' for='strtime'>Start time of event</label>
                            <div class='col-md-2'>
                              <input class = "form-control" type = "time" id = "time" name = "strttime" onchange = "myTime()" min = "<?php echo $mintime; ?>" max ="<?php echo $maxtime; ?>">
                            </div>
                          </div>
                          <div class='form-group'>
                            <label class='control-label col-md-3 col-md-offset-2' for='endtime'>End time of event</label>
                            <div class='col-md-2'>
                              <input class = "form-control" type = "time" id = "test" name = "endtime">
                            </div>
                          </div>
                          <div class='form-group'>
                            <label class='control-label col-md-3 col-md-offset-2' for='event'>Number of Guest</label>
                            <div class='col-md-7'>
                              <div class='col-md-3'>
                                <div class='form-group internal'>
                                  <input class = "form-control" type = "number" id = "guest" name = "guest" placeholder = "Minimum of 50 guest">
                                  <p style = 'font-size:16px'>(Additional of ₱1,000.00 if below 50 guest)</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label class='control-label col-md-3 col-md-offset-2' for='event'>Type of Event</label>
                            <div class='col-md-7'>
                              <div class='col-md-4'>
                                <div class='form-group internal'>
                                  <select class='form-control' name = "type" id='event_list' onchange="eventlist()">
                                    <option id = "0">-- Select Event --</option>
                                    <?php 
                                        include('connection.php');
                                        $event = mysql_query("SELECT * FROM event_tbl");
                                        while($eventview = mysql_fetch_array($event)){
                                    ?>
                                    <option id = "<?php echo $eventview['e_id']; ?>"><?php echo $eventview['e_name']; ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='form-group hide' id = 'load'>
                          <label class='control-label col-md-3 col-md-offset-2' for='load'></label>
                            <div class='col-md-7'>
                              <div class='col-md-4'>
                                <div class='form-group internal'>
                                <img src = '../../img/load.gif'>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='form-group hide' id = 'party'>
                            <label class='control-label col-md-3 col-md-offset-2' for='party'>Type of Party</label>
                            <div class='col-md-7'>
                              <div class='col-md-4'>
                                <div class='form-group internal'>
                                  <select class='form-control' name = "type" id='type_party' disabled>
                                    <option>-Select a type of party-</option>
                                    <option>Kid's Party</option>
                                    <option>Adult's Party</option>
                                    <option>Debut</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='form-group hide'>
                            <label class='control-label col-md-3 col-md-offset-2' for='event'>Theme</label>
                            <div class='col-md-7'>
                              <div class='col-md-3'>
                                <div class='form-group internal'>
                                  <input class = "form-control" type = "text" id = "theme" name = "theme">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='form-group'>
                            <div class='col-md-offset-4 col-md-4'>
                              <button class='btn-lg btn-primary' type='submit'>Proceed to next step</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                </fieldset>
        </div>
    </div>

    <!-- /.container -->

    <!-- jQuery -->
    <script src="../../js/jquery.js"></script>
    <script src="../../js/onclick.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>

</body>

</html>
