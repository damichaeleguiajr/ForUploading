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
    $checkpending = mysql_query("SELECT * FROM reservation_tbl WHERE r_user = '$u_id' AND r_pay = 0 AND r_status=0");
    $checkpay = mysql_query("SELECT * FROM reservation_tbl WHERE r_user = '$u_id' AND r_status = 1");
    if(isset($_POST['transacanother'])){
        foreach($_SESSION as $key){
            if($_SESSION !== $u_id){
                $_SESSION = array();
                unset($_SESSION[$key]);
                $_SESSION['u_id'] = $u_id;
            }
        }
    } 
          if(mysql_num_rows($checkpending)>0){
          $alert= "<script language=javascript>
                var ask = confirm(\"You have pending reservation/s. View it now? Clicking 'Cancel Button' will redirect you to Avail Form.\");
                if(ask==true){
                  window.location.href = 'myreservations.php';
                }
                </script>";
          echo $alert;
        $r_id = $u_id;
           for ($i = 0; $i < 1; $i++) {
               $r_id .= intval(rand(100, 999));
           }
        $_SESSION['r_id'] = $r_id;
        }
        foreach($_SESSION as $key){
            if($_SESSION !== $u_id){
                $_SESSION = array();
                unset($_SESSION[$key]);
                $_SESSION['u_id'] = $u_id;
            }
        }
         $r_id = $u_id;
           for ($i = 0; $i < 1; $i++) {
               $r_id .= intval(rand(100, 999));
           }
        $_SESSION['r_id'] = $r_id;
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
    <script type="text/javascript">
        function logout() {
            var txt;
            var r = confirm("Are you sure you want to logout?");
            if (r == true) {
                location.href='logout.php';
            }
        };
        window.addEventListener("beforeunload", function (e) {
            
            if (formSubmitting) {
            return undefined;
            }

            var confirmationMessage = 'It looks like you are not done yet. '
                                    + 'If you leave, your form will be lost.';

            (e || window.event).returnValue = confirmationMessage; //Gecko + IE
            return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
        });
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
                <a class="navbar-brand" href="index.php"><img src = '../images/logoliit.png'></a>
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
                        <li><a href="myreservations.php">My Reservation</a></li>
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
        <div class="col-lg-12 well1">
            <nav id='navigation_show' class='hide'>
                <ol class="cd-multi-steps text-bottom count">
                    <li class="current"><a href="#0" class="not-active">Information</a></li>
                    <li><em>Party Needs</em></li>
                    <li><em>Catering</em></li>
                    <li><em>Review</em></li>
                    <li><em>Billing</em></li>
                </ol>
            </nav>
            <nav id='navigation_hide'>
                <ol class="cd-multi-steps text-bottom count">
                    <li class="current"><a href="#0" class="not-active">Information</a></li>
                    <li><em>Party Needs</em></li>
                    <li><em>Review</em></li>
                    <li><em>Billing</em></li>
                </ol>
            </nav>
                <fieldset>
                    <?php $todaysDate = date("Y-m-d");
                          $date = date('Y-m-d', strtotime($todaysDate. ' + 7 days'));
                          $max = "2016-12-31";
                          $maxtime = '19:00';
                          $mintime = '06:00';
                    ?>
                    <div style = 'font-size:20px' align = 'center'>
                      <div class='panel-heading'>
                        <h3>Event Information</h3>
                      </div>
                      <div class=''>
                        <form class='form-horizontal' role='form' action = 'process1.php' method = 'POST' enctype="multipart/form-data" id='processone' onsubmit="setFormSubmitting()">
                          <div class='form-group hide'>
                            <label class='control-label col-md-3 col-md-offset-2' for='event'>Include catering services?</label>
                            <div class='col-md-7'>
                              <div class='col-md-1'>
                                <div class='form-group internal'>
                                  <div class="onoffswitch">
                                      <input type="checkbox" name="yesno" class="onoffswitch-checkbox" id="myonoffswitch" onclick='navigation()'>
                                      <label class="onoffswitch-label" for="myonoffswitch">
                                          <span class="onoffswitch-inner"></span>
                                          <span class="onoffswitch-switch"></span>
                                      </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='form-group internal'>
                            <label class='control-label col-md-3 col-md-offset-2' for='event'>Event</label>
                            <div class='col-md-6'>
                              <div class='col-md-6'>
                                <div class='form-group internal' align="left">
                                  <select class='form-control' name = "type" id='event_list' onchange="eventlist()" required>
                                    <option id = "0" value="">-- Select Event --</option>
                                    <?php 
                                        include('connection.php');
                                        $event = mysql_query("SELECT * FROM event_tbl");
                                        while($eventview = mysql_fetch_array($event)){
                                    ?>
                                    <option id = "<?php echo $eventview['e_id']; ?>"><?php echo $eventview['e_name']; ?></option>
                                    <?php } ?>
                                  </select>
                                  <div class='notice col-lg-12'><img src='../images/notification/notice.png'><span>Note: </span>Party theme is available only in Birthday Party</div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='form-group hide' id = 'load'>
                          <label class='control-label col-md-3 col-md-offset-2' for='load'></label>
                            <div class='col-md-7'>
                              <div class='col-md-4'>
                                <div class='form-group internal'>
                                <img src = '../img/load.gif'>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- I LOVE YOU SO MUCH!!!!!!!!!!!!!!!!!!!!!!! -->
                          <!-- EDIT THIS THANK YOU SO MUCH MAHAL! -->
                          <div class='form-group hide' id = 'choices'>
                          <div  class='control-label col-md-3 col-md-offset-2'>
                            <label class = 'control-label' for='choices'>Please select an option</label>
                          </div>
                            <div class='col-md-7' align='left'>
                              <div class='col-md-5'>
                                <div class='form-group internal'>
                                  <label><input type='radio' name='choice' value='Color' onclick='choice4color()' id='choicetocheck'> Color Motif</label>
                                </div>
                                <div class='form-group internal'>
                                  <label><input type='radio' name='choice' value='Theme' onclick='choice4theme()'> Party Theme</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='form-group hide' id = 'load1'>
                          <label class='control-label col-md-3 col-md-offset-2' for='load'></label>
                            <div class='col-md-7'>
                              <div class='col-md-4'>
                                <div class='form-group internal'>
                                <img src = '../img/load.gif'>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='form-group hide' id = 'themeparty'>
                            <label class='control-label col-md-3 col-md-offset-2' for='event'>Theme</label>
                            <div class='col-md-7'><!-- PWEDE MO PALITAN col-md-3 hanggang 5 or 6 lng para di masira yung layout po -->
                              <div class = 'col-md-6'>
                                <div class='form-group hide' id='load2' align="left">
                                  <img src = '../img/load.gif'>
                                </div>
                                <div class='form-group' align="left" id='suggestedtheme'>
                                  <input type='button' class='btn btn-success col-md-12' data-toggle="modal" data-target="#myModal" value='Click here to view suggested Party Themes' id='filetype'>
                                  <div style='margin-bottom:5px' class='hide' id='fortitle'>
                                  <input type='text' readonly class='asd hide' id='picme' name='selectedpic'>
                                  <input type='text' readonly class='asd' id='title'>
                                  <input type='button' class='btn btn-sm btn-default' data-toggle="modal" data-target="#myModal" value='Change'><input type='button' class='btn btn-sm btn-default' value='Remove' onclick="removeall()">
                                  </div>
                                  <div align='center'>
                                  <img src = '../img/load.gif' class='hide' id='load4'>
                                  </div>
                                  <img class='uploadedpic hide' id='blah' src='#'>
                                  <p style = 'margin-bottom:-5px;font-size:16px' id='notlisted'>Party theme not listed? <a style='cursor:pointer' onclick='uploadpic()'>Click here to upload your desired party theme!</a></p>
                                </div>
                                <div class='form-group hide' id='uploadedpic' align="left">
                                  <input class='btn-sm col-md-6' type = 'file' name = 'uploadedpic' id='imgInp' disable><input type='button' class='btn btn-sm btn-default hide' value='Remove' onclick="removeall1()" id='inpRem'>
                                  <div class='col-md-12' align='center'>
                                  <img src = '../img/load.gif' class='hide' id='load3'>
                                  </div>
                                  <img class='uploadedpic hide' id='blah1' src='#'>
                                  <div class='col-md-12' id='clicksuggest'>
                                  <p style = 'font-size:16px'><a style='cursor:pointer' onclick='uploadpic1()'>Click here to view suggested themes.</a></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- EDIT THAT THANK YOU SO MUCH MAHAL! -->
                          <div class='form-group' id = 'motif'>
                          <div  class='control-label col-md-3 col-md-offset-2'>
                            <label class = 'control-label' for='motif'>Color Motif</label>
                            <p style = 'font-size:16px'>(Use for table cloth, etc.)</p>
                          </div>
                            <div class='col-md-7'>
                              <div class='col-md-8' align = 'left'>
                                <div class='form-group internal'>
                                  <table class = 'table-view'>
                                    <tbody>
                                      <tr>
                                        <td>
                                          <label><input class='radiotocheck' type = 'radio' name = 'motif[]' value = 'White' id='radiotocheck-first' required> White</label><br>
                                          <label><input class='radiotocheck' type = 'radio' name = 'motif[]' value = 'Yellow'> Yellow</label><br>
                                          <label><input class='radiotocheck' type = 'radio' name = 'motif[]' value = 'Pink'> Pink</label><br>
                                          <label><input class='radiotocheck' type = 'radio' name = 'motif[]' value = 'Indigo'> Indigo</label>
                                        </td>
                                        <td>
                                          <label><input class='radiotocheck' type = 'radio' name = 'motif[]' value = 'Orange'> Orange</label><br>
                                          <label><input class='radiotocheck' type = 'radio' name = 'motif[]' value = 'Red'> Red</label><br>
                                          <label><input class='radiotocheck' type = 'radio' name = 'motif[]' value = 'Violet'> Violet</label><br>
                                          <label><input class='radiotocheck' type = 'radio' name = 'motif[]' value = 'Blue'> Blue</label>
                                        </td>
                                        <td>
                                          <label><input class='radiotocheck' type = 'radio' name = 'motif[]' value = 'Ivory'> Ivory</label><br>
                                          <label><input class='radiotocheck' type = 'radio' name = 'motif[]' value = 'Green'> Green</label><br>
                                          <label><input class='radiotocheck' type = 'radio' name = 'motif[]' value = 'Magenta'> Magenta</label><br>
                                          <label><input class='radiotocheck' type = 'radio' name = 'motif[]' value = 'Brown'> Brown</label>
                                        </td>
                                        <td>
                                          <label><input class='radiotocheck' type = 'radio' name = 'motif[]' value = 'Black'> Black</label><br>
                                          <label><input class='radiotocheck' type = 'radio' name = 'motif[]' value = 'Gray'> Gray</label><br>
                                          <label><input class='radiotocheck' type = 'radio' name = 'motif[]' value = 'Silver'> Silver</label><br>
                                          <label><input class='radiotocheck' type = 'radio' name = 'motif[]' value = 'Gold'> Gold</label><br>
                                        </td>
                                      </tr>
                                    </tbody>    
                                  </table>
                                  <label><input type='checkbox' onclick='changeit()' id='changingtype'>Use multiple colors</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label class='control-label col-md-3 col-md-offset-2' for='date'>Date</label>
                            <div class='col-md-2'>
                              <input class = "form-control" type = "date" id = "date" name = "date" value = "<?php echo $date; ?>" min = "<?php echo $date; ?>" max = "<?php echo $max; ?>" onchange="datechange()">
                              <span id='fordatecheck'></span>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label class='control-label col-md-3 col-md-offset-2' for='strtime'>Start time of event</label>
                            <div class='col-md-2'>
                              <input class = "form-control" type = "time" id = "time" name = "strttime" required>
                            </div>
                          </div>
                          <div class='form-group hide' id = 'loadforguest'>
                          <label class='control-label col-md-3 col-md-offset-2' for='load'></label>
                            <div class='col-md-7'>
                              <div class='col-md-4'>
                                <div class='form-group internal'>
                                <img src = '../img/load.gif'>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='form-group hide' id='guest'>
                            <label class='control-label col-md-3 col-md-offset-2' for='event'>Number of Guest</label>
                            <div class='col-md-7'>
                              <div class='col-md-3'>
                                <div class='form-group internal'>
                                  <input class = "form-control" type = "text" maxlength="3" id = "guestid" name = "guest" placeholder = "Minimum of 50 guest" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required disabled>
                                  <p style = 'font-size:16px'>(Additional of ₱1,000.00 if below 50 guest)</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label class='control-label col-md-3 col-md-offset-2' for='event'>Venue Address</label>
                            <div class='col-md-7'>
                              <div class='col-md-7'>
                                <div class='form-group'>
                                  <select class='form-control provinceSelect' name = "location" id='province_list' required>
                                    <option id = "0" value=''>-Select Location-</option>
                                    <?php 
                                        include('connection.php');
                                        $event = mysql_query("SELECT * FROM cities_tbl WHERE province_id = '47'");
                                        while($eventview = mysql_fetch_array($event)){
                                    ?>
                                    <option id = "<?php echo $eventview['id']; ?>"><?php echo $eventview['name']; ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                                <div class='form-group internal'>
                                  <input class = "form-control" type = "text" placeholder = 'Address' name = 'address' required>
                                </div>
                              </div>
                            </div>
                          </div>
                          <hr>
                          <div class='form-group'>
                            <div class='col-md-offset-4 col-md-4'>
                              <button class='btn-lg btn-primary' type='submit' name = 'proceed1' id='proceedto1'>Proceed to next step</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                </fieldset>
        </div>
    </div>
    <!--Modal-->
    <div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <br>
                    <div class="bs-example bs-example-tabs">
                        <ul id="myTab" class="nav nav-tabs">
                          <li class="active"><a href="#kids" data-toggle="tab"><i class = "fa fa-sign-in"></i> Kids</a></li>
                          <li class=""><a href="#adults" data-toggle="tab"><i class = "fa fa-edit"></i> Adults</a></li>
                        </ul>
                    </div>
                  <div class="modal-body col-lg-12" align="center">
                    <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade in" id="adults">
                        <fieldset>
                        <?php 
                          $i = 0;
                          $qryforpic = mysql_query("SELECT * FROM recommended_tbl WHERE r_category = 'Adults'");
                          while($pic = mysql_fetch_array($qryforpic)){
                            $pic_id = $pic['r_id'];
                            $picname = $pic['r_name'];
                            $picpath = "../images/".$pic['r_value'];
                            echo "<div class = 'thumbnail col-md-4'><h3>".$picname."</h3>
                                  <img src = '".$picpath."'>
                                  <div class = 'caption' align='center'>
                                    <button class = 'center btn-info btn click' data-dismiss = 'modal' onclick = 'addElement".$pic_id."()'>Select</button>
                                  </div>
                                  </div>";
                            echo '<script>
                                  function addElement'.$pic_id.'(){
                                    (function(){
                                          var myDiv = document.getElementById("load4");
                                          var show = function(){
                                          document.getElementById("fortitle").setAttribute("class","hide");
                                          document.getElementById("filetype").setAttribute("class","hide");
                                          document.getElementById("notlisted").setAttribute("class","hide");
                                          document.getElementById("title").setAttribute("value","'.$picname.'");
                                          document.getElementById("picme").setAttribute("value","'.$picpath.'");
                                          myDiv.setAttribute("class", "form-group");
                                          setTimeout(hide, 800);  // 5 seconds
                                          }
                                          var hide = function(){
                                          myDiv.setAttribute("class", "hide");
                                          document.getElementById("fortitle").setAttribute("class","#");
                                          document.getElementById("blah").setAttribute("src","'.$picpath.'");
                                          document.getElementById("blah").setAttribute("class","uploadedpic");
                                          }
                                          show();
                                    })();
                                  }
                                  </script>';
                          }
                          ?>
                          </fieldset>
                    </div>
                    <div class="tab-pane fade active in" id="kids">
                        <?php 
                          $i = 0;
                          $qryforpic = mysql_query("SELECT * FROM recommended_tbl WHERE r_category = 'Kids'");
                          while($pic = mysql_fetch_array($qryforpic)){
                            $pic_id = $pic['r_id'];
                            $picname = $pic['r_name'];
                            $picpath = "../images/".$pic['r_value'];
                            echo "<div class = 'thumbnail col-md-4'><h3>".$picname."</h3>
                                  <img src = '../images/".$picpath."'>
                                  <div class = 'caption'>
                                    <button class = 'center btn-info btn click' data-dismiss = 'modal' onclick = 'addElement".$pic_id."()'>Select</button>
                                  </div>
                                  </div>";
                            echo '<script>
                                  function addElement'.$pic_id.'(){
                                    (function(){
                                          var myDiv = document.getElementById("load4");
                                          var show = function(){
                                          document.getElementById("fortitle").setAttribute("class","hide");
                                          document.getElementById("filetype").setAttribute("class","hide");
                                          document.getElementById("notlisted").setAttribute("class","hide");
                                          document.getElementById("blah").setAttribute("class","hide");
                                          document.getElementById("title").setAttribute("value","'.$picname.'");
                                          document.getElementById("picme").setAttribute("value","'.$picpath.'");
                                          myDiv.setAttribute("class", "form-group");
                                          setTimeout(hide, 800);  // 5 seconds
                                          }
                                          var hide = function(){
                                          myDiv.setAttribute("class", "hide");
                                          document.getElementById("fortitle").setAttribute("class","#");
                                          document.getElementById("blah").setAttribute("src","../images/'.$picpath.'");
                                          document.getElementById("blah").setAttribute("class","uploadedpic");
                                          }
                                          show();
                                    })();
                                  }
                                  </script>';
                          }
                          ?>
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
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <script src="../js/onclick.js"></script>  <!--dan mahal dito ako naglagay ng code po -->
    <script type="text/javascript" src="../js/ajax.js"></script>
	   <script type="text/javascript" src="../js/slider.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
