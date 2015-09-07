<?php include('conn/conn.php');?>
<?php
$id="";
if($_SERVER['REQUEST_METHOD']=="GET")
{
	$id=$_GET["id"];
	$selectsql="select * from seat where seatID=".$id."";
	$sql = mysql_query($selectsql,$conn) or die(mysql_error());
	$row = mysql_fetch_assoc($sql);
}
?>
<?php include('boot.php');?>
    <style type="text/css">
		label{
			display:inline-block;
		}<!--自己加的-->
    </style>
    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">修改座位信息</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.php">首页</a> <span class="divider">/</span></li>
            <li><a href="repertoryinfo.php">座位管理</a> <span class="divider">/</span></li>
            <li class="active">修改座位信息</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
<div class="well">
   <!-- <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
      <li><a href="#profile" data-toggle="tab">Password</a></li>
    </ul>-->
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <form name="seatinfo" method="post" action="modify_seatinfo_ok.php?id=<?php echo $_GET[id];?>">
        <label>座&nbsp;&nbsp;位&nbsp;&nbsp;编&nbsp;&nbsp;&nbsp;号</label>
        <input type="text" name="seatid" class="input-xlarge" value="<?php echo $row[seatID];?>">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>桌&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号</label>
        <input type="text" name="number" class="input-xlarge" value="<?php echo $row[number];?>">
        <br/>
        <label>容&nbsp;&nbsp;纳&nbsp;&nbsp;人&nbsp;&nbsp;&nbsp;数</label>
        <input type="text" name="capacity" class="input-xlarge" value="<?php echo $row[capacity];?>">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <label>座&nbsp;&nbsp;位&nbsp;&nbsp;位&nbsp;&nbsp;&nbsp;置</label>
        <input type="text" name="seatDirection" class="input-xlarge" value="<?php echo $row[seatDirection];?>">
        <br/>
        <label>座&nbsp;&nbsp;位&nbsp;&nbsp;状&nbsp;&nbsp;&nbsp;态</label>
        <input type="text" name="seatState" class="input-xlarge" value="<?php  if($row[seatState]==1) echo "有人";else echo "无人";?>"  title="请填写有人或无人">
      </div>
      <!--<div class="tab-pane fade" id="profile">
    <form id="tab2">
        <label>New Password</label>
        <input type="password" class="input-xlarge">
        <div>
            <button class="btn btn-primary">Update</button>
        </div>
    </form>
      </div>-->
  </div>

</div>
<div class="btn-toolbar">
    <button class="btn btn-primary" onClick="return TianJia(form)" value=" "><i class="icon-save"></i> 保存</button>
   <!-- <a href="#myModal" data-toggle="modal" class="btn">Delete</a>-->
  <div class="btn-group">
  </div>
</div>
</form>
<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Confirmation</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger" data-dismiss="modal">Delete</button>
  </div>
</div>


                    
                    <footer>
                        <hr>
                        <p>&copy; 2015 by sunrise laboratory </p>
                </footer>
                    
            </div>
        </div>
    </div>
    

    <script type="text/javascript" src="js/check.js"></script>
    <script>
	function TianJia(form)
	{
		if(!checkform(form))
			return false;
		document.seatinfo.submit();
	}
	</script>
  </body>
</html>


