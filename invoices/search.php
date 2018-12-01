<?php
	include('conn.php');
	if(isset($_POST['searchprod'])){
		$pCode=$_POST['pCode'];
		$query = mysqli_query($conn, "SELECT * FROM product_13106 WHERE pCode = '$pCode'");
		$row = mysqli_fetch_array($query);
		echo json_encode($row);
	}
	else if(isset($_POST['search'])){
		$customerid=$_POST['customerid'];
		$query = mysqli_query($conn, "SELECT * FROM customer_13106 WHERE customerid = '$customerid'");
		$row = mysqli_fetch_array($query);
		echo json_encode($row);
	}
?>

