<?php
	include('conn.php');
	$customerid = $_POST['searchid'];
	$sql = "SELECT * FROM invoice_13106 WHERE customerid = '$customerid'";
	$result = mysqli_query($conn, $sql);
	echo "<label>INVOICE ID</label>";
	echo "<select type = 'text' id = 'searchinvid' class = 'form-control' name='customerid'>";
	echo "<option value= ''>SELECT INVOICE</option>";
	while ($row = mysqli_fetch_array($result)) {
	echo "<option value='" . $row['invid'] ."'>" . $row['invid'] ."</option>";
	}
	echo "</select>";
?>


