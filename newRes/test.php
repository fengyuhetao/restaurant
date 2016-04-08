<?php include("conn/conn.php");?>
<?php
	$name=addslashes($_GET['name']);
	$s="select date,checkwork.staffID,workPercentage,staff.name from checkwork left join staff on checkwork.staffID=staff.staffID where staff.name='".$name."'";
	$sql=mysql_query($s);
	if($array=mysql_fetch_array($sql))
	{
		echo mysql_num_rows($sql);
		echo " ";
		while(true)
		{
			echo $array['date'];
			echo " ";
			echo $array['staffID'];
			echo " ";
			echo $array['workPercentage'];
			echo " ";
			echo $array['name'];
			if($array=mysql_fetch_array($sql))
				echo " ";
			else 
				break;
		}
	}
?>