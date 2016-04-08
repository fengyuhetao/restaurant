<?php include_once('conn/conn.php');?>
<?php
$repertoryid=addslashes($_POST['repertoryid']);
$capacity=addslashes($_POST['capacity']);
$area=addslashes($_POST['area']);
$position=addslashes($_POST['position']);
$staffid=addslashes($_POST['staffID']);
$sqlinsert="insert into repertory(repertoryID,capacity,area,position,staffID) values($repertoryid,$capacity,$area,'".$position."',$staffid)";
$sql=mysql_query($sqlinsert,$conn);
echo "<script language='javascript'>alert('信息添加成功!');window.location.href='repertoryinfo.php';</script>"; 
?>