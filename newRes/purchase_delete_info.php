<?php include('conn/conn.php');?>
<?php
$stf=$_GET['ingredientsID'];
$ptf=$_GET['purchaseID'];
$query=mysql_query("delete from ingredientpurchasetemp  WHERE  ingredientIDtemp=$stf and purchaseIDtemp=$ptf;");
echo "<script language='javascript'>alert('删除成功!')</script>";
?>
<script>
window.location.href="insert_purchase.php";
</script>