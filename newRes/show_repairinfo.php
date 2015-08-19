<?php include('boot.php');?>
<?php include "conn/conn.php";?>
<?php
if($_SERVER['REQUEST_METHOD']=="GET")
{
	$id=$_GET["id"];
	$selectsql="select * from repair where repairID='".$id."'";
	$sql = mysql_query($selectsql,$conn) or die(mysql_error());
	$row = mysql_fetch_assoc($sql);
}
?>

    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>

    <!-- Demo page code -->

    <style type="text/css">
		label{
			display:inline-block;
		}<!--自己加的-->
    </style>

    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">查看维修记录</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.php">首页</a> <span class="divider">/</span></li>
            <li><a href="repairinfo.php">维修记录</a> <span class="divider">/</span></li>
            <li class="active">查看维修记录</li>
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
    <form name="repairinfo">
        <label>维&nbsp;&nbsp;修&nbsp;&nbsp;编&nbsp;&nbsp;&nbsp;号</label>
        <input name="id" type="text" class="input-xlarge" value="<?php echo $row["repairID"];?>" readonly>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>日&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;期</label>
        <input name="date" type="text" class="input-xlarge" value="<?php echo $row["date"];?>" readonly>
        <br/>
        <label>花&nbsp;&nbsp;费&nbsp;&nbsp;金&nbsp;&nbsp;&nbsp;额</label>
        <input name="cos" type="text" class="input-xlarge" value="<?php echo $row["dealMoney"];?>" readonly>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      	<label>负责人工号</label>
        <input name="staffID" type="text" class="input-xlarge" value="<?php echo $row["staffID"];?>" readonly>
        <br/>
        <label>事&nbsp;&nbsp;件&nbsp;&nbsp;描&nbsp;&nbsp;&nbsp;述</label>
        <textarea name="desc" cols="" rows="5" readonly class="input-xlarge"><?php echo $row["eventDescription"];?></textarea>
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
</form>
</div>
<div class="btn-toolbar">
    <button class="btn btn-primary" onClick="Return()"><i class="icon-home"></i> 返回</button>
   <!-- <a href="#myModal" data-toggle="modal" class="btn">Delete</a>-->
  <div class="btn-group">
  </div>
</div>

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
    
    <script>
	function Return()
	{
		window.location.href="repairinfo.php";
	}
	</script>
  </body>
</html>


