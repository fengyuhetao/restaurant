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
<?php
$select="select * from ingredients";
$query=mysql_query($select,$conn) or die(mysql_error());
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
        <!-- <label>选&nbsp;&nbsp;择&nbsp;&nbsp;图&nbsp;&nbsp;&nbsp;片</label> -->
        <!-- <input type="file" name="uploadfile" onchange="load();" id="picture"/> -->
        <br/>
        <label>选&nbsp;&nbsp;择&nbsp;&nbsp;食&nbsp;&nbsp;&nbsp;材:</label>
        <br/>
        <?php 
              while($array=mysql_fetch_array($query)){
        ?>
              <input type="checkbox" name="select[]" value="<?php echo $array['ingredientsID'];?>">&nbsp;&nbsp;<?php echo $array['ingredientName']?>&nbsp;&nbsp;&nbsp;&nbsp;
        <?php
            }
        ?>
        
      </div>
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
		document.foodinfo.submit();
	}
	</script>


