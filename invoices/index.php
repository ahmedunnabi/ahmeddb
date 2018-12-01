<?php
	include('conn.php');
	session_start();

 if(!isset($_SESSION['uID']))
 {
	header("Location: ../login1.php");
 }
?>
<html lang = "en">
	<head>
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<!--<link rel = "stylesheet" type = "text/css" href = "../style.css" /> -->
		<title>Invoices</title>
	</head>
<body>
	<ul>
  <li><a href="../homepage.php">Home</a></li>
  <li><a href="../ahmed13106.php">Customers</a></li>
  <li><a href="../sales13106.php">Sales</a></li>
  <li><a href="../product.php">Products</a></li>
  <li><a href="../user13106.php">Users</a></li>
  <li><a class = "active" href="./index.php">Invoices</a></li>
  <li style="float:right"><a id = "logout-btn" href="../logout.php">Logout</a></li>
  <li style="float:right"><a>Logged in as <?php echo $_SESSION['uID'];?></a></li>
	</ul>
	<div style="height:30px;"></div>
	<div class = "row">	
		<div class = "col-md-1">
		</div>
		<div class = "col-md-10 well">
			<div class="row">
                <div class="col-lg-12">
                    <center><h2 class = "text-primary">SELECT INVOICE</h2></center>
					<hr>
					<form  id = "invform" class = "form-horizontal">
						<div class = "form-group">
							<label>CUSTOMER ID</label>
							<?php
									$sql = "SELECT customerid FROM customer_13106";
									$result = mysqli_query($conn, $sql);
									echo "<select type = 'text' id = 'searchid' class = 'form-control'>";
									echo "<option value= ''>SELECT CUSTOMER</option>";
									while ($row = mysqli_fetch_array($result)) {
										echo "<option value='" . $row['customerid'] ."'>" . $row['customerid'] ."</option>";
									}
									echo "</select>";
							?>
						</div>
						<div class = "form-group">
							<div id = "searchinv"></div>
						</div>
					</form>
					<button class="btn btn-success" data-toggle="modal" data-target="#createinvoice"><span class = "glyphicon glyphicon-pencil"></span>ADD NEW INVOICE</button>
					<hr>
					
					<div id="userTable"></div>

					<button class="btn btn-success" id = "add1" data-toggle="modal" data-target="#addentry" disabled="true"><span class = "glyphicon glyphicon-pencil" ></span>ADD ITEM</button>


					<div class="modal fade" id="createinvoice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
   						 <div class="modal-content">
						<div class = "modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<center><h3 class = "text-success modal-title">Create Invoice</h3></center>
					</div>
					<div class="modal-body">
					<form  id = "addform" class = "form-horizontal">
						<div class = "form-group">
							<label>INVOICE ID</label>
							<input type  = "text" id = "invid" class = "form-control">
						</div>
						<div class = "form-group">
							<label>DATE</label>
							<input type  = "date" id = "Date" class = "form-control">
						</div>
						<div class = "form-group">
							<label>CUSTOMER ID</label>
							<input type  = "text" id = "customerid" class = "form-control">
						</div>
					    <div class = "form-group">
							<label>CUSTOMER NAME</label>
							<input type  = "text" id = "cName" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>CONTACT NO.</label>
							<input type  = "text" id = "cContactNo" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>ADDRESS</label>
							<input type  = "text" id = "cAddress" class = "form-control" readonly>
						</div>
					    <div class = "form-group">
							<label>CNIC</label>
							<input type  = "text" id = "cCNIC" class = "form-control" readonly>
						</div>
					    <div class = "form-group">
							<label>SALESPERSON ID</label>
							<input type  = "text" id = "cSID" class = "form-control" readonly>
						</div>
						

					</form>
					</div>
				<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | <button type="button" class="btn btn-success" id="addnew"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
		</div>			
</div>
</div>
</div>
</div>
</div>
		<div class="modal fade" id="addentry" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
   						 <div class="modal-content">
						<div class = "modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<center><h3 class = "text-success modal-title">Add Entry</h3></center>
					</div>
					<div class="modal-body">
					<form  class = "form-horizontal">
						
						<div class = "form-group">
							<label>ITEM</label>
							<?php
									$sql = "SELECT * FROM product_13106";
									$result = mysqli_query($conn, $sql);
									echo "<select type = 'text' id = 'pCode' class = 'form-control' name='type'>";
									echo "<option value= ''>SELECT PRODUCT</option>";
									while ($row = mysqli_fetch_array($result)) {
										echo "<option value='" . $row['pCode'] ."'>" . $row['pBrand'] ."</option>";
									}
									echo "</select>";
							?>
						</div>
						<div class = "form-group">
							<label>QUANTITY</label>
							<input type  = "number" id = "Quantity" class = "form-control">
						</div>
						<div class = "form-group">
							<label>DISCOUNT</label>
							<input type  = "number" id = "Discount" value = '0' class = "form-control">
						</div>
						<div class = "form-group">
							<label>TOTAL</label>
							<input type  = "number" id = "total" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>TYPE</label>
							<input type  = "text" id = "pType" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>SHADE</label>
							<input type  = "text" id = "pShade" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>SIZE</label>
							<input type  = "text" id = "pSize" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>PRICE</label>
							<input type  = "number" id = "pPrice" class = "form-control" readonly>
						</div>
						
					</form>
					</div>
				<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | <button type="button" class="btn btn-success" id="additem"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
		</div>
				</div>
				</div><br>
			
		</div>
	</div>
</body>
<script src = "js/jquery-3.1.1.js"></script>	
<script src = "js/bootstrap.js"></script>

<script type = "text/javascript">
$(document).ready(function(){
		var price = 0;
		$('#searchid').change(function(){
			if ($('#searchid').val() == "")
				$('#searchinvid').prop('disabled', true);
			else
			{
				$('#searchinvid').prop('disabled', false);
				showinvid();
			}
		});
		$('#searchinv').change(function(){
			if ($('#searchinvid').val() == "")
				$('#add1').prop('disabled', true);
			else
			{
				$('#add1').prop('disabled', false);
			}
			show();
		});

$('#Quantity').change(function(){
				var total = parseInt((100-$('#Discount').val())/100 * $('#pPrice').val() * $('#Quantity').val()); 
   				$('#total').val(total);
});

$('#Discount').change(function(){
				var total = parseInt((100-$('#Discount').val())/100 * $('#pPrice').val() * $('#Quantity').val()); 
   				$('#total').val(total);
});

$('#pCode').change(function(){
			$pCode = $('#pCode').val();
   		
   		$.ajax({
   			type: "POST",
   			url: "search.php",
   			data: {
   				pCode: $pCode,
   				searchprod: 1,
   			},
   			
   			success: function(data)
   			{
   				var obj = JSON.parse(data);
   				$('#pShade').val(obj.pShade);
   				$('#pType').val(obj.pType);
   				$('#pSize').val(obj.pSize);
   				$('#pPrice').val(obj.pPrice);
   				pPrice = parseInt(obj.pPrice);
   			}
   		});
});

$('#customerid').change(function(){
			$customerid = $('#customerid').val();
   		
   		$.ajax({
   			type: "POST",
   			url: "search.php",
   			data: {
   				customerid: $customerid,
   				search: 1,
   			},
   			
   			success: function(data)
   			{
   				var obj = JSON.parse(data);
   				$('#cName').val(obj.cName);
   				$('#customerid').val(obj.customerid);
   				$('#cContact').val(obj.cContact);
   				$('#cAddress').val(obj.cAddress);
   				$('#cCNIC').val(obj.cCNIC);
   				$('#cSID').val(obj.cSID);
				
   			}
   		});
});

$(document).on('click', '#additem', function(){
			if ($('#pCode').val()=="" || $('#Quantity').val()=="" || $('#Quantity').val()<=0 || $('#Discount').val()<0|| $('#Discount').val() == ''){
				alert('Please input data first');
			}
			else{
			$('#addentry').modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$pCode=$('#pCode').val();
			$Quantity=$("#Quantity").val();
			$Discount=$("#Discount").val();	
			$invid=$("#searchinvid").val();
			$('#additem').html('Adding..');
			$.ajax({
					type: "POST",
					url: "addnew.php",
					data: {
						pCode: $pCode,
						invid: $invid,
						Quantity: $Quantity,
						Discount: $Discount,
						additem: 1,
					},
					success: function(response){
						$obj = response;
						if($obj != "")
        					alert($obj);
						$('#additem').html('Add');
						show();
						
					}
				});
			}
		});


		//ADD NEW
		$(document).on('click', '#addnew', function(){
			if ($('#customerid').val()=="" || $('#invid').val()=="" || isNaN(Date.parse($('#Date').val()))){
				alert('Please input data first');
			}
			else{
			$('#createinvoice').modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$customerid=$('#customerid').val();
			$invid=$("#invid").val();
			$Date=$("#Date").val();	
			$('#addnew').html('Adding..');
			$.ajax({
					type: "POST",
					url: "addnew.php",
					data: {
						customerid: $customerid,
						invid: $invid,
						Date: $Date,
						add: 1,
					},
					success: function(response){
						$obj = response;
						if($obj != "")
        					alert($obj);
						$('#addnew').html('Add');
						showinvid();
						
					}
				});
			}
		});
		

		//DELETE
		$(document).on('click', '.delete', function(){
			$id=$(this).val();
			$(this).html('Deleting..');
				$.ajax({
					type: "POST",
					url: "delete.php",
					data: {
						id: $id,
						del: 1,
					},
					success: function(response){
						$obj = response;
						if($obj != "")
						{
        					alert($obj);
        					$(this).html('Delete');
						}
        				showinvid();
        				show();
					}
				});
		});

		$(document).on('click', '.deleteitem', function(){
			$id=$(this).val();
			$(this).html('Deleting..');
				$.ajax({
					type: "POST",
					url: "delete.php",
					data: {
						id: $id,
						delitem: 1,
					},
					success: function(response){
						$obj = response;
						if($obj != "")
						{
        					alert($obj);
        					$(this).html('Delete');
						}
        				show();
					}
				});
		});

		//UPDATE
		$(document).on('click', '.updateuser', function(){
			$uid=$(this).val();
			$('#edit'+$uid).modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$uQuantity=$('#uQuantity'+$uid).val();
			$uDiscount=$('#uDiscount'+$uid).val();
			$.ajax({
					type: "POST",
					url: "update.php",
					data: {
						id: $uid,
						Quantity: $uQuantity,
						Discount: $uDiscount,
						edit: 1,
					},
					success: function(){
						show();
					}
				});
		});
	
	});
	
	function showinvid(){
		$searchid = $('#searchid').val();
		$.ajax({
			url: 'searchinvoice.php',
			type: 'POST',
			data:{
				searchid: $searchid,
			},
			success: function(response){
				$('#searchinv').html(response);
			}
		});
	}
	function show(){
		$customerid=$('#searchid').val();
		$invid=$('#searchinvid').val();
		$.ajax({
			url: 'show_user.php',
			type: 'POST',
			data:{
				invid: $invid,
				customerid: $customerid,
				show: 1,
			},
			success: function(response){
				$('#userTable').html(response);
			}
		});
	}
	
</script>
<style type="text/css">
body{
	background-color:#89b6ff;
	color:black;
}
	#invform{

		padding: 20px 20px;
		border: 2px solid;
	}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: black;
}

li {
    float: left;
}

li a {
    display: block;
    color: white !important;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none !important;
}

li a:hover:not(.active) {
    background-color: darkblue;
}
#logout-btn:hover{
	background-color: maroon;
}

.active {
    background-color: #0275d8;
}
.active:hover {
    background-color: darkblue;
    border-color: #419641;
}

</style>
</html>
