<?php 
include_once("conn/conn.php");
$aid=addslashes($_GET[aid]);
$staffid=addslashes($_GET[staffid]);
$array=array();
$array=explode(" ",$aid);
$select=mysql_query("select * from staff where staffID=$staffid",$conn) or die(mysql_error());
if($ans=mysql_fetch_array($select))
{
    mysql_query("delete from menu",$conn) or die(mysql_error());
    for($i=0;$i<count($array)-1;$i=$i+2)
    {
        $m=$i+1;
        $insert=mysql_query("insert into menu(foodID,state,staffID) values($array[$i],$array[$m],$staffid)",$conn) or die(mysql_error());
    }
    echo "<script>alert('保存成功');window.location.href='menuinfo.php';</script>";
}
?>