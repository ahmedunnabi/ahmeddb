<?php
	include('conn.php');
	if(isset($_POST['show'])){
		?>
		<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>CUSTOMER ID</th>
				<th>CUSTOMER NAME</th>
				<th>CONTACT NO.</th>
				<th>ADDRESS</th>
				<th>CNIC</th>
				<th>SALESPERSON ID</th>
			</thead>
				<tbody>
					<?php
						$quser=mysqli_query($conn,'SELECT * FROM customer_13106');
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
									<td><?php echo $urow['customerid']; ?></td>
									<td><?php echo $urow['cName']; ?></td>
									<td><?php echo $urow['cContact']; ?></td>
									<td><?php echo $urow['cAddress']; ?></td>
									<td><?php echo $urow['cCNIC']; ?></td>
									<td><?php echo $urow['cSID']; ?></td>
									<td style = "width: 210px"><button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $urow['customerid']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Edit</button> | <button class="btn btn-danger delete" value="<?php echo $urow['customerid']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
									<?php include('edit_modal.php'); ?>
									</td>
								</tr>
							<?php
						}
					
					?>
				</tbody>
			</table>
		<?php
	}

?>
