<?php 
include_once("conn/conn.php");
$select="select * from menu where foodID=$_POST[id]";
$sql=mysql_query($select,$conn) or die(mysql_error());
if($array=mysql_fetch_array($sql)){
    if($_POST[state]=="有")
        mysql_query("update menu set state=1 where foodID=$_POST[id]",$conn ) or die(mysql_error());
    else
        mysql_query("update menu set state=0 where foodID=$_POST[id]",$conn ) or die(mysql_error());
    echo "<script language='javascript'>alert('状态修改成功!');window.location.href='menuinfo.php';</script>";
}
else
    echo "<script>alert('该菜品不在当前菜单中,无法修改');window.location.href='menuinfo.php';</script>";
?>