<?php
	include('conn.php');
	if(isset($_POST['show'])){
		?>
		
		<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>INVOICE ID</th>
				<th>DATE(YYYY-MM-DD)</th>
				<th>CUSTOMER ID</th>
				<th>CUSTOMER NAME</th>
				<th>CONTACT NO</th>
				<th>ADDRESS</th>
				<th>CNIC</th>
				<th>SALESPERSON ID</th>
				<th>ACTIONS</th>
			</thead>
				<tbody>
					<?php
					$customerid = $_POST['customerid'];
					$invid = $_POST['invid'];
					if($customerid != "" || $invid != "" || $invid != 'NOT ASSIGNED'){
					$qinv = mysqli_query($conn, "SELECT * FROM invoice_13106 WHERE invid = '$invid'");
					$invrow = mysqli_fetch_array($qinv);
					if($invrow != NULL){
						$quser=mysqli_query($conn,"SELECT * FROM customer_13106 WHERE customerid = '$customerid'");
						$urow=mysqli_fetch_array($quser);
							?>
								<tr>
									<td><?php echo $invrow['invid'];?> </td>
									<td><?php echo $invrow['Date'];?> </td>
									<td><?php echo $invrow['customerid'];?> </td>
									<td><?php echo $urow['cNAME']; ?></td>
									<td><?php echo $urow['cContactNo']; ?></td>
									<td><?php echo $urow['cAddress']; ?></td>
									<td><?php echo $urow['cCNIC']; ?></td>
									<td><?php echo $urow['cSID']; ?></td>
									<td > <button class="btn btn-danger delete" value="<?php echo $invrow['invid']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
									
									</td>
								</tr>
							<?php } }?>
				</tbody>
			</table>
			<center><h2 class = "text-primary">INVOICE</h2></center>
			<hr>

					<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>ID</th>
				<th>INVOICE ID</th>
				<th>PRODUCT</th>
				<th>PRICE</th>
				<th>QUANTITY</th>
				<th>DISCOUNT(%)</th>
				<th>TOTAL</th>
			</thead>
				<tbody>
					<?php
						$quser=mysqli_query($conn,"SELECT I.ID, I.invid, P.pBrand, P.pPrice, I.Quantity, I.Discount, (100-I.Discount)/100*(I.Quantity*P.pPrice) AS TOTAL FROM salesorder_13106 I, product_13106 P WHERE I.invid = '$invid' AND I.pCode = P.pCode");
						
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
									<td><?php echo $urow['ID']; ?></td>
									<td><?php echo $urow['invid']; ?></td>
									<td><?php echo $urow['pBrand']; ?></td>
									<td><?php echo $urow['pPrice']; ?></td>
									<td><?php echo $urow['Quantity']; ?></td>
									<td><?php echo $urow['Discount']; ?></td>
									
									<td style = "width: 210px"><button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $urow['ID']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Edit</button> | <button class="btn btn-danger deleteitem" value="<?php echo $urow['ID']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
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
