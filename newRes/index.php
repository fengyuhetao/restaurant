<?php 
session_start();
require_once('conn/conn.php');
$reback = '0';
$sql = "select * from usersystem where userName='".addslashes($_POST['uname'])."'";
if(isset($_GET['password'])){
	$sql .= " and password = '".addslashes($_POST['upass'])."';";
}	
$query = mysql_query($sql, $conn) or die(mysql_error());
$loginFoundUser = mysql_num_rows($query);
if ($loginFoundUser) {
	$_SESSION['MM_Username'] = $_POST['uname'];     
}
else {
	header("Location: signin.php");
}

if (!isset($_SESSION)) {
  
  //*******************myself codes start*************
   if(!isset($_SESSION['MM_Username']))
   {
	  header("Location: signin.php");
	  exit;
   }
	//*******************myself codes start*************
}


require "main.php";
?>