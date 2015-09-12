<?php include("conn/conn.php");?>
<?php 
	if(isset($_GET['page'])){       //判断是否有$_GET['page']变量传进来
		$page=$_GET['page'];
	}
	else{
		$page=1;
	}
	$page_count=20;
	$sql=mysql_query("SELECT billID,seatID,allPrice,date,staffID from bill");
	$row=mysql_num_rows($sql);                  //判断数据的数量
	$page_page=ceil($row/$page_count);          //判断页数
	$last_record=($page-1)*$page_count;          //获取上一页的最后一条记录
?>
<style type="text/css">
		label{
			display:inline-block;
		}<!--自己加的-->
    </style>
<script>
function stamp(obj)
{
	var oldStr=document.body.innerHTML;
	document.body.innerHTML=document.getElementById(obj).innerHTML;
	window.print();
	document.body.innerHTML=oldStr;
}
</script>
<?php include('boot.php');?>
<div class="content">
    	<div class="header">
            
            <h1 class="page-title">销售记录</h1>
        </div>
        <ul class="breadcrumb">
            <li><a href="index.php">首页</a> <span class="divider">/</span></li>
            <li><a href="#">销售记录</a><span class="divider">/</span></li>
        </ul>
        <div class="container-fluid">
            <div class="row-fluid">
				<div class="header">
                     <label>页次<?php echo $page;?>/<?php echo $page_page;?>页 记录：<?php echo $row;?>条</label>
  	 				 </label>
				</div>
          	  <div id="stamptable6" class="well" style="margin:0px;">
          	  <table class="table">
              <!--<tr align="center" valign="middle">-->
              <thread>
                  <tr>
                      <th>流水号</th>
                      <th>座位号</th>
                      <th>总价格</th>
                      <th>日期</th>
                      <th>处理人ID</th>
                  </tr>
              </thread>
              <tbody>
              <?php 
                    $sqls=mysql_query("SELECT billID,seatID,allPrice,date,staffID from bill limit $last_record,$page_count;");
                        $array=mysql_fetch_array($sqls);
                    do{
              ?>
              <tr>
                  <td><?php echo $array['billID'];?></td>
                      <td><?php echo $array['seatID'];?></td>
                      <td><?php echo $array['allPrice'];?></td>
                      <td><?php echo $array['date'];?></td>
                      <td><?php echo $array['staffID'];?></td>
              </tr>
              <?php 
              }while($array=mysql_fetch_array($sqls));
              ?>
              </tbody>
              </table>
              </div>
  			 <div class="pagination" >
              <ul style="float:right;">
              	  <li><a href="sell_info.php?page=1">首页</a> </li>
                  <li><a href="sell_info.php?page=<?php if($page==1){echo $page=1; }else{ echo $page-1; }?>">上一页</a></li>
                  <li><a href="sell_info.php?page=<?php if($page<$page_page){echo $page+1;}else{ echo $page_page;}?>">下一页</a></li>
                  <li><a href="sell_info.php?page=<?php echo $page_page;?>">尾页</a></li>
                  <li><a href="#" onClick="stamp('page_stats');">打印</a></li>
              </ul>
             </div>
           </div>
					 <footer>
              <hr>
                <p>&copy; 2015 by sunrise laboratory </p>
           </footer>
            </div>
        </div>
    </div>