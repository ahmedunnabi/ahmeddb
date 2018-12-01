<?php 

include('connect.php');
	// initialize variable
	$sID = "";
	$sName= "";
    $sContactNo = "";
	$pplAssigned = "";
	
	$update = false;

	if (isset($_POST['save'])) {

		$sID = $_POST['sID'];
		$sName= $_POST['sName'];
		$sContactNo = $_POST['sContactNo'];
        $pplAssigned = $_POST['pplAssigned'];




		mysqli_query($db, "INSERT INTO sales_13106 VALUES ('$sID', '$sName', '$sContactNo', '$pplAssigned')"); 
       $_SESSION['message'] = "SAVED!"; 
		header('location: sales13106.php');
	}

	if (isset($_POST['update'])) {
		$sID = $_POST['sID'];
		$sName = $_POST['sName'];
		$sContactNo = $_POST['sContactNo'];
        $pplAssigned = $_POST['pplAssigned'];
		
		mysqli_query($db, "UPDATE sales_13106 SET sID = '$sID', sName = '$sName', sContactNo = '$sContactNo', pplAssigned = '$pplAssigned' WHERE sID='$sID'");
		$_SESSION['message'] = "UPDATED"; 
		header('location: sales13106.php');
	}

if (isset($_GET['del'])) {
	$sID = $_GET['del'];
	mysqli_query($db, "DELETE FROM sales_13106 WHERE sID='$sID'");
	$_SESSION['message'] = "DELETED!"; 
	header('location: sales13106.php');
}


	$results = mysqli_query($db, "SELECT * FROM sales_13106");


?>