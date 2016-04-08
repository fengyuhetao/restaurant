<?php include_once('conn/conn.php');?>
<?php
$seatid=addslashes($_POST['seatid']);
$capacity=addslashes($_POST['capacity']);
$number=addslashes($_POST['number']);
$position=addslashes($_POST['seatDirection']);
$sqlinsert="insert into seat(seatID,number,seatState,capacity,seatDirection) values($seatid,$number,0,$capacity,'$position');";
$sql=mysql_query($sqlinsert,$conn);
echo "<script language='javascript'>alert('信息添加成功!');window.location.href='seatinfo.php';</script>"; 
?>