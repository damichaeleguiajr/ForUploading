<?php
session_start();
include('../../connection.php');
if(isset($_POST['submit'])){
$package_id = $_POST['id'];
$quantity = $_POST['quantity'];
if($_SESSION['sum'] > $_SESSION['budget']){
    $message= "<script language=javascript>
        alert(\"You don't have enough budget to add this to your cart.\");</script>";
        echo $message;
        $message2 = "<script language=javascript> location.href='partyfoods.php' </script>";
        echo $message2;
}else{
if(!isset($_SESSION['food_id'])){
    $qry = mysql_query("SELECT * FROM foodpackage_tbl where p_id = ".$package_id."");
    while($pack = mysql_fetch_array($qry)){
        $message= "<script language=javascript>
        alert(\"".$pack['p_name']." successfully added to cart\");</script>";
        echo $message;
        $message2 = "<script language=javascript> location.href='partyfoods.php' </script>";
        echo $message2;
        $tot = $quantity * $pack['p_price'];
        $budget = $_SESSION['budget'] - $tot;
        $_SESSION['budget'] = $budget;
        $_SESSION['food_id'][] = $package_id;
        $_SESSION['quantity'][] = $quantity;
}
}else{
$packer = $_SESSION['food_id'];
$packer = array();
$qry = mysql_query("SELECT * FROM foodpackage_tbl where p_id = ".$package_id."");
while($pack = mysql_fetch_array($qry)){
    if(in_array($pack['p_id'], $_SESSION['food_id'])){
        $message= "<script language=javascript>
        alert(\"".$pack['p_name']." is already in the cart. Please choose another package.\");</script>";
        echo $message;
        $message2 = "<script language=javascript> location.href='partyfoods.php' </script>";
        echo $message2;
    }else{
            $message= "<script language=javascript>
            alert(\"".$pack['p_name']." successfully added to cart\");</script>";
            echo $message;
            $message2 = "<script language=javascript> location.href='partyfoods.php' </script>";
            echo $message2;
            $tot = $quantity * $pack['p_price'];
        $budget = $_SESSION['budget'] - $tot;
        $_SESSION['budget'] = $budget;
        $_SESSION['food_id'][] = $package_id;
        $_SESSION['quantity'][] = $quantity;
    }
}
}
}
}
?>