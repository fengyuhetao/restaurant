<?php include('conn/conn.php');?>
<?php
$repertoryID=$_GET['repertoryID'];
$nowdate= date('Y-m-d',time());
echo $nowdate;
echo $repertoryID;
$query=mysql_query("update ingredientrepertory,ingredientpurchasetemp set ingredientrepertory.number=ingredientrepertory.number+ingredientpurchasetemp.numbertemp where ingredientrepertory.repertoryID=$repertoryID and ingredientrepertory.ingredientsID=ingredientpurchasetemp.ingredientIDtemp",$conn) or die(mysql_error());
$query1=mysql_query("insert into ingredientpurchase select * from ingredientpurchasetemp",$conn) or die(mysql_error());
$query2=mysql_query("update ingredients,ingredientpurchasetemp set number=number+ingredientpurchasetemp.numbertemp where ingredients.ingredientsID=ingredientpurchasetemp.ingredientIDtemp");
$query3=mysql_query("delete from ingredientpurchasetemp");
$sql="insert into purchase(purchaseID,date,staffID) values(".$_GET[purchaseid].",'".$nowdate."',".$_GET[dealid].")";
echo $sql;
mysql_query($sql,$conn) or die(mysql_error());
echo "<script language='javascript'>alert('处理完毕!')</script>";
?>
<script>
window.location.href="insert_purchase.php";
</script>