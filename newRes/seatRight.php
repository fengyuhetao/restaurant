
<div class="content">
        
        <div class="header">
            
            <h1 class="page-title">座位情况</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="main.php">管理系统</a> <span class="divider">/</span></li>
            <li class="active">座位情况</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<!--<div class="btn-toolbar">
    <button class="btn btn-primary"><i class="icon-plus"></i> New User</button>
    <button class="btn">Import</button>
    <button class="btn">Export</button>
  <div class="btn-group">
  </div>
</div>-->
<div class="well">

    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>桌号</th>
          <th>状态</th>
          <th>容纳人数</th>
          <th>位置</th>
         <!-- <th style="width: 26px;"></th>-->
        </tr>
      </thead>
      
      <?php

	  while($array=mysql_fetch_array($selects)){
	  //$icon=substr($array['icon'],3,30);
?>
      <tbody>
        
  <tr>
    <td></td>
    <td><?php echo $array['number'];?></td>
    <td><?php 
                if($array['seatState']==1)
                {
                  echo "有人";}
                if($array['seatState']==0)
                {
                  echo "无人";}
                ?>
    </td>
    <td><?php echo $array['capacity'];?>人</td>
    <td><?php echo $array['seatDirection'];?></td>
  </tr>
  
      </tbody>
      <?php 
}
?>
    </table>
    
</div>
<div class="pagination">
    <ul>
        <li><a href="seat.php?page=1">第一页</a></li>
        <li><a href="seat.php?page=<?php if($page==1){echo $page=1; }else{ echo $page-1; }?>">上一页</a></li>
        <li><a href="seat.php?page=<?php if($page<$page_page){echo $page+1;}else{ echo $page_page;}?>">下一页</a></li>
        <li><a href="seat.php?page=<?php echo $page_page;?>">最后一页</a></li>
    </ul>
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
    
