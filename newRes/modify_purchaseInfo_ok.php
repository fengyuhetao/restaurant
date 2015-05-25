<?php session_start();?>
<?php include('conn/conn.php');?>
<?php
$stf=$_POST["stf"];
$name=$_POST["name"];
$wage=$_POST["wage"];
$price=$_POST["price"];
//echo $stf;
$query=mysql_query("UPDATE ingredientpurchase SET  ingredientsID =  $stf ,purchaseID=$name,number=$wage,price=$price WHERE ingredientsID=$_GET[id] and purchaseID=$_GET[purchaseID];");
echo "<script language='javascript'>alert('信息修改成功!');window.history.back(-1);window.history.back(-1);</script>";
?>