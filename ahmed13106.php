<?php 
include('server.php');
include('homepage.php');

	if (isset($_GET['edit'])) {
		$customerid = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM customer_13106 WHERE customerid='$customerid'");

	
			$n = mysqli_fetch_array($record);
			$customerid = $n['customerid'];
			$cNAME = $n['cNAME'];
            $cContactNo  = $n['cContactNo'];
			$cAddress = $n['cAddress'];
            $cCNIC  = $n['cCNIC'];
            $cSID  = $n['cSID'];


		

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer </title>
	<link rel="stylesheet" type="text/css" href="style.css">
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

			<h3> CUSTOMERS_13106 INFORMATION </h3>
			<th>Customer ID</th>
			<th>Name</th>
			<th>Contact No</th>
			<th>Address</th>
			<th>CNIC</th>
			<th>Salesperson ID</th>
			
	<?php $results = mysqli_query($db, "SELECT * FROM customer_13106"); 
	if(!$results){
	}
	 while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['customerid']; ?></td>
			<td><?php echo $row['cNAME']; ?></td>
			<td><?php echo $row['cContactNo']; ?></td>
			<td><?php echo $row['cAddress']; ?></td>
			<td><?php echo $row['cCNIC']; ?></td>
			<td><?php echo $row['cSID']; ?></td>
			<td>
				<a href="ahmed13106.php?edit=<?php echo $row['customerid']; ?>" class="edit_btn" >Edit</a>
			
				<a href="server.php?del=<?php echo $row['customerid']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server.php" >

	<input type="hidden" name="customerid" value="<?php echo $customerid; ?>">
	<div class="input-group">

		
		
	<div class="input-group">
		<label>Customer ID</label>
		<input type="text" name="customerid" value="<?php echo $customerid; ?>">
	</div>
	<div class="input-group">
		<label>Name</label>
		<input type="text" name="cNAME" value="<?php echo $cNAME; ?>">
	</div>

	<div class="input-group">
		<label>Contact No</label>
		<input type="text" name="cContactNo" value="<?php echo $cContactNo; ?>">
	</div>

	<div class="input-group">
		<label>Address</label>
		<input type="text" name="cAddress" value="<?php echo $cAddress; ?>">
	</div>

    <div class="input-group">
		<label>CNIC</label>
		<input type="text" name="cCNIC" value="<?php echo $cCNIC; ?>">
	</div>
	
	<div class="input-group">
		<label>Salesperson ID</label>
		<input type="text" name="cSID" value="<?php echo $cSID; ?>">
	</div>
	
	
	
	
       

	

	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
	</div>
</form>
</body>
</html>