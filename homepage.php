<?php
	$db = mysqli_connect('localhost','ahmed','123','ahmed_13106');
	include('session.php');
?>
<ul>
  <li><a class = "active" href="homepage.php">Home</a></li>
  <li><a href="ahmed13106.php">Customers</a></li>
  <li><a href="sales13106.php">Sales</a></li>
  <li><a href="product.php">Products</a></li>
  <li><a href="user13106.php">Users</a></li>
  <li><a href="invoices/index.php">Invoices</a></li>
  <li style="float:right"><a id = "logout-btn" href="../logout.php">Logout</a></li>
  <li style="float:right"><a>Logged in as <?php echo $_SESSION['uID'];?></a></li>
	</ul>
<style type="text/css">
body{
	background-color:#89b6ff;
	color:black;
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
