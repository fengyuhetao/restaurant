<?php
if(isset($_POST['tab_password']))
{
	if($_POST['tab_password']=="")
	{
		echo "<script> alert('密码不能为空！');window.location.href='user.php'</script>";
		return ;
		}
	$updateSQL ="update usersystem set password='".addslashes($_POST['tab_password'])."',email='".addslashes($_POST['tab_mail'])."'";
	$sql = mysql_query($updateSQL, $conn) or die(mysql_error());
	echo "<script> alert('添加成功！');window.location.href='user.php'</script>";	
 }

	
	
?>
<div class="content">
        
        <div class="header">
            
            <h1 class="page-title">信息编辑</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="main.php">管理系统</a> <span class="divider">/</span></li>
            <li class="active">我的账户</li>
        </ul>
        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <!--<button class="btn btn-primary"><i class="icon-save"></i> Save</button>
    <a href="#myModal" data-toggle="modal" class="btn">Delete</a>-->
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <ul class="nav nav-tabs">
    	<li class="active"><a href="#home" data-toggle="tab">个人信息</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <form method="POST"  name="tab" id="tab">
    	<input name="tab_id" type="hidden" value=""  >
        <label>登录名</label>
        <input name="tab_username" type="text" class="input-xlarge" value="<?php echo $userN;?>"readonly="readonly">
        <label>密码</label>
        <input name="tab_password" type="password" class="input-xlarge" value="<?php echo $array['password'];?>">
        <label>邮箱</label>
        <input name="tab_mail" type="text"  class="input-xlarge" value="<?php echo $array['email'];?>">
        
    
    	<br />
        <button id="tab_save" onClick="return save(form)"  class="btn btn-primary icon-save"> 保存</button>
 
    </form>

      </div>
      <div class="tab-pane fade" id="profile">
    <form id="tab2">
        <label>New Password</label>
        <input type="password" class="input-xlarge">
        <div>
            <button class="btn btn-primary">Update</button>
        </div>
    </form>
      </div>
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
<script type="text/javascript">
	function(form)
	{
		document.tab.submit();}
</script>
    