<?php include('conn/conn.php');?>
<?php
$repertoryID=$_GET['repertoryID'];
echo $repertoryID;
$query=mysql_query("update ingredientrepertory,ingredientpurchasetemp set ingredientrepertory.number=ingredientrepertory.number+ingredientpurchasetemp.numbertemp where ingredientrepertory.repertoryID=$repertoryID and ingredientrepertory.ingredientsID=ingredientpurchasetemp.ingredientIDtemp");
$query1=mysql_query("insert into ingredientpurchase select * from ingredientpurchasetemp");
$query2=mysql_query("update ingredients,ingredientpurchasetemp set number=number+ingredientpurchasetemp.numbertemp where ingredients.ingredientsID=ingredientpurchasetemp.ingredientIDtemp");
$query3=mysql_query("delete from ingredientpurchasetemp");
echo "<script language='javascript'>alert('处理完毕!')</script>";
?>
<script>
window.location.href="insert_purchase.php";
</script>