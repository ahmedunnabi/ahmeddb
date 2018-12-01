<?php 

include('connect.php');
	// initialize variable
	$uID = "";
	$uPassword= "";
        $uStatus = "";
	$sID = "";
	
	$update = false;

	if (isset($_POST['save'])) {

		$uID = $_POST['uID'];
		$uPassword= $_POST['uPassword'];
		$uStatus = $_POST['uStatus'];
        $sID = $_POST['sID'];




		mysqli_query($db, "INSERT INTO user_13106 VALUES ('$uID', '$uPassword', '$uStatus', '$sID')"); 
                
		$_SESSION['message'] = "SAVED!"; 
		header('location: user13106.php');
	}

	if (isset($_POST['update'])) {
		$uID = $_POST['uID'];
		$uPassword = $_POST['uPassword'];
		$uStatus = $_POST['uStatus'];
        $sID = $_POST['sID'];
		
		mysqli_query($db, "UPDATE user_13106 SET uID = '$uID', uPassword = '$uPassword', uStatus = '$uStatus', sID = '$sID' WHERE uID='$uID'");
		$_SESSION['message'] = "UPDATED"; 
		header('location: user13106.php');
	}

if (isset($_GET['del'])) {
	$uID = $_GET['del'];
	mysqli_query($db, "DELETE FROM user_13106 WHERE uID='$uID'");
	$_SESSION['message'] = "DELETED!"; 
	header('location: user13106.php');
}


	$results = mysqli_query($db, "SELECT * FROM user_13106");


?>