<?php
session_start();
include('../../connection.php');
$package_id = $_GET['id'];
if(!isset($_SESSION['package_id'])){
    $qry = mysql_query("SELECT * FROM packages_tbl where pk_id = ".$package_id."");
    while($pack = mysql_fetch_array($qry)){
        $message= "<script language=javascript>
        alert(\"".$pack['pk_name']." successfully added to cart\");</script>";
        echo $message;
        $message2 = "<script language=javascript> location.href='partyneeds.php' </script>";
        echo $message2;
        $budget = $_SESSION['budget'] - $pack['pk_price'];
        $_SESSION['budget'] = $budget;
        $_SESSION['package_id'][] = $package_id;
}
}else{
$packer = $_SESSION['package_id'];
$packer = array();
$qry = mysql_query("SELECT * FROM packages_tbl where pk_id = ".$package_id."");
while($pack = mysql_fetch_array($qry)){
    if(in_array($pack['pk_id'], $_SESSION['package_id'])){
        $message= "<script language=javascript>
        alert(\"".$pack['pk_name']." is already in the cart. Please choose another package.\");</script>";
        echo $message;
        $message2 = "<script language=javascript> location.href='partyneeds.php' </script>";
        echo $message2;
    }else{
            $message= "<script language=javascript>
            alert(\"".$pack['pk_name']." successfully added to cart\");</script>";
            echo $message;
            $message2 = "<script language=javascript> location.href='partyneeds.php' </script>";
            echo $message2;
            $budget = $_SESSION['budget'] - $pack['pk_price'];
            $_SESSION['budget'] = $budget;
        $_SESSION['package_id'][] = $package_id;
    }
}
}
?>