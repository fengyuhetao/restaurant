<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php include('conn/conn.php');?>
<?php
$stf=$_POST["stf"];
$name=$_POST["name"];
$wage=$_POST["wage"];
$price=$_POST["price"];
$sql=mysql_query("insert into ingredientpurchase(ingredientsID,purchaseID,number,price) values($stf,$name,$wage,$price);");
echo "<script language='javascript'>alert('信息添加成功!');history.back();history.back();</script>";
?>
</body>
</html>