<?php
	include('conn.php');
	if(isset($_POST['add'])){
		$invid=$_POST['invid'];
		$Date=$_POST['Date'];
		$customerid=$_POST['customerid'];
						
		if(!mysqli_query($conn,"insert into invoice_13106 values ('$invid', '$Date','$customerid')"))
			echo 'Failed to add. Make sure INVOICE ID is unique';
	}
	else if(isset($_POST['additem'])){
		$invid=$_POST['invid'];
		$pCode=$_POST['pCode'];
		$Quantity=$_POST['Quantity'];
		$Discount=$_POST['Discount'];
		if(!mysqli_query($conn,"insert into salesorder_13106(invid,pCode,Quantity,Discount) values ('$invid', '$pCode','$Quantity','$Discount')"))
			echo "Failed to add.";
	}
?>
