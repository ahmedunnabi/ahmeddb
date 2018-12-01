<?php 
include('server.php');
include('homepage.php');


	if (isset($_GET['edit'])) {
		$cID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM customer_13106 WHERE cID=$cID");

		
			$n = mysqli_fetch_array($record);
			            $cID = $n['cID'];
                        $cNAME = $n['cNAME'];
			            $cContactNo = $n['cContactNo'];
                        $cAddress = $n['cAddress'];
                        $cCNIC = $n['cCNIC'];
                        $cPayment  = $n['cPayment'];
			
                         

		

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD Customer 13108 </title>
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

<?php $results = mysqli_query($db, "SELECT * FROM customer_13106"); ?>

<table>
	<thead>
		<tr>

			<h3> CUSTOMER INFORMATION </h3>


			<th>cID</th>
            <th>cNAME</th>
			<th>cContactNo</th>
			<th>cAddress</th>
            <th>cCNIC</th>
            <th>cPayment</th>

			
			
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['cID']; ?></td>
            <td><?php echo $row['cNAME']; ?></td>
			<td><?php echo $row['cContactNo']; ?></td>
			<td><?php echo $row['cAddress']; ?></td>
            <td><?php echo $row['cCNIC']; ?></td>
			<td><?php echo $row['cPayment']; ?></td>
			
			<td>
				<a href="index1.php?edit=<?php echo $row['cID']; ?>" class="edit_btn" >Edit</a>
			
				<a href="server.php?del=<?php echo $row['cID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server.php" >

	<input type="hidden" name="cID" value="<?php echo $cID; ?>">
	<div class="input-group">
        </div>

            <div class="input-group">
		<label>cID</label>
		<input type="text" name="cID" value="<?php echo $cID; ?>">
	</div>
        
            <div class="input-group">
		<label>cNAME</label>
		<input type="text" name="cNAME" value="<?php echo $cNAME; ?>">
	</div>	

	<div class="input-group">
		<label>Contact Number</label>
		<input type="text" name="cContactNo" value="<?php echo $cContactNo; ?>">
	</div>

	
	<div class="input-group">
		<label>cAddress</label>
		<input type="text" name="cAddress" value="<?php echo $cAddress; ?>">
	</div>
        
        <div class="input-group">
		<label>cCNIC</label>
		<input type="text" name="cCNIC" value="<?php echo $cCNIC; ?>">
	</div>

	        
        <div class="input-group">
		<label>Payment Due</label>
		<input type="text" name="cPayment" value="<?php echo $cPayment; ?>">
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


