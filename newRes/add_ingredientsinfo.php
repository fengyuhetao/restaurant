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
function CleanHtmlTags( $content )
{
	$content = htmlspecialchars( $content );
	$content = str_replace( '\n', '<br />', $content );
	$content = str_replace( '  ', '&nbsp;&nbsp;' , $content );
	return str_replace( '\t', '&nbsp;&nbsp;&nbsp;&nbsp;', $content );
}
?>
<?php
	if(isset($_POST['id']) && $_POST['id']!="")
	{
		$desc=CleanHtmlTags($_POST['desc']);
    $selectSQL="select * from repertory";
    $sql = mysql_query($selectSQL, $conn) or die(mysql_error());
    while($row=mysql_fetch_array($sql)){
         $insertSQL1="insert into ingredientrepertory(ingredientsID,repertoryID,number) values (addslashes($_POST[id]),$row[repertoryID],0);";
         $sql2=mysql_query($insertSQL1,$conn) or die(mysql_error());
       }
    $insertSQL ="insert into ingredients(ingredientsID,ingredientName,price,number,description) values (addslashes($_POST[id]),'$_POST[name]',$_POST[price],0,'$desc');";
		$sql1 = mysql_query($insertSQL, $conn) or die(mysql_error());
	echo "<script> alert('添加成功！');window.location.href='ingredientsinfo.php'</script>";	
	}
	
?>
<?php include("boot.php");?>
<style type="text/css">
		label{
			display:inline-block;
		}<!--自己加的-->
    </style>
    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">添加食材记录</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.php">首页</a> <span class="divider">/</span></li>
            <li><a href="staffinfo.php">食材管理</a> <span class="divider">/</span></li>
            <li class="active">添加食材记录</li>
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
    <form name="ingredintsinfo" method="post">
        <label>食&nbsp;&nbsp;材&nbsp;&nbsp;编&nbsp;&nbsp;&nbsp;号</label>
        <input name="id" type="text" class="input-xlarge" value=""/>
        <br/>
        <label>食&nbsp;&nbsp;材&nbsp;&nbsp;名&nbsp;&nbsp;&nbsp;称</label>
        <input name="name" type="text" class="input-xlarge" value="">
        <br/>
        <label>价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格</label>
        <input name="price" type="text" class="input-xlarge" value="">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br/>
        <label>食&nbsp;&nbsp;材&nbsp;&nbsp;描&nbsp;&nbsp;&nbsp;述</label>
        <textarea name="desc" cols="" rows="5" class="input-xlarge"></textarea>
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
		document.ingredientsinfo.submit();
	}
	</script>


