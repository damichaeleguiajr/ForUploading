<?php
session_start();
if(isset($_POST['submit'])){
        $celname = $_POST['name'];
        $celage = $_POST['age'];
        $budget = $_POST['budget'];

        $_SESSION['celname'] = $celname;
        $_SESSION['celage'] = $celage;
        $_SESSION['budget'] = number_format($budget, 2, '.', '');

        header('location:partyneeds.php');
        }
?>