
   <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">当前账单</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="main.php">管理系统</a> <span class="divider">/</span></li>
            <li class="active">当前账单</li>
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
          <th>账单号</th>
          <th>时间</th>
          <th>桌号</th>
          <th>总价</th>
          <th>处理完成</th>
          <th>处理人ID</th>
        </tr>
      </thead>
      
      <?php
	  while($array=mysql_fetch_array($selects)){
	  //$icon=substr($array['icon'],3,30);
?>
      <tbody>
        
          <tr>
            <td></td>
            <td><a href="billdetail.php?iD=<?php echo $array['billID'];?>"><?php echo $array['billID'];?></a></td>
            <td><?php echo $array['date'];?></td>
            <td><?php echo $array['seatID'];?></td>
            <td><?php echo $array['allPrice'];?></td>
            <td><?php 
            if($array['dealTF']==1)
            {echo "是";}
            else
            {echo "否";}
            ?></td>
            <td><?php echo $array['staffID'];?></td>
            
          </tr>
         
      </tbody>
      <?php
	  }
	  ?>
    </table>
</div>
<div class="pagination">
    <ul>
        <li><a href="bill.php?page=1">第一页</a></li>
        <li><a href="bill.php?page=<?php if($page==1){echo $page=1; }else{ echo $page-1; }?>">上一页</a></li>
        <li><a href="bill.php?page=<?php if($page<$page_page){echo $page+1;}else{ echo $page_page;}?>">下一页</a></li>
        <li><a href="bill.php?page=<?php echo $page_page;?>">最后一页</a></li>
    </ul>
</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-

hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the 

user?</p>
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
  