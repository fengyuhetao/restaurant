<?php include_once('conn/conn.php');?>
<?php
$repertoryid=addslashes($_POST['repertoryid']);
$capacity=addslashes($_POST['capacity']);
$area=addslashes($_POST['area']);
$position=addslashes($_POST['position']);
$staffid=addslashes($_POST['staffID']);
$sqlmodify="update repertory set repertoryID=$repertoryid,capacity=$capacity,area=$area,position='".$position."',staffID=$staffid WHERE repertoryID=$_GET[id]";
$query=mysql_query($sqlmodify,$conn);
echo "<script language='javascript'>alert('信息修改成功!');window.location.href='repertoryinfo.php';</script>";
?>