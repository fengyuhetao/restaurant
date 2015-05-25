<?php
if(isset($_POST['tab_password']))
{
	if($_POST['tab_password']=="")
	{
		echo "<script> alert('密码不能为空！');window.location.href='user.php'</script>";
		return ;
		}
	$updateSQL ="update usersystem set password='".$_POST['tab_password']."',email='".$_POST['tab_mail']."'";
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
        
        <!--<label>Address</label>
        <textarea value="Smith" rows="3" class="input-xlarge">
2817 S 49th
Apt 314
San Jose, CA 95101
        </textarea>
        <label>Time Zone</label>
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
    