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
}?>
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
$billID=$arrayAll['billID'];
?>
<h3>账单号：<?php echo $billID;?>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;时间：<?php echo $arrayAll['date'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;桌号：<?php echo $arrayAll['seatID'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;处理人：<?php echo $arrayAll['staffID'];?></h3>
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

<div class="form-inline"><button class="btn" type="button">处理者ID</button>
<input class="input-xlarge" type="text" style="height:30px;" id="dealid"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" data-toggle="modal" onclick="deal(<?php echo $billID;?>);"><i class="icon-save"></i>处理</button>
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
function deal(billID){
  var dealid=document.getElementById('dealid');

  if(dealid.value=="")
  {
      alert("请输入ID");
  }
  else
  { 
        window.location.href='bill_deal.php?billID='+billID+'&staffID='+dealid.value;
  }
  }
</script>