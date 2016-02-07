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
        .carousel .item>img {
            max-width: 100%;
            height: 100%;
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
            if(str >= "12" < "08"){
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
    <div class = 'col-lg-12 padding-bot' style = 'font-family:san;text-align:center'>
                <div class = 'col-lg-6' style = 'font-size:20px'>
                    <form method = 'POST' action = '#'>
                    <table id = 'myTable' style = 'width:100%'>
                        <tr>
                            <th width = '150px;'>Item Name</th>
                            <th width = '150px;'>Quantity</th>
                            <th width = '150px;'>Price</th>
                            <th width = '150px;'>Action</th>
                        </tr>
                    </table>
                    <br>
                    <input type = 'submit' class = 'btn btn-success' name = 'submit' value = 'Proceed'>
                    <br>
                    </form>
                </div>
                <div class = 'col-lg-6 scroll' style = 'height: 500px;font-size:18px;text-align:left;'>
                <h2>Utensils</h2>
                    <table border = "1">
                        <tr>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Action</th>
                        </tr>
                     <?php
                        $i = 0;
                        $qryitems = mysql_query("SELECT * FROM item_tbl where i_category = 'Utensils' order by i_price");
                        while($thisrow = mysql_fetch_array($qryitems)){
                            $iname = $thisrow['i_name'];
                            $iprice = $thisrow['i_price'];
                            $i_id = $thisrow['i_id'];
                            echo "<style> tr.space > td{padding-bottom:5px;text-align:left;}</style>";
                            echo "<style> .center{width:100px;}</style>";
                                echo '<tr class = "space">';
                                echo '<tr class = "space">';
                                echo '<td width = "300px">'.$iname.'</td>';
                                echo '<td width = "100px">₱'.$iprice.'</td>';
                                echo '<td width = "100px"><button class = "center btn-info btn click" onclick = "addElement'.$i_id.'()">Add</button></td>';
                                echo '</tr>';
                            echo '<script>
                            function addElement'.$i_id.'(){
                                if(!document.getElementById("'.$i_id.'")){
                                $("#myTable tbody").append("<tr id = \'tomulti\' class = \'space\'>"+"<td>'.$iname.'<input type = \'text\' name = \'item[]\' id = \''.$i_id.'\' value = \''.$iname.'\' hidden></td>"+
                                    "<td><input type = \'text\' style = \'width:50px\' name = \'quan[]\' maxlength = \'3\' value = \'1\' id = \'permup\' onchange=\'up()\'></td>"+
                                    "<td hidden><input type = \'text\' style = \'width:50px\' maxlength = \'3\' id = \'multiply\' value ='.$iprice.'></td>"+
                                    "<td><span id=\'totalprice\'></span></td>"+
                                    "<td><a style = \'cursor:pointer\' onclick = \'$(this).parent().parent().remove();\'>Remove</a></td>"+
                                    "</tr>");
                                }else{
                                    alert("Already in the list.");
                                }
                            };
                            </script>';
                            $i++;
                        }
                    ?>
                    <script>
                    function up(){
                        var x = document.getElementById("permup").value;
                        var y = document.getElementById("multiply").value;
                        var i;
                        for(i=0;i<x.length;i++){
                            text += x[i];
                        }

                        document.getElementById("totalprice").innerHTML = text;
                        
                    }
                    </script>
                    </table>
                    <h2>Tables</h2>
                    <table border = "1">
                        <tr>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Action</th>
                        </tr>
                     <?php
                        $i = 0;
                        $qryitems = mysql_query("SELECT * FROM item_tbl where i_category = 'Table' order by i_price");
                        while($thisrow = mysql_fetch_array($qryitems)){
                            $iname = $thisrow['i_name'];
                            $iprice = $thisrow['i_price'];
                            $i_id = $thisrow['i_id'];
                            echo "<style> tr.space > td{padding-bottom:5px;}</style>";
                            echo "<style> .center{width:100px;}</style>";
                                echo '<tr class = "space">';
                                echo '<tr class = "space">';
                                echo '<td width = "300px">'.$iname.'</td>';
                                echo '<td width = "100px">₱'.$iprice.'</td>';
                                echo '<td width = "100px"><button class = "center btn-info btn click" onclick = "addElement'.$i_id.'()">Add</button></td>';
                                echo '</tr>';
                            echo '<script>
                            function addElement'.$i_id.'(){
                                if(!document.getElementById("'.$i_id.'")){
                                $("#myTable tbody").append("<tr>"+"<td width = \'100px\'><label>'.$iname.'</label><input type = \'text\' name = \'item[]\' id = \''.$i_id.'\' value = \''.$iname.'\' hidden></td>"+
                                    "<td><input type = \'text\' style = \'width:50px\' name = \'quan[]\' maxlength = \'3\'></td>"+
                                    "<td><a style = \'cursor:pointer\' onclick = \'$(this).parent().parent().remove();\'>Remove</a></td>"+
                                    "</tr>");
                                }else{
                                    alert("Already in the list.");
                                }
                            };
                            </script>';
                            $i++;
                        }
                    ?>
                    </table>
                    <h2>Chairs</h2>
                    <table border = "1">
                        <tr>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Action</th>
                        </tr>
                     <?php
                        $i = 0;
                        $qryitems = mysql_query("SELECT * FROM item_tbl where i_category = 'Chair' order by i_price");
                        while($thisrow = mysql_fetch_array($qryitems)){
                            $iname = $thisrow['i_name'];
                            $iprice = $thisrow['i_price'];
                            $i_id = $thisrow['i_id'];
                            echo "<style> tr.space > td{padding-bottom:5px;}</style>";
                            echo "<style> .center{width:100px;}</style>";
                                echo '<tr class = "space">';
                                echo '<tr class = "space">';
                                echo '<td width = "300px">'.$iname.'</td>';
                                echo '<td width = "100px">₱'.$iprice.'</td>';
                                echo '<td width = "100px"><button class = "center btn-info btn click" onclick = "addElement'.$i_id.'()">Add</button></td>';
                                echo '</tr>';
                            echo '<script>
                            function addElement'.$i_id.'(){
                                if(!document.getElementById("'.$i_id.'")){
                                $("#myTable tbody").append("<tr class = \'space\'>"+"<td><label>'.$iname.'</label><input type = \'text\' name = \'item[]\' id = \''.$i_id.'\' value = \''.$iname.'\' hidden></td>"+
                                    "<td><input type = \'text\' style = \'width:50px\' name = \'quan[]\' maxlength = \'3\'></td>"+
                                    "<td><a style = \'cursor:pointer\' onclick = \'$(this).parent().parent().remove();\'>Remove</a></td>"+
                                    "</tr>");
                                }else{
                                    alert("Already in the list.");
                                }
                            };
                            </script>';
                            $i++;
                        }
                    ?>
                    </table>
                    <h2>Audio Visuals</h2>
                    <table border = "1">
                        <tr>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Action</th>
                        </tr>
                     <?php
                        $i = 0;
                        $qryitems = mysql_query("SELECT * FROM item_tbl where i_category = 'AudioVisuals' order by i_price");
                        while($thisrow = mysql_fetch_array($qryitems)){
                            $iname = $thisrow['i_name'];
                            $iprice = $thisrow['i_price'];
                            $i_id = $thisrow['i_id'];
                            echo "<style> tr.space > td{padding-bottom:5px;}</style>";
                            echo "<style> .center{width:100px;}</style>";
                                echo '<tr class = "space">';
                                echo '<tr class = "space">';
                                echo '<td width = "300px">'.$iname.'</td>';
                                echo '<td width = "100px">₱'.$iprice.'</td>';
                                echo '<td width = "100px"><button class = "center btn-info btn click" onclick = "addElement'.$i_id.'()">Add</button></td>';
                                echo '</tr>';
                            echo '<script>
                            function addElement'.$i_id.'(){
                                if(!document.getElementById("'.$i_id.'")){
                                $("#myTable tbody").append("<tr class = \'space\'>"+"<td><label>'.$iname.'</label><input type = \'text\' name = \'item[]\' id = \''.$i_id.'\' value = \''.$iname.'\' hidden></td>"+
                                    "<td><input type = \'text\' style = \'width:50px\' name = \'quan[]\' maxlength = \'3\'></td>"+
                                    "<td><a style = \'cursor:pointer\' onclick = \'$(this).parent().parent().remove();\'>Remove</a></td>"+
                                    "</tr>");
                                }else{
                                    alert("Already in the list.");
                                }
                            };
                            </script>';
                            $i++;
                        }
                    ?>
                    </table>
                    <h2>Clothing</h2>
                    <table border = "1">
                        <tr>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Action</th>
                        </tr>
                     <?php
                        $i = 0;
                        $qryitems = mysql_query("SELECT * FROM item_tbl where i_category = 'Clothing' order by i_price");
                        while($thisrow = mysql_fetch_array($qryitems)){
                            $iname = $thisrow['i_name'];
                            $iprice = $thisrow['i_price'];
                            $i_id = $thisrow['i_id'];
                            echo "<style> tr.space > td{padding-bottom:5px;}</style>";
                            echo "<style> .center{width:100px;}</style>";
                                echo '<tr class = "space">';
                                echo '<tr class = "space">';
                                echo '<td width = "300px">'.$iname.'</td>';
                                echo '<td width = "100px">₱'.$iprice.'</td>';
                                echo '<td width = "100px"><button class = "center btn-info btn click" onclick = "addElement'.$i_id.'()">Add</button></td>';
                                echo '</tr>';
                            echo '<script>
                            function addElement'.$i_id.'(){
                                if(!document.getElementById("'.$i_id.'")){
                                $("#myTable tbody").append("<tr class = \'space\'>"+"<td><label>'.$iname.'</label><input type = \'text\' name = \'item[]\' id = \''.$i_id.'\' value = \''.$iname.'\' hidden></td>"+
                                    "<td><input type = \'text\' style = \'width:50px\' name = \'quan[]\' maxlength = \'3\'></td>"+
                                    "<td><a style = \'cursor:pointer\' onclick = \'$(this).parent().parent().remove();\'>Remove</a></td>"+
                                    "</tr>");
                                }else{
                                    alert("Already in the list.");
                                }
                            };
                            </script>';
                            $i++;
                        }
                    ?>
                    </table>
                    <h2>Entertainment</h2>
                    <table border = "1">
                        <tr>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Action</th>
                        </tr>
                     <?php
                        $i = 0;
                        $qryitems = mysql_query("SELECT * FROM item_tbl where i_category = 'Entertainment' order by i_price");
                        while($thisrow = mysql_fetch_array($qryitems)){
                            $iname = $thisrow['i_name'];
                            $iprice = $thisrow['i_price'];
                            $i_id = $thisrow['i_id'];
                            echo "<style> tr.space > td{padding-bottom:5px;}</style>";
                            echo "<style> .center{width:100px;}</style>";
                                echo '<tr class = "space">';
                                echo '<tr class = "space">';
                                echo '<td width = "300px">'.$iname.'</td>';
                                echo '<td width = "100px">₱'.$iprice.'</td>';
                                echo '<td width = "100px"><button class = "center btn-info btn click" onclick = "addElement'.$i_id.'()">Add</button></td>';
                                echo '</tr>';
                            echo '<script>
                            function addElement'.$i_id.'(){
                                if(!document.getElementById("'.$i_id.'")){
                                $("#myTable tbody").append("<tr class = \'space\'>"+"<td><label>'.$iname.'</label><input type = \'text\' name = \'item[]\' id = \''.$i_id.'\' value = \''.$iname.'\' hidden></td>"+
                                    "<td><input type = \'text\' style = \'width:50px\' name = \'quan[]\' maxlength = \'3\'></td>"+
                                    "<td><a style = \'cursor:pointer\' onclick = \'$(this).parent().parent().remove();\'>Remove</a></td>"+
                                    "</tr>");
                                }else{
                                    alert("Already in the list.");
                                }
                            };
                            </script>';
                            $i++;
                        }
                    ?>
                    </table>
                    <h2>Others</h2>
                    <table border = "1">
                        <tr>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Action</th>
                        </tr>
                     <?php
                        $i = 0;
                        $qryitems = mysql_query("SELECT * FROM item_tbl where i_category = 'Others' order by i_price");
                        while($thisrow = mysql_fetch_array($qryitems)){
                            $iname = $thisrow['i_name'];
                            $iprice = $thisrow['i_price'];
                            $i_id = $thisrow['i_id'];
                            echo "<style> tr.space > td{padding-bottom:5px;}</style>";
                            echo "<style> .center{width:100px;}</style>";
                                echo '<tr class = "space">';
                                echo '<tr class = "space">';
                                echo '<td width = "300px">'.$iname.'</td>';
                                echo '<td width = "100px">₱'.$iprice.'</td>';
                                echo '<td width = "100px"><button class = "center btn-info btn click" onclick = "addElement'.$i_id.'()">Add</button></td>';
                                echo '</tr>';
                            echo '<script>
                            function addElement'.$i_id.'(){
                                if(!document.getElementById("'.$i_id.'")){
                                $("#myTable tbody").append("<tr class = \'space\'>"+"<td><label>'.$iname.'</label><input type = \'text\' name = \'item[]\' id = \''.$i_id.'\' value = \''.$iname.'\' hidden></td>"+
                                    "<td><input type = \'text\' style = \'width:50px\' name = \'quan[]\' maxlength = \'3\'></td>"+
                                    "<td><a style = \'cursor:pointer\' onclick = \'$(this).parent().parent().remove();\'>Remove</a></td>"+
                                    "</tr>");
                                }else{
                                    alert("Already in the list.");
                                }
                            };
                            </script>';
                            $i++;
                        }
                    ?>
                    </table>
                       <script tpye = 'text/javascript'>
                       function deleteRow(){
                           var del = $(this).parent().parent();
                           del.remove();
                        }

                       </script>
                </div>
            </div>
        </div>
    </div>

    <!-- /.container -->

    <!-- jQuery -->
    <script src="../../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>

</body>

</html>
