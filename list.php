<?php 
include('server4.php');
include('homepage.php');

	if (isset($_GET['edit'])) {
		$ID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM user_13106 WHERE uID='$uID'");

	
			$n = mysqli_fetch_array($record);
			$uID = $n['uID'];
			$uPassword = $n['uPassword'];
                        $uStatus = $n['uStatus'];
                 			$sID  = $n['sID']; 

		

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP MySQL 13106 </title>
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

			<h3> USER INFORMATION </h3>


			<th>uID</th>
			<th>uPassword</th>
			<th>uStatus</th>
			<th>sID</th>
			
	<?php
	$sID = $_POST['$sID'];
	$results = mysqli_query($db, "SELECT * FROM user_13106 WHERE sID='$sID'"); 
	if(!$results){
		echo "maaz";
	}
	 while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['uID']; ?></td>
			<td><?php echo $row['uPassword']; ?></td>
			<td><?php echo $row['uStatus']; ?></td>
			<td><?php echo $row['sID']; ?></td>
			<td>
				<a href="user13106.php?edit=<?php echo $row['uID']; ?>" class="edit_btn" >Edit</a>
			
				<a href="server4.php?del=<?php echo $row['uID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server4.php" >

	<input type="hidden" name="uID" value="<?php echo $uID; ?>">
	<div class="input-group">

		
	
	<div class="input-group">
		<label>uID</label>
		<input type="text" name="uID" value="<?php echo $uID; ?>">
	</div>	
	<div class="input-group">
		<label>uPassword</label>
		<input type="text" name="uPassword" value="<?php echo $uPassword ?>">
	</div>

	<div class="input-group">
		<label>uStatus</label>
		<input type="text" name="uStatus" value="<?php echo $uStatus; ?>">
	</div>

	<div class="input-group">
		<label>sID</label>
		<input type="text" name="sID" value="<?php echo $sID; ?>">
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