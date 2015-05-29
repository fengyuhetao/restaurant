<?php include("conn/conn.php");?>
<?php 
	if(isset($_GET['page'])){       //判断是否有$_GET['page']变量传进来
		$page=$_GET['page'];
	}
	else{
		$page=1;
	}
	$page_count=20;
	$sql=mysql_query("SELECT IngredientRepertory.repertoryID,IngredientRepertory.ingredientsID,INGREDIENTS.ingredientName, IngredientRepertory.number, INGREDIENTS.description FROM IngredientRepertory INNER JOIN INGREDIENTS ON IngredientRepertory.ingredientsID = INGREDIENTS.ingredientsID INNER JOIN
 REPERTORY ON IngredientRepertory.repertoryID = REPERTORY.repertoryID 
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
                   <th>仓库ID</th>
                   <th>食材ID</th>
                   <th>食材名称</th>
                   <th>数量</th>
                </tr>
              <?php 
                  $sqls=mysql_query("SELECT IngredientRepertory.repertoryID,IngredientRepertory.ingredientsID,INGREDIENTS.ingredientName, IngredientRepertory.number, INGREDIENTS.description FROM IngredientRepertory INNER JOIN INGREDIENTS ON IngredientRepertory.ingredientsID = INGREDIENTS.ingredientsID INNER JOIN
                      REPERTORY ON IngredientRepertory.repertoryID = REPERTORY.repertoryID  limit $last_record,$page_count
                  ");
                $array=mysql_fetch_array($sqls);
             do{
              ?>        <!-- 输出数据-->
            <tr>
                 <td><?php echo $array['repertoryID'];?></td>
                 <td><?php echo $array['ingredientsID'];?></td>
                 <td><?php echo $array['ingredientName'];?></td>
                 <td><?php echo $array['number'];?></td>
            </tr>
          <?php 
          }while($array=mysql_fetch_array($sqls));
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
                        <p>&copy; 2012 <a href="#" target="_blank">Portnine</a></p>
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

    
   