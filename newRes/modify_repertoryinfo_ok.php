<?php include_once('conn/conn.php');?>
<?php
$repertoryid=$_POST['repertoryid'];
$capacity=$_POST['capacity'];
$area=$_POST['area'];
$position=$_POST['position'];
$staffid=$_POST['staffID'];
$sqlmodify="update repertory set repertoryID=$repertoryid,capacity=$capacity,area=$area,position='".$position."',staffID=$staffid WHERE repertoryID=$_GET[id]";
$query=mysql_query($sqlmodify,$conn);
echo "<script language='javascript'>alert('信息修改成功!');window.location.href='repertoryinfo.php';</script>";
?>