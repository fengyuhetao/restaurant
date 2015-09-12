<?php
include('conn/conn.php');
?>
<?php
$staffid=$_GET["staffID"];
$billID=$_GET["billID"];
if($staffid!=""&&$billID!="")
{
	$sql=mysql_query("select * from staff where staffID=$staffid",$conn) or die(mysql_error());
	if($array=mysql_fetch_array($sql))
	{
		mysql_query("update bill set dealTF=1,staffID=$staffid where billID=$billID",$conn) or die(mysql_error());
		echo "<script language='javascript'>alert('信息添加成功!');history.go(-2);</script>";
	}
	else
	{
		echo "<script language='javascript'>alert('不存在此员工!');history.go(-1);</script>";
	}
}
else
{
	echo "<script language='javascript'>alert('信息添加失败!');history.go(-2);</script>";
}
?>