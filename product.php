
<?php 
 include('homepage.php');
 include('server1.php');


	if (isset($_GET['edit'])) {
		$pCode = $_GET['edit'];

		$update = true;
		$record = mysqli_query($db, "SELECT * FROM product_13106 WHERE pCode='$pCode'");

	
			$n = mysqli_fetch_array($record);
			$pCode = $n['pCode'];
			$pBrand = $n['pBrand'];
                        $pType = $n['pType'];
                 			$pShade  = $n['pShade']; 
							$pSize  = $n['pSize']; 
							$pPrice  = $n['pPrice']; 

		

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PRODUCT</title>
	<link rel="stylesheet" pType="text/css" href="style.css">
</head>
<body>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>



<table>
	
	<thead>
		<tr>

			<h3> PRODUCT_13106 INFORMATION </h3>


			<th>pCode</th>
			<th>pBrand</th>
			<th>pType</th>
			<th>pShade</th>
			<th>pSize</th>
			<th>pPrice</th>
			
	<?php 

	
	$results = mysqli_query($db, "SELECT * FROM product_13106"); 
	if(!$results){
	}
	 while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['pCode']; ?></td>
			<td><?php echo $row['pBrand']; ?></td>
			<td><?php echo $row['pType']; ?></td>
			<td><?php echo $row['pShade']; ?></td>
			<td><?php echo $row['pSize']; ?></td>
			<td><?php echo $row['pPrice']; ?></td>
			<td>
				<a href="product.php?edit=<?php echo $row['pCode']; ?>" class="edit_btn" >Edit</a>
			
				<a href="server1.php?del=<?php echo $row['pCode']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server1.php" >

	<input Type="hidden" name="pCode" value="<?php echo $pCode; ?>">
	<div class="input-group">

		
	
	<div class="input-group">
		<label>pCode</label>
		<input Type="text" name="pCode" value="<?php echo $pCode; ?>">
	</div>	
	<div class="input-group">
		<label>pBrand</label>
		<input Type="text" name="pBrand" value="<?php echo $pBrand; ?>">
	</div>

	<div class="input-group">
		<label>pType</label>
		<input Type="text" name="pType" value="<?php echo $pType; ?>">
	</div>

	<div class="input-group">
		<label>pShade</label>
		<input Type="text" name="pShade" value="<?php echo $pShade; ?>">
	</div>
	<div class="input-group">
		<label>pSize</label>
		<input Type="text" name="pSize" value="<?php echo $pSize; ?>">
	</div>
	<div class="input-group">
		<label>pPrice</label>
		<input Type="text" name="pPrice" value="<?php echo $pPrice; ?>">
	</div>

	
       

	

	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" pType="submit" name="update" style="background: #556B2F;" >Update</button>
		<?php else: ?>
			<button class="btn" pType="submit" name="save" >Save</button>
		<?php endif ?>
	</div>
</form>
</body>
</html>