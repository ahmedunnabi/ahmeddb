<?php
	include('conn.php');
	if(isset($_POST['del'])){
		$id=$_POST['id'];
		mysqli_query($conn,"delete from salesorder_13106 where invid='$id'");
		mysqli_query($conn,"delete from invoice_13106 where invid='$id'");
	}
	else if(isset($_POST['delitem'])){
		$id=$_POST['id'];
		mysqli_query($conn,"delete from salesorder_13106 where ID='$id'");
	}
?>
