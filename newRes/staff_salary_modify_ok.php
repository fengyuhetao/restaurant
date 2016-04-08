<?php include('conn/conn.php');?>
<?php
$stf=addslashes($_POST["stf"]);
$name=addslashes($_POST["name"]);
$wage=addslashes($_POST["wage"]);
//echo $stf;
$query=mysql_query("UPDATE  `database_1`.`staff` SET  `wage` =  '$wage' WHERE  `staff`.`staffID` =$stf;");
echo "<script language='javascript'>alert('信息修改成功!');history.back();history.back();</script>";
?>