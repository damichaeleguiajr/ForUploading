<?php
session_start();
$u_id = $_SESSION['u_id'];
if(isset($_POST['proceed1'])){
	$r_id = $_SESSION['r_id'];
	$_SESSION['r_id'] = $r_id;
	if(isset($_POST['yesno'])){
		$yesno = "Yes";
	}else{
		$yesno = "No";
	}
	$date = $_POST['date'];
	$_SESSION['date'] = $date;
	$strttime = $_POST['strttime'];
	$_SESSION['strttime'] = $strttime;
	if(isset($_POST['guest'])){
		$guest = $_POST['guest'];
		$_SESSION['guest'] = $guest;
	}
	$address = $_POST['address'];
	$_SESSION['address'] = $address;
	$location = $_POST['location'];
	$_SESSION['location'] = $location;
	$type = $_POST['type'];
	$_SESSION['type'] = $_POST['type'];
	if($type=='Birthday'){
		if(isset($_POST['choice'])){
			$choice = $_POST['choice'];
			if($choice=='Color'){
				$motif = array();
				$motif = $_POST['motif'];
				$_SESSION['motif'] = array();
				$_SESSION['motif'] = $motif;
			} elseif($choice=='Theme'){
				if(empty($_FILES['uploadedpic']['name'])){
					$selectedpic = $_POST['selectedpic'];
					$_SESSION['selectedpic'] = $selectedpic;
				} else {
					$target_dir = "../Uploaded Images/".$u_id;
					$uploadedpic = $target_file = $target_dir . basename($_FILES['uploadedpic']['name']);
					//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					if(move_uploaded_file($_FILES["uploadedpic"]["tmp_name"], $target_file)){
					$_SESSION['uploadedpic'] = $uploadedpic;
					}
				}
			}
		}
	} else {
		$motif = array();
		$motif = $_POST['motif'];
		$_SESSION['motif'] = array();
		$_SESSION['motif'] = $motif;
	}
	if($yesno == 'No'){
		header('location:PN');
	}
	
}
?>