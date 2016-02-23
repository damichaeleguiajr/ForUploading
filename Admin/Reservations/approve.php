<!DOCTYPE html>
<?php 

include('../../connection.php');
session_start();
if(isset($_POST['accept'])){
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
  $idd = $_GET['id'];
  $qry = mysql_query("UPDATE reservation_tbl SET r_status=1 WHERE r_id='$idd'");
  $tex = mysql_query("SELECT * FROM reservation_tbl WHERE r_user = 'idd'");
  if($qry){
    while($fortext=mysql_fetch_array($tex)){
    $mnumber=$fortext['r_person_contact'];
    $sms = itexmo($mnumber,"Your request has been approved.","099969793775_A42l5");
    echo $sms;
    }
    $alert= "<script language=javascript>
                alert(\"Request Accepted.\");</script>";
            echo $alert;
  }
}
if(isset($_POST['decline'])){
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
  $idd = $_GET['id'];
  $qry = mysql_query("UPDATE reservation_tbl SET r_status=2 WHERE r_id='$idd'");
  $tex = mysql_query("SELECT * FROM reservation_tbl WHERE r_user = 'idd'");
  if($qry){
    while($fortext=mysql_fetch_array($tex)){
    $mnumber=$fortext['r_person_contact'];
    $sms = itexmo($mnumber,"Your request has been denied.","099969793775_A42l5");
    echo $sms;
    }
    $alert= "<script language=javascript>
                alert(\"Request Declined.\");</script>";
            echo $alert;
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
    width: 40%;
    margin: 240px auto;
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
			<li class='active'><a href='../index.php'><span>Home</span></a></li>
			<li class='has-sub'><a href='#'><span>User Accounts</span></a>
      <ul>
      <li><a href='../User-Accounts/admins.php'><span>Administrators</span></a></li>
      <li class='last'><a href='../User-Accounts/customers.php'><span>Customers</span></a></li>
      </ul>
      </li>
			<li class='has-sub'><a href='#'><span>Menu Maintenance</span></a>
			<ul>
			<li><a href='../Menu-Maintenance/partypackages.php'><span>Party Packages</span></a></li>
			<li class='last'><a href='../Menu-Maintenance/itempackages.php'><span>Items</span></a></li>
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
        <h1 class='page-header'>Approved Reservations</h1>
        <?php 
        $users = mysql_query("SELECT * FROM reservation_tbl WHERE r_status=1");
          if(mysql_num_rows($users) > 0){
                echo "<div class='table-responsive' style = 'font-size:18px;'>
                <table class='table table-striped'>
                  <thead>
                    <tr>
                      <th>Customer</th>
                      <th>Customer Contact #</th>
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
                       echo "<td>".$pending['r_person']."</td>";
                      echo "<td>".$pending['r_person_contact']."</td>";
                      echo "<td>".$pending['r_type']."</td>";
                      echo "<td>".$pending['r_time']."</td>";
                      echo "<td>".date('F j, Y', strtotime($pending['r_date']))."</td>";
                      echo "<td><span>₱</span>".$pending['r_totalamount']."</td>";
                      echo "<td><a href='pending.php?id=".$pending['r_id']."'><button type = 'button' class = 'btn btn-default' id=''><span class='fa fa-eye'></span></button></a>
                              </td>";
                    echo "</tr>";
                  }
                  echo "</tbody>
                </table>
              </div>";
          }else{
            echo "<div class='inner'><p style='color:#686868;font-size:30px'>No approved reservations</p></div>";
          }
        ?>  
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-1.11.2.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../js/vendor/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
