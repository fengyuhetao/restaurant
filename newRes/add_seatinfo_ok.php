<?php include_once('conn/conn.php');?>
<?php
$seatid=$_POST['seatid'];
$capacity=$_POST['capacity'];
$number=$_POST['number'];
$position=$_POST['seatDirection'];
$sqlinsert="insert into seat(seatID,number,seatState,capacity,seatDirection) values($seatid,$number,0,$capacity,'$position');";
$sql=mysql_query($sqlinsert,$conn) or die(mysql_error());
echo "<script language='javascript'>alert('信息添加成功!');window.location.href='seatinfo.php';</script>"; 
?>