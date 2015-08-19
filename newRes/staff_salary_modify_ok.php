<?php include('conn/conn.php');?>
<?php
$stf=$_POST["stf"];
$name=$_POST["name"];
$wage=$_POST["wage"];
//echo $stf;
$query=mysql_query("UPDATE  `database_1`.`staff` SET  `wage` =  '$wage' WHERE  `staff`.`staffID` =$stf;");
echo "<script language='javascript'>alert('信息修改成功!');history.back();history.back();</script>";
?>