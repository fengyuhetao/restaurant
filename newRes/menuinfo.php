<?php include('boot.php');?>
<?php require_once('conn/conn.php');
  $currentPage = "menuinfo.php";
  if (isset($_GET['pageNum'])) {
    $pageNum = $_GET['pageNum'];
  }
  
  $query = "select * from food";
  $sql = mysql_query($query, $conn) or die(mysql_error());
  $row = mysql_fetch_assoc($sql);
  
  if (isset($_GET['totalRows'])) {
    $totalRows_rs1 = $_GET['totalRows'];
  } else {
    $all = mysql_query($query);
    $totalRows = mysql_num_rows($all);
  }
?>
    

    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">菜单管理</h1>
        </div>
        
        <ul class="breadcrumb">
            <li><a href="index.php">首页</a> <span class="divider">/</span></li>
            <li class="active">菜单管理</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
<div class="header">
  <label>共有<strong><?php echo $totalRows ?></strong> 条记录，目前显示第<strong>1</strong>条至第<strong><?php echo $totalRows ?></strong>条
    </label>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th style="width:20px;"></th>
          <th>菜品编号</th>
          <th>菜品名称</th>
          <th>价格</th>
          <th>种类</th>
          <th>描述</th>
          <th>状态</th>
          <th style="width: 45px;"></th>
        </tr>
      </thead>
      <tbody>
       <?php 
        do {
      ?>
          <?php if ($totalRows > 0) { // Show if recordset not empty ?>
        <tr>
          <?php
            $select="select state from menu where foodID=$row[foodID]";
            $sql1=mysql_query($select,$conn) or die(mysql_error());
            $array=mysql_fetch_array($sql1); 
            if($array){
          ?>
          <td><input type="checkbox" name="select" value="<?php if($array[state]==1) echo $row['foodID']." 1";else echo $row['foodID']."0";?>" checked/></td>
          <?php } else {?>
          <td><input type="checkbox" name="select" value="<?php echo $row['foodID']." 0";?>"/></td>
          <?php } ?>
          <td><?php echo $row['foodID'];?></td>
          <td><?php echo $row['foodName'];?></td>
          <td><?php echo $row['price'];?></td>
          <td><?php echo $row['foodType'];?></td>
          <td><?php echo mb_strlen($row['description'])>25?mb_substr($row['description'],0,25,"utf-8")."...":$row['description'];?></td>
          <td><?php if($array) { if($array[state]==1) echo "有";else echo "无";} else {echo "无";}?></td>
          <td>
              <a href="show_foodinfo.php?id=<?php echo $row['foodID'];?>"><i class="icon-list"></i></a>
              <a href="modify_menuinfo.php?id=<?php echo $row['foodID'];?>"><i class="icon-pencil"></i></a>
          </td>
        </tr>
       <?php } // Show if recordset not empty ?>
<?php } while ($row = mysql_fetch_assoc($sql)); ?>
       <!-- <tr>
          <td>2</td>
          <td>Ashley</td>
          <td>Jacobs</td>
          <td>ash11927</td>
          <td>
              <a href="user.html"><i class="icon-pencil"></i></a>
              <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
        <tr>
          <td>3</td>
          <td>Audrey</td>
          <td>Ann</td>
          <td>audann84</td>
          <td>
              <a href="user.html"><i class="icon-pencil"></i></a>
              <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
        <tr>
          <td>4</td>
          <td>John</td>
          <td>Robinson</td>
          <td>jr5527</td>
          <td>
              <a href="user.html"><i class="icon-pencil"></i></a>
              <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
        <tr>
          <td>5</td>
          <td>Aaron</td>
          <td>Butler</td>
          <td>aaron_butler</td>
          <td>
              <a href="user.html"><i class="icon-pencil"></i></a>
              <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
        <tr>
          <td>6</td>
          <td>Chris</td>
          <td>Albert</td>
          <td>cab79</td>
          <td>
              <a href="user.html"><i class="icon-pencil"></i></a>
              <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>-->
      </tbody>
    </table>
</div>
<div class="pagination">
    <div class="form-inline"><button class="btn" type="button">处理者ID</button>
<input class="input-xlarge" type="text" style="height:30px;" id="dealid"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="" class="btn btn-primary" data-toggle="modal" onClick="deal();"><i class="icon-save"></i>保存</a>
    <ul style="float:right"><!--自己加的右漂移-->
      <!--  <li><a href="#">Prev</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">Next</a></li>-->
    </ul>
</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">提醒</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>确定要删除此条信息?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" data-dismiss="modal" id="del" onclick="Del()">删除</button>
    </div>
</div>


                    
                    <footer>
                        <hr>
                        <p>&copy; 2015 by sunrise laboratory </p>
                </footer>
                    
            </div>
        </div>
    </div>
    <!--自定义的js-->
  </body>
</html>
<script>
function deal(){
    var dealid=document.getElementById('dealid');
    if(dealid.value=="")
    {
       alert("请输入ID");
    }
    else
    {
		  var aid="";
		  var i=0;
		  var aCb=document.getElementsByName('select');
		  for(i=0;i<aCb.length;i++)
	   	{
			  if(aCb[i].checked)
			  {
				   aid=aid+aCb[i].value+" ";
			  }
		  }
          window.location.href='menu_deal.php?aid='+aid+'&staffid='+dealid.value;
    }
  }
</script>
<?php
mysql_free_result($sql);
?>

