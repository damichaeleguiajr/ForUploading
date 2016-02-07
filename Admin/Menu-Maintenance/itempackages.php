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
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../favicon.ico">

    <title>Admin Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	  <link href="../../fonts/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">
	   <link rel="stylesheet" href="../css/styles.css">
   <script src="../js/jquery-latest.min.js" type="text/javascript"></script>
   <script src="../js/script.js"></script>

    <!-- Custom styles for this template -->
    <link href="../dashboard.css" rel="stylesheet">
    <script src="../js/dropdown.js"></script>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

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
        <div class="navbar-collapse collapse">
        <!-- Right nav -->
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
    </div><!--/.nav-collapse -->
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
      <li class = 'last'><a href='../User-Accounts/customers.php'><span>Customers</span></a></li>
      </ul>
      </li>
			<li class='has-sub'><a href='#'><span>Menu Maintenance</span></a>
			<ul>
			<li><a href='partypackages.php'><span>Party Packages</span></a></li>
			<li class='last'><a href='#'><span>Items</span></a></li>
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
          <h1 class="page-header">Menu Maintenance</h1>
          <?php
          $users = mysql_query("SELECT * FROM users_tbl where u_type = '1'");
          $num_rows = mysql_num_rows($users);
          ?>
          <h2 class="sub-header">Items <button class='btn btn-success' id='forAddButton'><span class="fa fa-plus"></span> Add Item</button></h2>
          <div class="table-responsive col-sm-6" style = 'font-size:18px;'>
            <form class="form-horizontal" action=''> 
                <fieldset>
                    <table width = '100%' id='myTable' class='table table-striped'>
                          <tr>
                            <th>Item name</th>
                            <th>Item Price</th>
                            <th>Action</th>
                          </tr>
                        <?php
                        $i = 0;
                        $qryitems = mysql_query("SELECT * FROM item_tbl ORDER BY i_name");
                        while($selectedpackage = mysql_fetch_array($qryitems)){
                          $itemname = $selectedpackage['i_name'];
                          $itemprice = $selectedpackage['i_price'];
                          $itemid = $selectedpackage['i_id'];
                          echo "<tr>";
                          echo  "<td><input class='asd' type='text' value='".$itemname."' sample='".$itemid."'></td>";
                          echo  "<td>₱".$itemprice."</td>";
                          echo  "<td><button type = 'button' class = 'btn btn-success editmenow' id='".$itemid."'><span class='fa fa-edit'></span></button>
                                     <button type = 'button' class = 'btn btn-danger deletemenow' id='".$itemid."'><span class='fa fa-trash-o'></span></button>
                                </td>";
                          echo "</tr>";
                          $i++;
                        }
                        ?>
                    </table>
                </fieldset>
              </form>
          </div>
          <div class="table-responsive col-sm-6" style = 'font-size:18px;'>
          <h2 class="sub-header hide" id='addHideFirst'>Add</h2>
            <table class='table table-striped hide' id="addThisNow">
            <form>
              <tr>
                <td>Item Name:</td>
                <td><input type='text' id='addName'></td>
              </tr>
              <tr>
                <td>Item Price:</td>
                <td><input type='text' id='priceName'></td>
              </tr>
            </table>
            <div class="col-sm-12 hide" align="center" id='addShow'>
              <button class="btn btn-success addMeNow"><span class="fa fa-save"></span> Save</button>
              <button class="btn btn-danger" id='cancelme'><span class="fa fa-close"></span> Cancel</button>
            </div>
            </form>
            <h2 class="sub-header hide" id='headerHide'>Edit</h2>
            <table class='table table-striped' id="editThisNow">
            </table>
            <div class="col-sm-12 hide" align="center" id='hideShow'>
              <button class="btn btn-success choosemenow" value=''><span class="fa fa-save"></span> Save</button>
              <button class="btn btn-danger" id='cancelme'><span class="fa fa-close"></span> Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-1.11.2.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/ajax.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../js/vendor/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
