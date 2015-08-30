<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
  
  //*******************myself codes start*************
   if(!isset($_SESSION['MM_Username']))
  {
      header("Location: index.php");
      exit;
  }
    //*******************myself codes start*************
}
include "conn/conn.php";
?>

<?php include("boot.php");?>
<style type="text/css">
		label{
			display:inline-block;
		}<!--自己加的-->
    </style>
    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">添加菜品记录</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.php">首页</a> <span class="divider">/</span></li>
            <li><a href="staffinfo.php">菜品管理</a> <span class="divider">/</span></li>
            <li class="active">添加菜品记录</li>
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
    <form name="foodinfo" method="post" action="add_foodinfo_ok.php" enctype="multipart/form-data">
        <label>菜&nbsp;&nbsp;品&nbsp;&nbsp;编&nbsp;&nbsp;&nbsp;号</label>
        <input type="text" name="id" class="input-xlarge">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>菜&nbsp;&nbsp;品&nbsp;&nbsp;名&nbsp;&nbsp;&nbsp;称</label>
        <input type="text" name="name" class="input-xlarge">
        <br/>
        <label>价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格</label>
        <input type="text" name="price" class="input-xlarge">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      	<label>种&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;类</label>
        <input type="text" name="type" class="input-xlarge">
        <br/>
        <label>菜&nbsp;&nbsp;品&nbsp;&nbsp;描&nbsp;&nbsp;&nbsp;述</label>
        <textarea name="desc" rows="5" class="input-xlarge"> 
        </textarea>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>选&nbsp;&nbsp;择&nbsp;&nbsp;图&nbsp;&nbsp;&nbsp;片</label>
        <input type="file" name="uploadfile" onchange="load();" id="picture"/>
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
    <button class="btn btn-primary" onClick="return TianJia(form)" value="ok"><i class="icon-save"></i> 确定</button>
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
		document.foodinfo.submit();
	}
	</script>


