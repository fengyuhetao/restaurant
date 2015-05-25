<?php 

if (!isset($_SESSION)) {
  session_start();
  
  //*******************myself codes start*************
   if(!isset($_SESSION['MM_Username']))
  {
	  header("Location: signin.php");
	  exit;}
	//*******************myself codes start*************
}



require "main.php";
?>