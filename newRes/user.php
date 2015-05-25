<?php
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
$userN=$_SESSION['MM_Username'];
$selects=mysql_query("select * from usersystem  where userName = '$userN'",$conn);
$array=mysql_fetch_array($selects);
	  
	  
require "boot.php";
require_once('conn/conn.php');
include("userRight.php");
?>
<script type="text/javascript">
var muser = document.getElementById('iuser');
muser.innerHTML = "<?php echo $_SESSION['MM_Username'];?>";
</script>