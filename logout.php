<?php 
session_start(); 

$UserID1 = $_SESSION["UserID1"]; 

if (isset($_SESSION["UserID1"])){
session_unset(); 
session_destroy(); 
header ("Location: loginTx.php"); 
date_default_timezone_set("Asia/Kolkata"); 
 $logouttime = new DateTime();
  $logouttime = $logouttime->format('Y-m-d H:i:s'); 
  //echo "$logouttime";

//print $query;
}
?> 