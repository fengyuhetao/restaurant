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
include "conn/conn.php";?>
<?php
	if($_POST['id']!="")
	{
 		$insertSQL ="insert into staff(staffID,name,sex,age,identityCardID,position,phone,wage,startWorkTime,endWorkTime) values (addslashes($_POST[id]),'addslashes($_POST[sex])','addslashes($_POST[name])',addslashes($_POST[age]),'addslashes($_POST[sfid])','addslashes($_POST[pos])','addslashes($_POST[tel])',addslashes($_POST[wage]),'addslashes($_POST[startt])','addslashes($_POST[endt]'))";
		$sql = mysql_query($insertSQL, $conn);
	echo "<script> alert('添加成功！');window.location.href='staffinfo.php'</script>";	
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
            
            <h1 class="page-title">添加员工信息</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.php">首页</a> <span class="divider">/</span></li>
            <li><a href="staffinfo.php">员工信息管理</a> <span class="divider">/</span></li>
            <li class="active">添加员工信息</li>
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
    <form name="staffinfo" method="post">
        <label>工&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号</label>
        <input type="text" name="id" class="input-xlarge">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别</label>
        <input type="text" name="sex" class="input-xlarge">
        <br/>
        <label>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名</label>
        <input type="text" name="name" class="input-xlarge">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄</label>
        <input type="text" name="age" class="input-xlarge">
        <br/>
        <label>身份证号</label>
        <input type="text" name="sfid" class="input-xlarge">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>职&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;位</label>
        <input type="text" name="pos" class="input-xlarge">
        <br/>
        <label>联系方式</label>
        <input type="text" name="tel" class="input-xlarge">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>合同起始日期</label>
        <input type="text" name="startt" class="input-xlarge">
        <br/>
        <label>薪&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;资</label>
        <input type="text" name="wage" class="input-xlarge">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>合同结束日期</label>
        <input type="text" name="endt" class="input-xlarge">
    
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
		if(!checkid(staffinfo.sfid))
			return false;
		if(!checktel(staffinfo.tel))
			return false;
		if(!checkdate(staffinfo.startt))
			return false;
		if(!checkdate(staffinfo.endt))
			return false;
		document.staffinfo.submit();
	}
	</script>
  </body>
</html>


