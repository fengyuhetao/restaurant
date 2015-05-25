<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php include('conn/conn.php');?>
<?php
$stf=$_GET['ingredientsID'];
$ptf=$_GET['purchaseID'];
$query=mysql_query("delete from ingredientpurchase  WHERE  ingredientsID=$stf and purchaseID=$ptf;");
echo "<script language='javascript'>alert('删除成功!')</script>";
?>
<script>
window.location.href="insert_purchase.php";
</script>
</body>
</html>