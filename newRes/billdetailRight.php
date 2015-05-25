
   <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">详细账单</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="main.php">管理系统</a> <span class="divider">/</span></li>
            <li><a href="bill.php">当前账单</a> <span class="divider">/</span></li>
            <li class="active">详细账单</li>
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
<?php
$arrayAll=mysql_fetch_array($selectAll);
?>
<h3>账单号：<?php echo $arrayAll['billID'];?>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;时间：<?php echo $arrayAll['date'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;桌号：<?php echo $arrayAll['seatID'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;处理人：<?php echo $arrayAll['staffID'];?></h3>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>菜名</th>
          <th>数量</th>
          <th>单价</th>
        </tr>
      </thead>
      <?php
	  while($arrayDetail=mysql_fetch_array($selectDetail)){
?>
      <tbody>
          <tr>
            <td></td>
            <td><?php 
			$foodname=$arrayDetail['foodID'];
			$select=mysql_query("select foodName from food where foodID=$foodname",$conn);
			$arrayName=mysql_fetch_array($select);
			echo $arrayName['foodName'];?></td>
            <td><?php echo $arrayDetail['number'];?></td>
            <td><?php echo $arrayDetail['price'];?></td>            
          </tr>
      </tbody>
      <?php
	  }
	  ?>
    </table>
</div>
<h3>总价：<?php echo $arrayAll['allPrice'];?>	</h3>
<div class="pagination">

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