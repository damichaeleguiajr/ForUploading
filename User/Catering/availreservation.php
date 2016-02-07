<!DOCTYPE html>
<?php 

include('../../connection.php');
ob_start();
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
<html>
<head>
    <meta charset="utf-8">
    <title>EhKasiBata</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <!-- Optional Bootstrap theme -->
    <link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
    <!-- JS
    ================================================== -->
    <script src="../../js/jquery-1.11.3.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script>
    $('.dropdown-toggle').dropdown();
    function logout() {
    var txt;
    var r = confirm("Are you sure you want to logout?");
    if (r == true) {
        location.href='logout.php';
    }
    };
    function cancel(){
        var tex;
        var x = confirm("Are you sure you want to cancel and leave this page?");
        if (x == true){
            location.href='index.php';
        }
    };
    function selectOnlyThis(id) {
    for (var i = 0;i <= 2; i++)
    {
        document.getElementById("Check" + i).checked = false;
    }
    document.getElementById(id).checked = true;
    };
    </script>
</head>
<body>
<div class = 'padd'>
    <div class="navbar navbar-inverse col-lg-12" role="navigation">
      <div class="navbar-header">
        <div class = 'col-lg-2'></div>
        <div class = 'col-lg-5'><a class="navbar-brand" href="../index.php"><img src = '../../images/logoliit.png' style = 'height:50px; width:260px; margin-top:-15px;'></a></div>
      </div>
    <div class="navbar-collapse collapse">
        <!-- Right nav -->
        <ul class="nav navbar-nav navbar-right">
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
    </div><!--/.nav-collapse -->
    </div>
</div>
    <div class = 'container' style = 'font-family:san'>
        <div class = 'col-lg-12 forbody'>
            <div class = 'col-lg-12'>
            <nav>
                <ol class="cd-breadcrumb triangle">
                    <li class="current"><em>1. Event Information</em></li>
                    <li><a href="" class = 'not-active'>2. Select Party Needs</a></li>
                    <li><a href="#0" class = 'not-active'>3. Confirmation</a></li>
                    <li><a href="#0" class = 'not-active'>4. Payment</a></li>
                </ol>
            </nav>
            </div>
            <div class = 'col-lg-12'><hr></div>
            <div class = 'col-lg-12' style = 'box-shadow:2px 1px 2px 5px #d4d6d4;'>
                <div class = 'col-lg-6' style = 'font-size:18px;'><br><br>
                    <span style = 'color: red;'>Please fill-up the form below.<br>All of the input is required for us to know your event information. Thank You.</span><br><br>
                    <?php $todaysDate = date("Y-m-d");
                          $date = date('Y-m-d', strtotime($todaysDate. ' + 4 days'));
                          $max = "2015-12-31";
                          $maxtime = '17:00';
                          $mintime = '08:00';
                    ?>
                    <form method = 'POST' action = 'processavail.php'>
                    <table height = '500px' width = '500px'>
                        <tr>
                            <td class = '' style = 'width:150px;padding-top:10px;'><b>Date of event: </b></td>
                            <td><input type = "date" id = "date" name = "date" min = "<?php echo $date; ?>" max = "<?php echo $max; ?>"><span style = 'color:red;font-size:15px;'><i>*Month/Date/Year</i></span></td>
                        </tr>
                        <tr>
                            <td class = ''><b>Time of event: </b></td>
                            <td><input  type = "time" id = "time" name = "time" min = '<?php echo $mintime; ?>' max = '<?php echo $maxtime; ?>'></td>
                        </tr>
                        <tr>
                            <td><b>Type of event: </b></td>
                            <td>
                                <select  name = "type" class = "textfields">
                                    <option id = "0">-- Select Event --</option>
                                    <?php 
                                    include('connection.php');

                                    $event = mysql_query("SELECT * FROM event_tbl");
                                    while($eventview = mysql_fetch_array($event)){
                                    ?>
                                    <option id = "<?php echo $eventview['e_id']; ?>"><?php echo $eventview['e_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class = ''><b>Event/Theme Color: </b></td>
                            <td><label class = 'lebel'><input type = 'checkbox' value = 'Black' name = 'color[]'>Black</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'Blue' name = 'color[]'>Blue</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'Brown' name = 'color[]'>Brown</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'Gray' name = 'color[]'>Gray</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'Green' name = 'color[]'>Green</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'Orange' name = 'color[]'>Orange</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'Pink' name = 'color[]'>Pink</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'Purple' name = 'color[]'>Purple</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'Red' name = 'color[]'>Red</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'White' name = 'color[]'>White</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'Yellow' name = 'color[]'>Yellow</label><br>
                            <span style = 'color:red;font-size:15px;'><i><label>*</label>Theme color use as reference for Balloon color, Skirting color, etc.</i></span></td>
                        </tr>
                        <tr>
                            <td><b>Venue: </b></td>
                            <td><input style = 'width:100%;' type = "text" id = "venue" name = "venue"></td>
                        </tr>
                        <tr>
                            <td class = ''><b>Contact Person: </b></td>
                            <td class = ''><input style = 'width:100%;' type = "text" id = "contact" name = "contact"></td>
                        </tr>
                        <tr>
                            <td class = ''><b>Contact Number: </b></td>
                            <td class = ''><input style = 'width:100%;' type = "text" id = "cnumber" name = "cnumber"></td>
                        </tr>
                        <tr>
                            <td class = ''></td>
                            <td class = ''></td>
                        </tr>
                    </table>
                    <hr>
                    <div class = 'col-lg-12' style = 'text-align:center'>
                    <a class = 'btn btn-danger' name = 'cancel' onclick = 'cancel()'>Cancel</a>
                    <input type = 'submit' class = 'btn btn-success' name = 'submit' value = 'Proceed'>
                    <br>
                    <br><br>
                </div><br>
                </div>
                <div class = 'col-lg-6'>
                    <hr class = 'style-nine'>
                    <h2 style = 'text-align:center;'><i>Upcoming Events</i></h2>
                    <hr class = 'style-nine'>
                    
                </div>
                
                </div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>

</html>