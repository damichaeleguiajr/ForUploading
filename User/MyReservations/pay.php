<!DOCTYPE html>
<?php 

include('../../connection.php');
session_start();
if(isset($_POST['deleteReq'])){
  $idd = $_POST['deleteReq'];
  $qry = mysql_query("DELETE FROM reservation_tbl WHERE r_id='$idd'");
  if($qry){
    $alert= "<script language=javascript>
                alert(\"Request Deleted.\");</script>";
            echo $alert;
  }
}
if(isset($_POST['savecontact'])){
    $id = $_GET['pending'];
    $contactname = $_POST['contactname'];
    $contactnumber = $_POST['contactnumber'];
    $contactemail = $_POST['contactemail'];
    $qry = mysql_query("UPDATE reservation_tbl SET r_person='$contactname',r_person_email='$contactemail',r_person_contact='$contactnumber' WHERE r_id='$id'");
    if($qry){
        header('Refresh:0');
        $alert= "<script language=javascript>
                alert(\"Contact Information Updated!\");</script>";
        echo $alert;
    }
}
if(isset($_POST['saveevent'])){
    $id = $_GET['pending'];
    $type = $_POST['type'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $address = $_POST['address'];
    if(isset($_POST['motif'])){
        $motif = array();
        $motif = $_POST['motif'];
        $motif = implode(",", $motif);
        $qry = mysql_query("UPDATE reservation_tbl SET r_type='$type',r_motif='$motif',r_date='$date',r_time='$time',r_location='$location',r_address='$address' WHERE r_id='$id'");
        if($qry){
            header('Refresh:0');
            $alert= "<script language=javascript>
                    alert(\"Event Information Updated!".$date."\");</script>";
            echo $alert;
        }
    }else{
        $qry = mysql_query("UPDATE reservation_tbl SET r_type='$type',r_date='$date',r_time='$time',r_location='$location',r_address='$address' WHERE r_id='$id'");
        if($qry){
            header('Refresh:0');
            $alert= "<script language=javascript>
                    alert(\"Event Information Updated!\");</script>";
            echo $alert;
        }
    }
}
if(isset($_SESSION['u_id'])){
$u_id = $_SESSION['u_id'];
$qry = mysql_query("SELECT * FROM users_tbl where u_id = '$u_id'");
$result = $qry;
    while($qry = mysql_fetch_array($result)){
        $fname = $qry['u_fname'];
        $lname = $qry['u_lname'];
        $fname = ucwords($fname);
        $lname = ucwords($lname);
        $mnumber = $qry['mnumber'];
        $email = $qry['u_email'];
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
    <link href="../../fonts/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../css/heroic-features.css" rel="stylesheet">

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
                location.href='../logout.php';
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
    <style>
    tr .forselectpack{
        height:100px;
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
                <a class="navbar-brand" href="index.php"><img src = '../../images/logoliit.png'></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" style = 'font-size:18px;'>
                    <li>
                        <a href="../../index.php"><span class ='glyphicon glyphicon-home'></span>&nbsp&nbspHome</a>
                    </li>
                    <li>
                        <a href="../../About Us.php"><span class ='glyphicon glyphicon-user'></span>&nbsp&nbspAbout Us</a>
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
                        <a href="avail.php"><span class ='glyphicon glyphicon-check'></span>&nbsp&nbspAvail Now</a>
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
        <div class="col-lg-12 well1">
                <div class='col-lg-12' align="center">
                    <div align='left'>
                        <h2><i>My Reservations</i></h2>
                    </div>
                    <hr>
                </div>
                <div class='col-lg-12'>
                    <div class='row'>
                        <div class='col-lg-7'>
                    <?php
                    if(isset($_GET['id'])){
                        $r_id = $_GET['id'];
                        $reservations = mysql_query("SELECT * FROM reservation_tbl WHERE r_id='$r_id'");
                            $pendingreservation = mysql_query("SELECT * FROM reservation_tbl");
                            echo "<div class='col-lg-12'>
                                    <div class='panel panel-default'>
                                    <div class='panel-heading'>
                                        <h2 class='panel-title'><b><i>Contact Information</i></b></h2>
                                    </div>
                                    <div class='panel-body'>
                                        <div class='table-responsive'>
                                            <form method='POST' action='myreservations.php?pending=".$r_id."'>
                                            <table class='table'>
                                                <tbody>";
                                                while($p_reservation=mysql_fetch_array($pendingreservation)){
                                                    echo "<tr>
                                                            <td width='30%'>Contact Person:</td>
                                                            <td align='left' id='cperson'>".$p_reservation['r_person']."</td>
                                                            <td align='left' id='cperson1' class='hide'><input type='text' name='contactname' value='".$p_reservation['r_person']."'></td>
                                                          </tr>
                                                          <tr>
                                                            <td>Contact Number:</td>
                                                            <td align='left' id='cnumber'>".$p_reservation['r_person_contact']."</td>
                                                            <td align='left' id='cnumber1' class='hide'><input type='text' name='contactnumber' value='".$p_reservation['r_person_contact']."'></td>
                                                          </tr>
                                                          <tr>
                                                            <td>Email Address:</td>
                                                            <td align='left' id='cemail'>".$p_reservation['r_person_email']."</td>
                                                            <td align='left' id='cemail1' class='hide'><input type='text' size='45' name='contactemail' value='".$p_reservation['r_person_email']."'></td>
                                                          </tr>";
                                                }
                            echo                "</tbody>
                                            </table>
                                            <hr>
                                            <button type='submit' style='float:right' class='btn btn-success savecontact hide' name='savecontact'>Save</button>
                                            </form>
                                            <button style='float:right' class='btn btn-danger cancelsavecontact hide' onclick='window.location.reload();'>Cancel Editing</button>
                                            <button style='float:right' class='btn btn-warning editcontactinfo'>Edit</button>
                                        </div>
                                    </div>
                                 </div>
                                 </div>";
                            $pendingreservation = mysql_query("SELECT * FROM reservation_tbl WHERE r_id='$r_id' AND r_status=0");
                            echo "<div class='col-lg-12'>
                                    <div class='panel panel-default'>
                                    <div class='panel-heading'>
                                        <h2 class='panel-title'><b><i>Event Information</i></b></h2>
                                    </div>
                                    <div class='panel-body'>
                                        <div class='table-responsive'>
                                            <form method='POST' action='myreservations.php?pending=".$r_id."'>
                                            <table class='table'>
                                                <tbody>";
                                                while($p_reservation=mysql_fetch_array($pendingreservation)){
                                                    echo "<tr>
                                                            <td width='20%'>Type of Event:</td>
                                                            <td align='left' id='type'>".$p_reservation['r_type']."</td>
                                                            <td class='hide' id='type1'><select class='form-control' name = 'type' id='event_list'>
                                                                <option>".$p_reservation['r_type']."</option>";
                                                                    $event = mysql_query("SELECT * FROM event_tbl");
                                                                    while($eventview = mysql_fetch_array($event)){
                                                                echo "<option id = '".$eventview['e_id']."'>".$eventview['e_name']."</option>";
                                                                 }
                                                    echo    "</select>
                                                            </td>
                                                          </tr>";
                                                    if($p_reservation['r_type']=='Birthday'){
                                                        if($p_reservation['r_motif']!=''){
                                                        echo "
                                                        <tr id='option' class='hide'>
                                                            <td>Please select an option.</td>
                                                            <td><label><input type='radio' name='choice' value='color' id='colormotif'> Color Motif</label>
                                                                <label><input type='radio' name='choice value='theme' id='partytheme'> Party Theme</label>
                                                            </td>
                                                        </tr>
                                                        <tr id='option1'>
                                                            <td width='20%'>Motif Color/s:</td>
                                                            <td align='left'>".$p_reservation['r_motif']."<br><button class='btn btn-default hide' id='removecolor'>Remove Motif Colors</button>
                                                                <button class='btn btn-default hide' id='changecolor'>Change Motif Color/s</button>
                                                            </td>
                                                        </tr>
                                                        <tr id='option2' class='hide'>
                                                            <td>Color Motif:</td>
                                                            <td>
                                                              <table class = 'table-view'>
                                                                <tbody>
                                                                  <tr>
                                                                    <td>
                                                                      <label><input class='radiotocheck' type = 'radio' name = 'motif[]' value = 'White' id='radiotocheck-first'> White</label><br>
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
                                                            </td>
                                                        </tr>
                                                        <tr id='themee' class='hide'>
                                                            <td>Theme:</td>
                                                            <td id='forcontent'><input type='button' class='btn btn-success col-md-12' data-toggle='modal' data-target='#SelectTheme' value='Click here to view suggested Party Themes' id='filetype'>
                                                                <p style = 'margin-bottom:-5px;font-size:16px' id='notlisted' align='center'>Party theme not listed? <a style='cursor:pointer' id='uploadpic'>Click here to upload your desired party theme!</a></p>
                                                            </td>
                                                            <td class='hide' id='fortitle'>
                                                                <input type='text' readonly class='asd hide' id='picme' name='selectedpic' value=''>
                                                                <input class='btn-sm col-md-6' type = 'file' name = 'uploadedpic' id='imgInp'>
                                                                <input type='button' class='btn btn-sm btn-default' data-toggle='modal' data-target='#SelectTheme' id='valueChange' value='Change'><input type='button' class='btn btn-sm btn-default' value='Remove' id='removeall'>
                                                                <input type='button' class='btn btn-sm btn-default' value='Remove' id='removepic'>
                                                                <img id = 'blah' class='uploadedpic hide' src='#'>

                                                            </td>
                                                        </tr>";
                                                        }
                                                        if($p_reservation['r_selectedpic']!=''){
                                                            echo "<tr>
                                                                <td width='20%'>Party Theme:</td>
                                                                <td align='left'><img src='../".$p_reservation['r_selectedpic']."' class='uploadedpic'></td>
                                                              </tr>";
                                                        }
                                                        if($p_reservation['r_uploadedpic']!=''){
                                                            echo "<tr>
                                                                <td width='20%'>Party Theme:</td>
                                                                <td align='left'><img src='../".$p_reservation['r_uploadedpic']."' class='uploadedpic'></td>
                                                              </tr>";
                                                        }
                                                    }else{
                                                        if($p_reservation['r_motif']!=''){
                                                            echo "<tr>
                                                                <td width='20%'>Motif Color/s:</td>
                                                                <td align='left'>".$p_reservation['r_motif']."</td>
                                                              </tr>";
                                                        }
                                                        if($p_reservation['r_selectedpic']!=''){
                                                            echo "<tr>
                                                                <td width='20%'>Party Theme:</td>
                                                                <td align='left'><img src='../".$p_reservation['r_selectedpic']."' class='uploadedpic'></td>
                                                              </tr>";
                                                        }
                                                        if($p_reservation['r_uploadedpic']!=''){
                                                            echo "<tr>
                                                                <td width='20%'>Party Theme:</td>
                                                                <td align='left'><img src='../".$p_reservation['r_uploadedpic']."' class='uploadedpic'></td>
                                                              </tr>";
                                                        }
                                                    }
                                                    echo "<tr>
                                                            <td width='20%'>Date of Event:</td>
                                                            <td align='left' id='date'>".date('F j, Y', strtotime($p_reservation['r_date']))."</td>
                                                            <td align='left' id='date1' class='hide'><input type='date' id='date' name='date' value='".date('Y-m-d', strtotime($p_reservation['r_date']))."'></td>
                                                          </tr>
                                                          <tr>
                                                            <td width='20%'>Time of Event:</td>
                                                            <td align='left' id='time'>".date('h:i A', strtotime($p_reservation['r_time']))."</td>
                                                            <td align='left' class='hide' id='time1'><input type='time' name='time' value='".date('H:i',strtotime($p_reservation['r_time']))."'></td>
                                                          </tr>
                                                          <tr>
                                                            <td width='30%'>Location of Event:</td>
                                                            <td align='left' id='location'>".$p_reservation['r_location']."</td>
                                                            <td class='hide' id='location1'><select class='form-control' name = 'location' id='event_list'>
                                                                <option>".$p_reservation['r_location']."</option>";
                                                                   $event = mysql_query("SELECT * FROM cities_tbl WHERE province_id = '47'");
                                                                   while($eventview = mysql_fetch_array($event)){
                                                                echo "<option id = '".$eventview['id']."'>".$eventview['name']."</option>";
                                                                 }
                                                    echo    "</select>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td width='20%'>Address:</td>
                                                            <td align='left' id='address'>".$p_reservation['r_address']."</td>
                                                            <td align='left' id='address1' class='hide'><input type='text' name='address' value='".$p_reservation['r_address']."'></td>
                                                          </tr>";
                                                }
                            echo                "</tbody>
                                            </table>
                                            <hr>
                                            <button type='submit' style='float:right' class='btn btn-success saveevent hide' name='saveevent'>Save</button>
                                            </form>
                                            <button style='float:right' class='btn btn-warning editeventinfo'>Edit</button>
                                            <button style='float:right' class='btn btn-danger cancelsaveevent hide' onclick='window.location.reload();'>Cancel Editing</button>
                                            
                                        </div>
                                    </div>
                                 </div>
                                 </div>";
                            $pendingreservation = mysql_query("SELECT * FROM reservation_tbl WHERE r_id='$r_id' AND r_status=0");
                            echo "<div class='col-lg-12'>
                                    <div class='panel panel-default'>
                                    <div class='panel-heading'>
                                        <h2 class='panel-title'><b><i>Party Needs</i></b></h2>
                                    </div>
                                    <div class='panel-body'>
                                        <div class='table-responsive'>
                                            <table class='table-hover table-striped' width='100%' id='packageTable'>
                                                <thead style='background-color:#abcc33'>
                                                    <tr>
                                                        <th>Item Description</th>
                                                        <th class = 'centerthis'>Quantity</th>
                                                        <th class = 'centerthis'> </th>
                                                        <th>Price</th>
                                                        <th class = 'centerthis'> </th>
                                                        <th>Total Amount</th>
                                                        <th class = 'hide'>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";
                                                while($p_reservation=mysql_fetch_array($pendingreservation)){
                                                      $itemname = $p_reservation['r_nameofitem'];
                                                      $itemname = explode(",", $itemname);
                                                      $itemquantity = $p_reservation['r_quanofitem'];
                                                      $itemquantity = explode(",", $itemquantity);
                                                      $i = 0;
                                                      foreach(array_combine($itemname,$itemquantity) as $nameofitem => $quanofitem){
                                                        $price = mysql_query("SELECT * FROM item_tbl where i_name = '$nameofitem'");
                                                            while ($pricelist = mysql_fetch_array($price)) {
                                                            $itemprice = $quanofitem * $pricelist['i_price'];
                                                            $item_id = $pricelist['i_id'];
                                                            $item_name = $pricelist['i_name'];
                                                            $itemPrice = $pricelist['i_price'];
                                                            $forput = $item_id."081093";
                                                            $forcall = $item_id+"11";
                                                            echo "<tr id = '".$i."' blinked='".$item_id."' class='iLoveCode'>";
                                                            echo "<td><input class='asd search' type='text' value='".$nameofitem."' name='itemname[]' forChange='".$item_id."' readonly></td>";
                                                            echo "<td class='centerthis'>
                                                                    <input type='button' value='-' class='qtyminus maxwell fa fa-minus hide' field='".$forcall."' count = '".$forput."' equal='".$itemPrice."' forChangeId = '".$i."'/>
                                                                    <input type='text' maxlength = '3' value='".$quanofitem."' class='qty asd' name='itemquantity[]' id='".$forcall."' equal='".$itemPrice."' field='".$forcall."' count = '".$forput."' forChangeIdInput = '".$i."' readonly>
                                                                    <input type='button' value='+' class='qtyplus maxwell fa fa-plus hide' field='".$forcall."' count = '".$forput."' equal='".$itemPrice."' forChangeId = '".$i."'/>
                                                                  </td>
                                                                  <td>
                                                                    <span>X</span>
                                                                  </td>
                                                                  <td class = 'centerthis'>
                                                                    <span>₱</span><input class='asd' size='4' value = '".$itemPrice."' priceChange='".$item_id."' id='".$i."' readonly>
                                                                  </td>
                                                                  <td>
                                                                    <span>=</span>
                                                                  </td>
                                                                  <td class = 'centerthis'>
                                                                     <span>₱</span><input class='thisisprice asd qty1' name='itemprice[]' value = '".$itemprice."' id='".$forput."' forPriceInput = '".$item_id."' readonly>
                                                                  </td>
                                                                  <td class = 'hide'>
                                                                    <button type = 'button' priceTag='".$item_id."' searchfor = '".$item_id."'' id='".$i."' class = 'btn btn-success modalnow' data-toggle='modal' data-target='#myModal'><span class='fa fa-edit'></span></button>
                                                                    <button type = 'button' class = 'btn btn-danger deleteme'><span class='fa fa-trash-o'></span></button>
                                                                  </td>";
                                                            echo "</tr>";
                                                          }
                                                          $i++;
                                                        }
                                                }
                            echo                "</tbody>
                                            </table>
                                            <hr>
                                            <button style='float:right' class='btn btn-warning'>Edit</button>
                                        </div>
                                    </div>
                                 </div>
                                 </div>";
                    ?>
                    </div>
                    <div class='col-lg-5'>
                        <?php
                         $pendingreservation = mysql_query("SELECT * FROM reservation_tbl WHERE r_id='$r_id' AND r_status=0");
                            echo "<div class='col-lg-12'>
                                    <div class='panel panel-default'>
                                    <div class='panel-heading'>
                                        <h2 class='panel-title'><b><i>Payment Summary</i></b></h2>
                                    </div>
                                    <div class='panel-body'>
                                        <div class='table-responsive'>
                                            <table class='table'>
                                                <tbody>";
                                                while($p_reservation=mysql_fetch_array($pendingreservation)){
                                                    echo "<tr>
                                                            <td width='20%'>Shipping Fee:</td>
                                                            <td align='left'>".$p_reservation['r_shipfee']."</td>
                                                          </tr>";
                                                    echo "<tr>
                                                            <td width='20%'>Additional Fee:</td>
                                                            <td align='left'>".$p_reservation['r_addfee']."</td>
                                                          </tr>
                                                          <tr>
                                                            <td width='20%'>Subtotal:</td>
                                                            <td align='left'>₱".$p_reservation['r_totalamount']."</td>
                                                          </tr>
                                                          <tr>
                                                            <td width='20%'>Total:</td>
                                                            <td align='left'>₱".$p_reservation['r_totalamount']."</td>
                                                          </tr>
                                                          <tr>
                                                            <td width='20%'>Downpayment(50%):</td>
                                                            <td align='left'>₱".$p_reservation['r_downpayment']."</td>
                                                          </tr>
                                                          <tr>
                                                            <td width='50%'>Cash on delivery(50%):</td>
                                                            <td align='left'>₱".$p_reservation['r_cashdeliver']."</td>
                                                          </tr>";
                                                }
                            echo                "</tbody>
                                            </table>
                                        </div>
                                    </div>
                                 </div>
                                 </div>";
                            }
                        ?>
                    </div>
                </div>
                <div class='col-lg-12' align='center'>
                    <a href='../myreservations.php'><input type='button' class='btn btn-default btn-lg' value='Back'></a>
                    <button type='button' class='btn btn-lg btn-danger cancelit' id='<?php $pending=$_GET['pending'];echo $pending;?>'>Cancel Request</button>
                </div>
                </div>
        </div>
    <!-- Modal! -->
    <div class="modal fade bs-modal-sm" id="SelectTheme" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                            $picpath = "../../images/".$pic['r_value'];
                            echo "<div class = 'thumbnail col-md-4'><h3>".$picname."</h3>
                                  <img src = '".$picpath."'>
                                  <div class = 'caption' align='center'>
                                    <button class = 'center btn-info btn click' data-dismiss = 'modal' onclick = 'addElement".$pic_id."()'>Select</button>
                                  </div>
                                  </div>";
                            echo '<script>
                                  function addElement'.$pic_id.'(){
                                    (function(){
                                          document.getElementById("picme").disabled=false;
                                          document.getElementById("imgInp").disabled=true;
                                          document.getElementById("removepic").setAttribute("class","hide");
                                          document.getElementById("blah").setAttribute("class","uploadedpic");
                                          document.getElementById("imgInp").setAttribute("class","hide");
                                          document.getElementById("forcontent").setAttribute("class","hide");
                                          document.getElementById("fortitle").setAttribute("class","");
                                          document.getElementById("picme").setAttribute("class","asd");
                                          document.getElementById("picme").setAttribute("value","'.$picname.'");
                                          document.getElementById("blah").setAttribute("src","'.$picpath.'");
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
                            $picpath = "../../images/".$pic['r_value'];
                            echo "<div class = 'thumbnail col-md-4'><h3>".$picname."</h3>
                                  <img src = '".$picpath."'>
                                  <div class = 'caption'>
                                    <button class = 'center btn-info btn click' data-dismiss = 'modal' onclick = 'addElement".$pic_id."()'>Select</button>
                                  </div>
                                  </div>";
                            echo '<script>
                                  function addElement'.$pic_id.'(){
                                    (function(){
                                          document.getElementById("picme").disabled=false;
                                          document.getElementById("imgInp").disabled=true;
                                          document.getElementById("removepic").setAttribute("class","hide");
                                          document.getElementById("blah").setAttribute("class","uploadedpic");
                                          document.getElementById("imgInp").setAttribute("class","hide");
                                          document.getElementById("forcontent").setAttribute("class","hide");
                                          document.getElementById("fortitle").setAttribute("class","");
                                          document.getElementById("picme").setAttribute("class","asd");
                                          document.getElementById("picme").setAttribute("value","'.$picname.'");
                                          document.getElementById("blah").setAttribute("src","'.$picpath.'");
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
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script type='text/javascript' src="../../js/foredit.js"></script>
    <script src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../js/onclick.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>
</body>
</html>