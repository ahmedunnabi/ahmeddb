<?php
$databaseHost = 'localhost';
$databaseName = 'ahmed_13106';
$databaseUsername = 'ahmed';
$databasePassword = '123';
 
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>
