<?php include('boot.php');?>
<?php require_once('conn/conn.php');
if(isset($_GET['id']) && $_GET["id"]!="")
{
	$id=addslashes($_GET["id"]);
	$deleteSQL="delete from seat where seatID='".$id."'";
	$sql=mysql_query($deleteSQL,$conn) or die(mysql_error());
	echo "<script>window.location.href='seatinfo.php';</script>";
}
else
{
	$currentPage = "seatinfo.php";
	$maxRows = 5;
	$pageNum = 0;
	if (isset($_GET['pageNum'])) {
	  $pageNum = addslashes($_GET['pageNum']);
	}
	$startRow = $pageNum * $maxRows;
	
	$query = "select * from seat";
	$query_limit = sprintf("%s limit %d, %d", $query, $startRow, $maxRows);
	$sql = mysql_query($query_limit, $conn) or die(mysql_error());
	$row = mysql_fetch_assoc($sql);
	
	if (isset($_GET['totalRows'])) {
	  $totalRows_rs1 = addslashes($_GET['totalRows']);
	} else {
	  $all = mysql_query($query);
	  $totalRows = mysql_num_rows($all);
	}
	$totalPages = ceil($totalRows/$maxRows)-1;
}
?>
    

    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">座位管理</h1>
        </div>
        
        <ul class="breadcrumb">
            <li><a href="index.php">首页</a> <span class="divider">/</span></li>
            <li class="active">座位信息</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
<div class="header">
	<label>共有<strong><?php echo $totalRows ?></strong> 条记录，目前显示第<strong><?php echo ($startRow + 1) ?></strong>条至第<strong><?php echo min($startRow + $maxRows, $totalRows) ?></strong>条
    </label>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>座位ID</th>
          <th>桌号</th>
          <th>容纳人数</th>
          <th>座位位置</th>
          <th>座位状态</th>
          <th style="width: 45px;"></th>
        </tr>
      </thead>
      <tbody>
       <?php 
	  		do {
			?>
          <?php if ($totalRows > 0) { // Show if recordset not empty ?>
        <tr>
          <td><?php echo $row['seatID'];?></td>
          <td><?php echo $row['number'];?></td>
          <td><?php echo $row['capacity'];?></td>
          <td><?php echo $row['seatDirection'];?></td>
          <td><?php if($row['seatState']==1) echo "有人";else echo "无人";?></td>
          <td>
              <a href="modify_seatinfo.php?id=<?php echo $row['seatID'];?>"><i class="icon-pencil"></i></a>
              <a href="#myModal" role="button" data-toggle="modal"><i id="<?php echo $row['seatID'];?>" onClick="PassID(this)" class="icon-remove"></i></a>
          </td>
        </tr>
		   <?php } // Show if recordset not empty ?>
<?php } while ($row = mysql_fetch_assoc($sql)); ?>
      </tbody>
    </table>
</div>
<div class="pagination">
    <button class="btn btn-primary" onClick="GoToTianJia()"><i class="icon-plus"></i>添加</button>
    <ul style="float:right"><!--自己加的右漂移-->
        <li><a href="<?php printf("%s?pageNum=%d", $currentPage, 0); ?>">第一页</a></li>
        <li><a href="<?php printf("%s?pageNum=%d", $currentPage, max(0, $pageNum - 1)); ?>">上一页</a></li>
        <li><a href="<?php printf("%s?pageNum=%d", $currentPage, min($totalPages, $pageNum + 1)); ?>">下一页</a></li>
        <li><a href="<?php printf("%s?pageNum=%d", $currentPage, $totalPages); ?>">最后一页</a></li>
    </ul>
</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">提醒</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>确定要删除此条记录?</p>
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
    <script>
		function GoToTianJia(){
			window.location.href="add_seatinfo.php";
		}
		var seatid;
		function PassID(obj){
			seatid=obj.id;
		}
		function Del(){
			window.location.href="seatinfo.php?id="+seatid;
		}
	</script>
  </body>
</html>
<?php
mysql_free_result($sql);
?>

