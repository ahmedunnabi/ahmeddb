<?php
	include('conn.php');
	$sql = "SELECT * FROM product_13106";
	$result = mysqli_query($conn, $sql);
	echo "<label>PRODUCT</label>";
	echo "<select type = 'text' id = 'searchinvid' class = 'form-control' name='PRODUCT'>";
	echo "<option value= ''>SELECT PRODUCT</option>";
	while ($row = mysqli_fetch_array($result)) {
	echo "<option value='" . $row['pCode'] ."'>" . $row['pBrand'] ."</option>";
	}
	echo "</select>";
?>



