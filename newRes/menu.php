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
if(isset($_GET['page'])){
		$page=$_GET['page'];
	}else{
	  	$page=1;
	}
	  $page_count=5;
	  $select=mysql_query("select * from tadayMenu",$conn);
	  $row=mysql_num_rows($select);
	  $page_page=ceil($row/$page_count);
	  $offect=($page-1)*$page_count;   //获取上一页的最后一条记录，从而计算下一页的起始记录
	  $selects=mysql_query("select * from tadayMenu  limit $offect,$page_count",$conn);

require "boot.php";
require_once('conn/conn.php');
include("menuRight.php");
?>
<script type="text/javascript">
var muser = document.getElementById('iuser');
muser.innerHTML = "<?php echo $_SESSION['MM_Username'];?>";
</script>