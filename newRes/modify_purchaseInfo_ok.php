<?php include('conn/conn.php');?>
<?php
$stf=$_POST["stf"];
$name=$_POST["name"];
$wage=$_POST["wage"];
$price=$_POST["price"];
//echo $stf;
$sqlmodify="update ingredientpurchasetemp set ingredientIDtemp=$stf,purchaseIDtemp=$name,numbertemp=$wage,pricetemp=$price where ingredientIDtemp=$_GET[id] and purchaseIDtemp=$_GET[purchaseID]";
echo $dwlmodify;
echo "<script language='javascript'>alert('信息修改成功!');window.location.href='insert_purchase.php';</script>";
?>