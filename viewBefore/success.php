<?php
require_once('conn/conn.php');
$num=$_POST["菜数"];
$allPrice=$_POST["总价"];
$deskNum=$_POST["桌号"];
//$foodId = array();
//$foodNum = array();
$i=0;
while($num>0)
{
	if($_POST[$num-1]==0)
		{$num = $num-1;
			continue;}
	$foodId[$i]=$num;
	$foodNum[$i]=$_POST[$num-1];
	$num = $num-1;
	$i += 1;
}
$billIDLastSelect = mysql_query("select  * from bill order by billID desc limit 1;");
$arraybillIDLast=mysql_fetch_array($billIDLastSelect);
$billIDLast=$arraybillIDLast["billID"]+1;


$nowdate= date('Y-m-d H:i:s',time());
$sqlResult=mysql_query("insert into bill(billID,seatID,allPrice,date,isNew) values($billIDLast,$deskNum,$allPrice,'$nowdate',1);");



$j=0;
while($i>0)
{
	$tempFoodID = $foodId[$j];
	$tempFoodNum= $foodNum[$j];
	$foodPriceSelect = mysql_query("select * from food where foodID=$tempFoodID");
	$arrayfoodPrice=mysql_fetch_array($foodPriceSelect);
	$foodPrice=$arrayfoodPrice["price"];
	$sqlResult=mysql_query("insert into billfood(billID,foodID,number,price) values($billIDLast,$tempFoodID,$tempFoodNum,$foodPrice);");
	$i -=1;
	$j +=1;
}
?>

