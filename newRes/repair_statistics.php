<?php include ("conn/conn.php"); ?>
<?php 
	if(isset($_GET['page'])){       //判断是否有$_GET['page']变量传进来
		$page=$_GET['page'];
	}
	else{
		$page=1;
	}
	$page_count=20;
	$sql=mysql_query("SELECT * from repair");
	$row=mysql_num_rows($sql);                  //判断数据的数量
	$page_page=ceil($row/$page_count);          //判断页数
	$last_record=($page-1)*$page_count;          //获取上一页的最后一条记录
?>
<script>
function stamp(obj)
{
	var oldStr=document.body.innerHTML;
	document.body.innerHTML=document.getElementById(obj).innerHTML;
	window.print();
	document.body.innerHTML=oldStr;
}
 </script>
<style type="text/css">
		label{
			display:inline-block;
		}<!--自己加的-->
</style>
<div class="content">
    	<div class="header"> 
            <h1 class="page-title">维修记录</h1>
        </div>
        <ul class="breadcrumb">
            <li><a href="index.php">首页</a> <span class="divider">/</span></li>
            <li><a href="#">维修记录</a><span class="divider">/</span></li>
        </ul>
        <div class="container-fluid">
            <div class="row-fluid">
   				<div class="header">
                     <label>页次<?php echo $page;?>/<?php echo $page_page;?>页 记录：<?php echo $row;?>条</label>
  	 				 </label>
				</div>
         	   <div id="page_stats" class="well" style="margin:0px;">
                  <table class="table" id="table3">
                      <tr align="center" valign="middle">
                          <th>维修ID</th>
                          <th>维修日期</th>
                          <th>处理金额</th>
                          <th>事件描述</th>
                          <th>员工ID</th>
                      </tr>
                      <?php 
                            $array=mysql_fetch_array($sql);
                            do{
                      ?>
                      <tr>
                          <td><?php echo $array['repairID'];?></td>
                          <td><?php echo $array['date'];?></td>
                          <td><?php echo $array['dealMoney'];?></td>
                          <td><?php echo $array['eventDiscription'];?></td>
                          <td><?php echo $array['staffID'];?></td>
                      </tr>
                      <?php 
                      }while($array=mysql_fetch_array($sql));
                      ?>
                  </table>
                  </div>
                  <div class="pagination" >
                    <ul style="float:right;">
                        <li><a href="financial_repair.php?page=1">首页</a> </li>
                        <li><a href="financial_repair.php?page=<?php if($page==1){echo $page=1; }else{ echo $page-1; }?>">上一页</a></li>
                        <li><a href="financial_repair.php?page=<?php if($page<$page_page){echo $page+1;}else{ echo $page_page;}?>">下一页</a></li>
                        <li><a href="financial_repair.php?page=<?php echo $page_page;?>">尾页</a></li>
                        <li><a href="#" onClicsk="stamp('page_stats');">打印</a></li>
                    </ul>
                   </div>
                   <?php 
                      $sql1=mysql_query("select sum(dealMoney) as sumprice from repair");
                      $info=mysql_fetch_array($sql1);
                      ?>
                  <hr/>
                  总维修金额为:<input type="text" value="<?php echo $info[0];?>" disabled/>
                 </div>
					<footer>
                        <hr>
                        <p>&copy; 2012 <a href="#" target="_blank">Portnine</a></p>
                    </footer>    
            </div>
        </div>
    </div>