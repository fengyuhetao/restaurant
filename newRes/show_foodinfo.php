<?php include "conn/conn.php";?>
<?php
if($_SERVER['REQUEST_METHOD']=="GET")
{
	$id=addslashes($_GET["id"]);
	$selectsql="select * from food where foodID='".$id."'";
	$sql = mysql_query($selectsql,$conn) or die(mysql_error());
	$row = mysql_fetch_assoc($sql);
  $selectsql1="select food.foodID,ingredients.ingredientName as ingredientName from food left join foodingredients on food.foodID=foodingredients.foodID LEFT JOIN ingredients on foodingredients.ingredientsID=ingredients.ingredientsID WHERE food.foodID=$id";
  $sql1=mysql_query($selectsql1,$conn) or die(mysql_error());
}
?>

    <?php include('boot.php');?>
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
            
            <h1 class="page-title">查看菜品记录</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.php">首页</a> <span class="divider">/</span></li>
            <li><a href="foodinfo.php">菜品管理</a> <span class="divider">/</span></li>
            <li class="active">查看食品信息</li>
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
    <form name="foodinfo">
        <label>菜&nbsp;&nbsp;品&nbsp;&nbsp;编&nbsp;&nbsp;&nbsp;号</label>
        <input name="id" type="text" class="input-xlarge" value="<?php echo $row["foodID"];?>" readonly>
        <br/>
        <label>菜&nbsp;&nbsp;品&nbsp;&nbsp;名&nbsp;&nbsp;&nbsp;称</label>
        <input name="name" type="text" class="input-xlarge" value="<?php echo $row["foodName"];?>" readonly>
        <br/>
        <label>价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格</label>
        <input name="price" type="text" class="input-xlarge" value="<?php echo $row["price"];?>" readonly>
        <br/>
      	<label>种&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;类</label>
        <input name="number" type="text" class="input-xlarge" value="<?php echo $row["foodType"];?>" readonly>
        <br/>
        <label>菜&nbsp;&nbsp;品&nbsp;&nbsp;描&nbsp;&nbsp;&nbsp;述</label>
        <textarea name="desc" cols="" rows="5" readonly class="input-xlarge"><?php echo $row["description"];?></textarea>
        <br/>
        <label>菜&nbsp;&nbsp;品&nbsp;&nbsp;图&nbsp;&nbsp;&nbsp;片</label>
        <img src="<?php echo $row['imageLocation'];?>" alt="product" height="170" width="170">
        <br/>
        <br/>
        <label>必&nbsp;&nbsp;要&nbsp;&nbsp;食&nbsp;&nbsp;&nbsp;材:</label><br/>
        <?php 
            while($array=mysql_fetch_array($sql1)){
        ?>
        <input type="text" class="input-xlarge" value="<?php echo $array[ingredientName];?>" readonly/><br/>
        <?php } ?>
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
    
    <script>
	function Return()
	{
		window.location.href="foodinfo.php";
	}
	</script>
  </body>
</html>


