<?php include('boot.php');?>
<?php include "conn/conn.php";?>
<?php
if($_SERVER['REQUEST_METHOD']=="GET")
{
	$id=$_GET["id"];
	$selectsql="select * from staff where staffID='".$id."'";
	$sql = mysql_query($selectsql,$conn) or die(mysql_error());
	$row = mysql_fetch_assoc($sql);
}
else if($_SERVER['REQUEST_METHOD']=="POST")
{
	$updatesql="update staff set name='".$_POST['name']."',sex='".$_POST['sex']."',age=".$_POST['age'].",identityCardID='".$_POST['sfid']."',position='".$_POST['pos']."',phone='".$_POST['tel']."',wage=".$_POST['wage'].",startWorkTime='".$_POST['startt']."',endWorkTime='".$_POST['endt']."'where staffID='".$_POST['id']."';";
		$sql = mysql_query($updatesql, $conn) or die(mysql_error());
	echo "<script> alert('修改成功！');window.location.href='staffinfo.php'</script>";
}
?>
    

    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">修改员工信息</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.php">首页</a> <span class="divider">/</span></li>
            <li><a href="staffinfo.php">员工信息管理</a> <span class="divider">/</span></li>
            <li class="active">修改员工信息</li>
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
    <form id="staffinfo" method="post">
        <label>工&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号</label>
        <input name="id" type="text" class="input-xlarge" value="<?php echo $row['staffID'];?>" readonly>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别</label>
        <input type="text" name="sex" value="<?php echo $row['sex'];?>" class="input-xlarge">
        <br/>
        <label>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名</label>
        <input type="text" name="name" value="<?php echo $row['name'];?>" class="input-xlarge">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄</label>
        <input type="text" name="age" value="<?php echo $row['age'];?>" class="input-xlarge">
        <br/>
        <label>身份证号</label>
        <input type="text" name="sfid" value="<?php echo $row['identityCardID'];?>" class="input-xlarge">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>职&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;位</label>
        <input type="text" name="pos" value="<?php echo $row['position'];?>" class="input-xlarge">
        <br/>
        <label>联系方式</label>
        <input type="text" name="tel" value="<?php echo $row['phone'];?>" class="input-xlarge">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>合同起始日期</label>
        <input type="text" name="startt" value="<?php echo $row['startWorkTime'];?>" class="input-xlarge">
        <br/>
        <label>薪&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;资</label>
        <input type="text" name="wage" value="<?php echo $row['wage'];?>" class="input-xlarge">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>合同结束日期</label>
        <input type="text" name="endt" value="<?php echo $row['endWorkTime'];?>" class="input-xlarge">
       <!-- <label>Time Zone</label>
        <select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
          <option value="-12.0">(GMT -12:00) Eniwetok, Kwajalein</option>
          <option value="-11.0">(GMT -11:00) Midway Island, Samoa</option>
          <option value="-10.0">(GMT -10:00) Hawaii</option>
          <option value="-9.0">(GMT -9:00) Alaska</option>
          <option selected="selected" value="-8.0">(GMT -8:00) Pacific Time (US &amp; Canada)</option>
          <option value="-7.0">(GMT -7:00) Mountain Time (US &amp; Canada)</option>
          <option value="-6.0">(GMT -6:00) Central Time (US &amp; Canada), Mexico City</option>
          <option value="-5.0">(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima</option>
          <option value="-4.0">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
          <option value="-3.5">(GMT -3:30) Newfoundland</option>
          <option value="-3.0">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
          <option value="-2.0">(GMT -2:00) Mid-Atlantic</option>
          <option value="-1.0">(GMT -1:00 hour) Azores, Cape Verde Islands</option>
          <option value="0.0">(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
          <option value="1.0">(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris</option>
          <option value="2.0">(GMT +2:00) Kaliningrad, South Africa</option>
          <option value="3.0">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
          <option value="3.5">(GMT +3:30) Tehran</option>
          <option value="4.0">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
          <option value="4.5">(GMT +4:30) Kabul</option>
          <option value="5.0">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
          <option value="5.5">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
          <option value="5.75">(GMT +5:45) Kathmandu</option>
          <option value="6.0">(GMT +6:00) Almaty, Dhaka, Colombo</option>
          <option value="7.0">(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
          <option value="8.0">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
          <option value="9.0">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
          <option value="9.5">(GMT +9:30) Adelaide, Darwin</option>
          <option value="10.0">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
          <option value="11.0">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
          <option value="12.0">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
    </select>-->
    
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
    <button class="btn btn-primary" onClick="return BaoCun(form)" value="save"><i class="icon-save"></i> 保存</button>
</form>   <!-- <a href="#myModal" data-toggle="modal" class="btn">Delete</a>-->
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
     <script type="text/javascript" src="js/check.js"></script>
    <script>
   	function BaoCun(form)
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
<?php
mysql_free_result($sql);
?>

