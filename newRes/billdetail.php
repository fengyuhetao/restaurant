<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
  
  //*******************myself codes start*************
   if(!isset($_SESSION['MM_Username']))
  {
	  header("Location: index.php");
	  exit;}
	//*******************myself codes start*************
}

include_once('conn/conn.php');
$id=$_GET["iD"];
$selectAll=mysql_query("select * from bill where billID=$id",$conn);
$selectDetail=mysql_query("select * from billfood where billID=$id",$conn);

require "boot.php";
require_once('conn/conn.php');
include("billdetailRight.php");
?>
<script type="text/javascript">
var muser = document.getElementById('iuser');
muser.innerHTML = "<?php echo $_SESSION['MM_Username'];?>";
</script>