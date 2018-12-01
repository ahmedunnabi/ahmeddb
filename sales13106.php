<!DOCTYPE html>
<html>
<head>
	<title>Salesperson </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
include('server3.php');
include('homepage.php');

	if (isset($_GET['edit'])) {
		$sID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM sales_13106 WHERE sID='$sID'");

	
			$n = mysqli_fetch_array($record);
			$sID = $n['sID'];
			$sName = $n['sName'];
                        $sContactNo = $n['sContactNo'];
                 			$pplAssigned  = $n['pplAssigned']; 

		

	}
?>

	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM sales_13106"); ?>

<table>
	
	<thead>
		<tr>

			<h3> SALES_13106 INFORMATION </h3>


			<th>sID</th>
			<th>sName</th>
			<th>sContactNo</th>
			<th>pplAssigned</th>
			
	
<?php	 while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['sID']; ?></td>
			<td><?php echo $row['sName']; ?></td>
			<td><?php echo $row['sContactNo']; ?></td>
			<td><?php echo $row['pplAssigned']; ?></td>
			<td>
				<a href="sales13106.php?edit=<?php echo $row['sID']; ?>" class="edit_btn" >Edit</a>
			
				<a href="server3.php?del=<?php echo $row['sID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
<?php } ?>
</table>
	


<form method="post" action="server3.php" >

	<input type="hidden" name="sID" value="<?php echo $sID; ?>">
	<div class="input-group">

		
	
	<div class="input-group">
		<label>sID</label>
		<input type="text"name="sID" value="<?php echo $sID; ?>">
	</div>	
	<div class="input-group">
		<label>sName</label>
		<input type="text" name="sName" value="<?php echo $sName ?>">
	</div>

	<div class="input-group">
		<label>sContactNo</label>
		<input type="text" name="sContactNo" value="<?php echo $sContactNo; ?>">
	</div>

	<div class="input-group">
		<label>pplAssigned</label>
		<input type="text" name="pplAssigned" value="<?php echo $pplAssigned; ?>">
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