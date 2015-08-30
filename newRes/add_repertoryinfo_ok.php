<?php include_once('conn/conn.php');?>
<?php
$repertoryid=$_POST['repertoryid'];
$capacity=$_POST['capacity'];
$area=$_POST['area'];
$position=$_POST['position'];
$staffid=$_POST['staffID'];
$sqlinsert="insert into repertory(repertoryID,capacity,area,position,staffID) values($repertoryid,$capacity,$area,'".$position."',$staffid)";
$sql=mysql_query($sqlinsert,$conn);
echo "<script language='javascript'>alert('信息添加成功!');window.location.href='repertoryinfo.php';</script>"; 
?>