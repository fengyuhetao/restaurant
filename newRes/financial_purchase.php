<?php include('boot.php');?>
<?php include("conn/conn.php");?>
<?php 
	if(isset($_GET['page'])){       //判断是否有$_GET['page']变量传进来
		$page=$_GET['page'];
	}
	else{
		$page=1;
	}
	$page_count=20;
	$sql=mysql_query("select * from ingredientpurchase");
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

<div class="content">
    	<div class="header">
            
            <h1 class="page-title">采购记录</h1>
        </div>
        <ul class="breadcrumb">
            <li><a href="index.php">首页</a> <span class="divider">/</span></li>
            <li><a href="#">采购记录</a><span class="divider">/</span></li>
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
                      <th>食材ID</th>
                      <th>采购ID</th>
                      <th>数量</th>
                      <th>单价</th>
                      <th>总价</th>
                  </tr>
              </thread>
              <tbody>
              <?php 
                    $sqls=mysql_query("select * from ingredientpurchase limit $last_record,$page_count;");
                    $array=mysql_fetch_array($sqls);
                    do{
              ?>
              <tr>
                  <td><?php echo $array['ingredientsID'];?></td>
                  <td><?php echo $array['purchaseID'];?></td>
                  <td><?php echo $array['number'];?></td>
                  <td><?php echo $array['price'];?></td>
                  <td><?php echo $array['number']*$array['price'];?>
              </tr>
              <?php 
              }while($array=mysql_fetch_array($sqls));
              ?>
              </tbody>
              </table>
              </div>
  			 <div class="pagination" >
              <ul style="float:right;">
              	  <li><a href="financial_purchase.php?page=1">首页</a> </li>
                  <li><a href="financial_purchase.php?page=<?php if($page==1){echo $page=1; }else{ echo $page-1; }?>">上一页</a></li>
                  <li><a href="financial_purchase.php?page=<?php if($page<$page_page){echo $page+1;}else{ echo $page_page;}?>">下一页</a></li>
                  <li><a href="financial_purchase.php?page=<?php echo $page_page;?>">尾页</a></li>
                  <li><a href="#" onClick="stamp('page_stats');">打印</a></li>
              </ul>
             </div>
             <?php 
				$sql1=mysql_query("select sum(number*price) as sumprice from ingredientpurchase");
				$info=mysql_fetch_array($sql1);
?>
<hr/>
总维修金额为:<input type="text" value="<?php echo $info[0];?>" disabled/>
           </div>
					 <footer>
              <hr>
                <p>&copy; 2015 by sunrise laboratory </p>
           </footer>
            </div>
        </div>
    </div>