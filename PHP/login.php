<?php
session_start();
include('../connection.php');

if(isset($_POST['submit'])){

    $uname = $_POST['username'];
    $pass = $_POST['password'];

    if(!$_POST['username'] && !$_POST['password'] || !$_POST['username'] || !$_POST['password']){
                
                $message= "<script language=javascript>
                alert(\"Please type your username or password.\");</script>";
                echo $message;
                $message2 = "<script language=javascript> location.href='../index.html' </script>";
                echo $message2;

    }else{
            $qry = mysql_query("select * from users_tbl where u_acc = '$uname'");
            $result = $qry;
                    while($qry = mysql_fetch_array($result)){
                    $acc = $qry['u_acc'];
                    $u_pass = $qry['u_pass'];
                    $u_id = $qry['u_id'];
                    $u_fname = $qry['u_fname'];
                    $u_lname = $qry['u_lname'];
                    $u_type = $qry['u_type'];

            }
            if($uname == @$acc && $pass == @$u_pass){
                $_SESSION['u_id'] = $u_id;
                if($u_type == "0"){
                    $alert= "<script language=javascript>
                    alert(\"Hi ".@$u_fname." ".@$u_lname."! Welcome to Eh Kasi Bata Rentals and Party Needs!\");</script>";
                    echo $alert;
                    $message2 = "<script language=javascript> location.href='..User/index.php' </script>";
                    echo $message2;
                }elseif($u_type == "1"){
                    $alert= "<script language=javascript>
                    alert(\"Welcome Administrator ".@$u_fname." ".@$u_lname."!\");</script>";
                    echo $alert;
                    $message2 = "<script language=javascript> location.href='../Admin/index.php' </script>";
                    echo $message2;
                }
            }else{

                $message= "<script language=javascript>
                alert(\"Wrong account or password. Please try again.\");</script>";
                echo $message;
                $message2 = "<script language=javascript> location.href='../index.php' </script>";
                echo $message2;

            }
        }
}

?>