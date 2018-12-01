<?php
session_start();
  // include('connect.php');
   
   
   $user_check = $_SESSION['uID'];
   
   $ses_sql = mysqli_query($db,"select uID from user_13106 where uID = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['uID'];
   
   if(!isset($_SESSION['uID'])){
      header("location:login1.php");
   }
?>