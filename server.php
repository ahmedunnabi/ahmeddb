<?php 
include('connect.php');
	// initialize variable
	$cNAME = "";
	$customerid = "";
	$cContactNo = "";
    $cAddress = "";
	$cCNIC = "";
	$cSID = "";
	
	$update = false;

	if (isset($_POST['save'])) {

		$customerid = $_POST['customerid'];
		$cNAME = $_POST['cNAME'];
        $cContactNo = $_POST['cContactNo'];
		$cAddress = $_POST['cAddress'];
		$cCNIC = $_POST['cCNIC'];
		$cSID = $_POST['cSID'];




		mysqli_query($db, "INSERT INTO customer_13106 VALUES ('$customerid', '$cNAME', '$cContactNo', '$cAddress', '$cCNIC', '$cSID')"); 
                
		$_SESSION['message'] = "SAVED!"; 
		header('location: ahmed13106.php');
	}

	if (isset($_POST['update'])) {
		$customerid = $_POST['customerid'];
		$cNAME = $_POST['cNAME'];
        $cContactNo = $_POST['cContactNo'];
		$cAddress = $_POST['cAddress'];
		$cCNIC = $_POST['cCNIC'];
        $cSID = $_POST['cSID'];

		mysqli_query($db, "UPDATE customer_13106 SET customerid = '$customerid', cNAME = '$cNAME', cContactNo = '$cContactNo', cAddress = '$cAddress', cCNIC = '$cCNIC', cSID = '$cSID' WHERE customerid='$customerid'");
		$_SESSION['message'] = "UPDATED"; 
		header('location: ahmed13106.php');
	}

if (isset($_GET['del'])) {
	$customerid = $_GET['del'];
	mysqli_query($db, "DELETE FROM customer_13106 WHERE customerid='$customerid'");
	$_SESSION['message'] = "DELETED!"; 
	header('location: ahmed13106.php');
}


	$results = mysqli_query($db, "SELECT * FROM customer_13106");


?>