<?php
header('Content-Type: text/xml');
include_once('conn/conn.php');
$selectIsNew=mysql_query("select billID from bill where isNew=1; ",$conn);
$row=mysql_num_rows($selectIsNew);
if($row==0)
{
	$res = "<response><message>no</message></response>";
    echo $res;
}
else
{
	while($arrayIsNew=mysql_fetch_array($selectIsNew))
	{
		$tempBillID=$arrayIsNew["billID"];
		mysql_query("update bill set isNew=0 where billID=$tempBillID",$conn);
	}
	$res = "<response><message>yes</message></response>";
    echo $res;
}
?>