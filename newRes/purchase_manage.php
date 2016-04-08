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
}
include("conn/conn.php");?>
<?php 
	if(isset($_GET['page'])){       //判断是否有$_GET['page']变量传进来
		$page=addslashes($_GET['page']);
	}
	else{
		$page=1;
	}
	$page_count=20;
	$sql=mysql_query("select ingredients.ingredientName,ingredients.price,ingredientrepertory.ingredientsID,sum(ingredientrepertory.number) as number  from ingredients left join ingredientrepertory on ingredientrepertory.ingredientsID=ingredients.ingredientsID group by ingredientsID
 ");
	$row=mysql_num_rows($sql);                  //判断数据的数量
	$page_page=ceil($row/$page_count);          //判断页数
	$last_record=($page-1)*$page_count;          //获取上一页的最后一条记录
?>

<style type="text/css">
    label{
      display:inline-block;
    }<!--自己加的-->
    </style>
<?php include('boot.php');?> 
 	<div class="content">
    	  <div class="header">    
            <h1 class="page-title">库存量</h1>
        </div>
        <ul class="breadcrumb">
           <li><a href="index.php">首页</a> <span class="divider">/</span></li>
            <li class="active">库存信息</li>
        </ul>
        
        <div class="container-fluid">
            <div class="row-fluid">   		
              <div class="header">
                 <label>页次<?php echo $page;?>/<?php echo $page_page;?>页 记录：<?php echo $row;?>条</label>
             </div>
            <div class="well" id="purchase">
              <table class="table" id="table3">
                 <tr align="center" valign="middle">
                   <th>食材ID</th>
                   <th>食材名</th>
                   <th>数量</th>
                   <th>单价</th>
                   <th>操作</th>
                </tr>
              <?php 
                  $sqls=mysql_query("select ingredients.ingredientName,ingredients.price,ingredientrepertory.ingredientsID,sum(ingredientrepertory.number) as number  from ingredients left join ingredientrepertory on ingredientrepertory.ingredientsID=ingredients.ingredientsID group by ingredientsID  limit $last_record,$page_count
                  ");
               while($array=mysql_fetch_array($sqls)){
              ?>        <!-- 输出数据-->
            <tr>
                 <td><?php echo $array['ingredientsID'];?></td>
                 <td><?php echo $array['ingredientName'];?></td>
                 <td><?php echo $array['number'];?></td>
                 <td><?php echo $array['price'];?></td>
                 <td>
                	 <a href="insert.php?ingredientsID=<?php echo $array['ingredientsID'];?>&price=<?php echo $array['price'];?>"><i class="icon-plus"></i></a>
                 </td>
            </tr>
          <?php 
          }
        ?>
          </table>
          </div>
                 <div class="pagination" >
                            <ul style="float:right;">
                              <li><a href="purchase_manage.php?page=1">首页</a> </li>
                              <li><a href="purchase_manage.php?page=<?php if($page==1){echo $page=1; }else{ echo $page-1; }?>">上一页</a></li>
                              <li><a href="purchase_manage.php?page=<?php if($page<$page_page){echo $page+1;}else{ echo $page_page;}?>">下一页</a></li>
                              <li><a href="purchase_manage.php?page=<?php echo $page_page;?>">尾页</a></li>
                              <li><a href="#" onClick="stamp('page_stats');">打印</a></li>    
                            </ul>
                    </div>
                    <footer>
                        <hr>
                        <p>&copy; 2015 by sunrise laboratory </p>
                    </footer>
  </body>
</html>
    
<script>
function stamp(obj)
{
	var oldStr=document.body.innerHTML;
	document.body.innerHTML=document.getElementById(obj).innerHTML;
	window.print();
	document.body.innerHTML=oldStr;
}                                                             //打印自己要打印的内容
 </script>

    
   