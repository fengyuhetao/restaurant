<?php include('conn/conn.php');?>
<?php
$id="";
if($_SERVER['REQUEST_METHOD']=="GET")
{
	$id=$_GET["id"];
	$selectsql="select * from repertory where repertoryID=".$id."";
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
            
            <h1 class="page-title">修改仓库信息</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.php">首页</a> <span class="divider">/</span></li>
            <li><a href="repertoryinfo.php">仓库管理</a> <span class="divider">/</span></li>
            <li class="active">修改仓库信息</li>
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
    <form name="repertoryinfo" method="post" action="modify_repertoryinfo_ok.php?id=<?php echo $_GET['id'];?>">
        <label>仓&nbsp;&nbsp;库&nbsp;&nbsp;编&nbsp;&nbsp;&nbsp;号</label>
        <input type="text" name="repertoryid" class="input-xlarge" value="<?php echo $row['repertoryID'];?>">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>仓&nbsp;&nbsp;&nbsp;&nbsp;库&nbsp;&nbsp;&nbsp;&nbsp;量</label>
        <input type="text" name="capacity" class="input-xlarge" value="<?php echo $row['capacity'];?>">
        <br/>
        <label>仓&nbsp;&nbsp;库&nbsp;&nbsp;面&nbsp;&nbsp;&nbsp;积</label>
        <input type="text" name="area" class="input-xlarge" value="<?php echo $row['area'];?>">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>负责人工号</label>
        <input type="text" name="staffID" class="input-xlarge" value="<?php echo $row['staffID'];?>">
        <br/>
        <label>仓&nbsp;&nbsp;库&nbsp;&nbsp;地&nbsp;&nbsp;&nbsp;址</label>
        <input type="text" name="position" class="input-xlarge" value="<?php echo $row['position'];?>">
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
    


    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    <script type="text/javascript" src="js/check.js"></script>
    <script>
	function TianJia(form)
	{
		if(!checkform(form))
			return false;
		document.repertoryinfo.submit();
	}
	</script>
  </body>
</html>


