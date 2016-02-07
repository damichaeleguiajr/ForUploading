<!DOCTYPE html>
<?php 

include('../../connection.php');
session_start();
if(isset($_SESSION['u_id'])){
$u_id = $_SESSION['u_id'];
if(isset($_POST['validate'])){
  $idr = $_POST['idr'];
  $qry=mysql_query("UPDATE payed_customer_tbl SET py_validated=1 WHERE py_r_id='$idr'");
  if($qry){
  $alert= "<script language=javascript>
                alert(\"Validated!\");</script>";
  echo $alert;
  } 
}
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
    <link rel="icon" href="../../../favicon.ico">

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

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1><i>Transactions</i></h1>
        <hr>
          <div class='row'>
            <div class='col-lg-12'>
              <div class='panel panel-default'>
                <div class='panel-body'>
                  <div class='table-responsive'>
                    <table class='table table-bordered table-hover table-striped'>
                      <thead>
                        <tr> 
                          <td>Reservation #</td>
                          <td>Customer Name</td>
                          <td>Reservation Amount</td>
                          <td>Downpayment</td>
                          <td>Referrence #</td>
                          <td>Mode of Payment</td>
                          <td>Validate</td>
                        </tr>
                      </thead>
                      <?php
                      echo "<tbody>";
                      $selectpay = mysql_query("SELECT * FROM payed_customer_tbl");
                      while($pquery=mysql_fetch_array($selectpay)){
                        $r_id = $pquery['py_r_id'];
                        $r_downpayment = $pquery['py_ammount'];
                        $r_referrence = $pquery['py_referrence'];
                        $r_payed = $pquery['py_validated'];
                        $r_paytype = $pquery['py_typepayment'];
                        $selectreserve = mysql_query("SELECT * FROM reservation_tbl WHERE r_id='$r_id' AND r_status=1");
                        while($rquery=mysql_fetch_array($selectreserve)){
                          echo "<tr>";
                          echo "<td>".$rquery['r_id']."</td>";
                          echo "<td>".$rquery['r_person']."</td>";
                          echo "<td>".$rquery['r_totalamount']."</td>";
                          echo "<td>".number_format($r_downpayment,2)."</td>";
                          echo "<td>".$r_referrence."</td>";
                          if($r_paytype=='0'){
                            echo "<td width='10%' align='center'><span>Partial</span></td>";
                          } else {
                            echo "<td width='10%' align='center'><span>Full</span></td>";
                          }
                          if($r_payed=='1'){
                            echo "<td align='center'><span style='color:green'>Validated</span></td>";
                          } else {
                            echo "<td align='center'>
                            <form method='POST' action='payed.php'>
                                  <input type='text' class='hide' value='".$rquery['r_id']."' name='idr'>
                                  <input type = 'submit' class = 'btn btn-success validatee' id='".$rquery['r_id']."' name='validate' value='Validate'>
                            </form>
                                </td>";
                            echo "</tr>";
                          }
                        }
                      }
                      echo "</tbody>";
                      ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>
           
    </script>
    <script src="../js/jquery-1.11.2.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../js/vendor/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
