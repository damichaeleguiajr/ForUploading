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
        $mnumber = $qry['mnumber'];
    }
}else{
    header('location:../../index.php');
}
if(isset($_POST['accept'])){
  $idd = $_GET['id'];
  $qry = mysql_query("UPDATE reservation_tbl SET r_status=1 WHERE r_id='$idd'");
  $selectall = mysql_query("SELECT * FROM reservation_tbl WHERE r_person_contact = '$idd'");
  while($result = mysql_fetch_array($selectall)){
    $mnumber = $result['r_person_contact'];
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
      $sms = itexmo($mnumber,"Reservation accepted. You can now pay/deposit at any BDO BRANCH NATIONWIDE.Account #:3213 4321 4322 3252. Thank You.","091683346637PH8MPZ9");
      echo $sms;
  }
  if($qry){
    $alert= "<script language=javascript>
                alert(\"Request Accepted.\");</script>";
            echo $alert;
  }
}
if(isset($_POST['decline'])){
  $idd = $_GET['id'];
  $qry = mysql_query("UPDATE reservation_tbl SET r_status=2 WHERE r_id='$idd'");
  $selectall = mysql_query("SELECT * FROM reservation_tbl WHERE r_person_contact = '$idd'");
  while($result = mysql_fetch_array($selectall)){
    $mnumber = $result['r_person_contact'];
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
      $sms = itexmo($mnumber,"Sorry your reservation is declined/rejected by the Administrator due to wrong input. Thank you.","091683346637PH8MPZ9");
      echo $sms;
  }
  if($qry){
    $alert= "<script language=javascript>
                alert(\"Request Declined.\");</script>";
            echo $alert;
      
  }
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Admin Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	
	   <link rel="stylesheet" href="../css/styles.css">
     <link href="../../fonts/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">
   <script src="../js/jquery-latest.min.js" type="text/javascript"></script>
   <script src="../js/script.js"></script>

    <!-- Custom styles for this template -->
    <link href="../dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>
    <script src="../js/dropdown.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
    function logout() {
    var txt;
    var r = confirm("Are you sure you want to logout?");
    if (r == true) {
        location.href='../logout.php';
    }
    };
    </script>
    <style>
    .centerthis{
      text-align: center;
     }
     .uploadedpic{
      width:250px;
      height: 275px;
    }
    .well1{
      min-height: 20px;
      margin-bottom: 200px;
      background-color: #fff;
    }
    .inner {
    width: 30%;
    margin: 200px auto;
}
    </style>
  </head>

  <body style = 'font-family:san;font-size:18px;'>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src = '../pic/logoliit.png' style = 'height:50px; width:260px; margin-top:-15px;'></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a style = 'color:#fff;' href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><?php echo $fname."&nbsp".$lname; ?><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Profile</a></li>
                <li><a href="#">Messages</a></li>
                <li class="divider"></li>
                <li><a href="#" onclick = 'logout()'>Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
	  <div class="col-sm-3 col-md-2 sidebar">
        <div id='cssmenu'>
			<ul>
			<li><a href='../index.php'><span>Home</span></a></li>
			<li class='has-sub'><a href='#'><span>User Accounts</span></a>
      <ul>
      <li><a href='../User-Accounts/admins.php'><span>Administrators</span></a></li>
      <li class='last'><a href='../User-Accounts/customers.php'><span>Customers</span></a></li>
      </ul>
      </li>
			<li class='has-sub'><a href='#'><span>Menu Maintenance</span></a>
			<ul>
			<li><a href='../Menu-Maintenance/partypackages.php'><span>Party Packages</span></a></li>
			<li class='last'><a href='Menu-Maintenance/itempackages.php'><span>Items</span></a></li>
			</ul>
			</li>
			<li class='has-sub'><a href='#'><span>Reservations</span></a>
			<ul>
			<li><a href='../Reservations/pending.php'><span>Pending Reservations</span></a></li>
      <li ><a href='../Reservations/approve.php'><span>Approved Reservations</span></a></li>
      <li><a href='../Reservations/declined.php'><span> Declined Reservations</span></a></li>
      <li class='last'><a href='../Reservations/payed.php'><span> Payed Reservations</span></a></li>
			</ul>
			</li>
			</ul>
			</div>
		</div>	

        <div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main well1'>
        <h1 class='page-header'>Pending Reservation</h1>
        <?php 
        if(isset($_GET['id'])){
          $idd = $_GET['id'];
          $users = mysql_query("SELECT * FROM reservation_tbl WHERE r_id = '$idd'");
          while($pending = mysql_fetch_array($users)){
          echo "<h2 class='sub-header'>Requested Reservations of Mr. ".$pending['r_person']."</h2>";
          echo "<div class='col-lg-12'>
                  <div class='col-lg-6'>
                  <h2>Contact Information</h2>
                    <table width='100%'>
                      <tbody>
                        <tr>
                          <td><label>Contact Person</label></td>
                          <td><input type='text' class='asd' value='".$pending['r_person']."' readonly><td>
                        </tr>
                        <tr>
                          <td><label>Contact Number</label></td>
                          <td><input type='text' class='asd' value='".$pending['r_person_contact']."' readonly><td>
                        </tr>
                        <tr>
                          <td><label>Contact Email</label></td>
                          <td><input type='text' class='asd' value='".$pending['r_person_email']."' readonly><td>
                        </tr>
                      </tbody>
                    </table>
                    <hr>
                    <h2>Event Information</h2>
                    <table width='100%'>
                      <tbody>
                        <tr>
                          <td><label>Type of Event:</label></td>
                          <td><input type='text' class='asd' value='".$pending['r_type']."' readonly></td>
                        </tr>";
                      if($pending['r_motif']==''){
                      }else {
                        $motif = $pending['r_motif'];
                        echo "<tr>
                                <td><label>Motif Color/s:</label></td>
                                <td><input type='text' class='asd' value='".$motif."' readonly></td>
                              </tr>";
                      }
                      if($pending['r_selectedpic']==''){
                      }else {
                        $selectedpic = $pending['r_selectedpic'];
                        echo "<tr>
                                <td><label>Party Theme:</label></td>
                                <td align='left'><img src='../".$selectedpic."' class='uploadedpic'></td>
                              </tr>";
                      }
                      if($pending['r_uploadedpic']==''){
                      }else {
                        $uploadedpic = $pending['r_uploadedpic'];
                        echo "<tr>
                                <td><label>Party Theme:</label></td>
                                <td align='left'><img src='../".$uploadedpic."' class='uploadedpic'></td>
                              </tr>";
                      }
                echo   "<tr>
                          <td><label>Date of Event:</label></td>
                          <td><input type='text' class='asd' value='".$pending['r_date']."' readonly>
                        </tr>
                        <tr>
                          <td><label>Time of Event:</label></td>
                          <td><input type='text' class='asd' value='".$pending['r_time']."' readonly>
                        </tr>
                        <tr>
                          <td><label>Location:</label></td>
                          <td><input type='text' class='asd' value='".$pending['r_location']."' readonly>
                        </tr>
                        <tr>
                          <td><label>Venue Address:</label></td>
                          <td><input type='text' class='asd' value='".$pending['r_address']."' readonly>
                        </tr>
                      </tbody>
                    </table>
                </div>
                <div class='col-lg-5 table-responsive'>
                <h2>Requested Item Party Needs</h2>
                  <table width='100%' class='table table-striped'>
                    <tbody>
                      <tr>
                        <th>Item Description</th>
                        <th>Quantity</th>
                      </tr>";
                  $itemname = $pending['r_nameofitem'];
                  $itemname = explode(",", $itemname);
                  $itemquantity = $pending['r_quanofitem'];
                  $itemquantity = explode(",", $itemquantity);
                  foreach(array_combine($itemname,$itemquantity) as $nameofitem => $quanofitem){
                        echo "<tr>";
                        echo "<td><input type='text' class='asd' value='".$nameofitem."' readonly></td>";
                        echo "<td><input type='text' class='asd' value='".$quanofitem."' readonly></td>";
                        echo "</tr>";
                      }
              echo   "</tbody>
                  </table>
                </div>
                <div class='col-lg-12 summary'>
                  <div class='col-lg-12' style='font-size:20px;padding-bottom:10px;' align='center'>
                    <h2>Request Summary</h2>
                    <hr>
                    <table width='50%'>
                      <tbody>
                        <tr height='40px'>
                          <td>Shipping Fee</td>
                          <td align='right'><span><input type='text' class='asd' value='".$pending['r_shipfee']."' readonly></span></td>
                        </tr>
                        <tr height='40px'>
                          <td>Additional Fee</td>
                          <td align='right'><span><input type='text' class='asd' value='".$pending['r_addfee']."' readonly></span></td>
                        </tr>
                        <tr height='40px' style='border-bottom:1px solid #e0e0e0'>
                          <td>Subtotal</td>
                          <td align='right'><span>₱<input type='text' class='asd' value='".$pending['r_totalamount']."' readonly></span></td>
                        </tr>
                        <tr height='40px'>
                          <td>Total</td>
                          <td align='right'><span>₱<input type='text' class='asd' value='".$pending['r_totalamount']."' readonly></span></td>
                        </tr>
                        <tr height='40px'>
                          <td>Downpayment(50%)</td>
                          <td align='right'><span>₱<input type='text' class='asd' value='".$pending['r_downpayment']."' readonly></span></td>
                        </tr>
                        <tr height='40px'>
                          <td>Cash on delivery(50%)</td>
                          <td align='right'><span>₱<input type='text' class='asd' value='".$pending['r_cashdeliver']."' readonly></span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>";
                  if($pending['r_status']==0){
                  echo "<div class='col-lg-12' align='center'>
                  <form method = 'POST' action = 'pending.php?id=".$idd."'>
                    <input type='submit' class='btn btn-success' name='accept' value='Accept this request'>
                    <input type='submit' class='btn btn-danger' name='decline' value='Decline this request'>
                  </form>
                  </div>";
                  } 
                echo "</div>";
            }
        } else {
          $users = mysql_query("SELECT * FROM reservation_tbl WHERE r_status=0");
          if(mysql_num_rows($users) > 0){
                echo "<div class='table-responsive' style = 'font-size:18px;'>
                <table class='table table-striped'>
                  <thead>
                    <tr>
                      <th>Reservation #</th>
                      <th>Customer Name</th>
                      <th>Type of Event</th>
                      <th>Date of Event</th>
                      <th>Time of Event</th>
                      <th>Reservation Total Ammount</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>";
                while($pending = mysql_fetch_array($users)){
                    echo "<tr>";
                      echo "<td>".$pending['r_id']."</td>";
                      echo "<td>".$pending['r_person']."</td>";
                      echo "<td>".$pending['r_type']."</td>";
                      echo "<td>".date('F j, Y', strtotime($pending['r_date']))."</td>";
                      echo "<td>".$pending['r_time']."</td>";
                      echo "<td><span>₱</span>".$pending['r_totalamount']."</td>";
                      echo "<td><button type = 'button' class = 'btn btn-success acceptit' id='".$pending['r_id']."' forthis='accept'><span class='fa fa-check'></span></button>
                                <a href='view.php?id=".$pending['r_id']."'><button type = 'button' class = 'btn btn-default' id=''><span class='fa fa-eye'></span></button></a>
                                <button type = 'button' class = 'btn btn-danger rejectit' id='".$pending['r_id']."' forthis='decline'><span class='fa fa-close'></span></button>
                              </td>";
                    echo "</tr>";
                  }
                  echo "</tbody>
                </table>
              </div>";
          }else{
            echo "<div class='inner'><p style='color:#686868;font-size:30px'>No pending reservations</p></div>";
          }
        }
        ?>  
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/ajax.js"></script>
    <script src="../js/jquery-1.11.2.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../js/vendor/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
