<?php include_once('conn/conn.php');?>
<?php
$seatid=$_POST['seatid'];
$capacity=$_POST['capacity'];
$number=$_POST['number'];
$position=$_POST['seatDirection'];
$state=$_POST['seatState'];
if($state=="有人")
	$seatstate=1;
else 
	$seatstate=0;
$sqlmodify="update seat set seatID=$seatid,number=$number,seatState=$seatstate,capacity=$capacity,seatDirection='$position' where seatID=$_GET[id]";
echo $sqlmodify;
$query=mysql_query($sqlmodify,$conn);
echo "<script language='javascript'>alert('信息修改成功!');window.location.href='seatinfo.php';</script>";
?>