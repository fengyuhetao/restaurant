<?php
session_start();
require_once('conn/conn.php');
$reback = '0';
$sql = "select * from usersystem where userName='".addslashes($_GET['user'])."'";
if(isset($_GET['password'])){
	$sql .= " and password = '".addslashes($_GET['password'])."';";
}	
$query = mysql_query($sql, $conn) or die(mysql_error());
$loginFoundUser = mysql_num_rows($query);
if ($loginFoundUser) {
	$_SESSION['MM_Username'] = $_GET['user'];     
    $reback = '2';
  }
  else {
    $reback = '1';
  }
echo $reback;
?>