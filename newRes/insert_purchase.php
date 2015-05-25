    <?php include("conn/conn.php"); ?>
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
    <script>
		var ingredientsid=0,purchaseid=0;
		function pass(ingredientsID,purchaseID){
			alert(ingredientsID);
			ingredientsid=ingredientsID;
			purchaseid=purchaseID;
		}
		function del(){
			//alert(staffid);
			window.location.href="purchase_delete_info.php?ingredientsID="+ingredientsid+"&purchaseID="+purchaseid;
		}
	 	function stamp(obj)
		{
			var oldStr=document.body.innerHTML;
			document.body.innerHTML=document.getElementById(obj).innerHTML;
			window.print();
			document.body.innerHTML=oldStr;
		}                                                        //打印自己要打印的内容
	</script>
    <style type="text/css">
		label{
			display:inline-block;
		}<!--自己加的-->
    </style> 
    
    <?php include('boot.php');?>
      
    <div class="content">
    	<div class="header">
            
  	         <h1 class="page-title">采购管理</h1>
        </div>
        <ul class="breadcrumb">	
            <li><a href="index.php">首页</a> <span class="divider">/</span></li>
            <li class="active">采购管理</li>
        </ul>
        <div class="container-fluid">
            <div class="row-fluid">   
    	        <div class="header">
                     <label>页次<?php echo $page;?>/<?php echo $page_page;?>页 记录：<?php echo $row;?>条</label>
				</div>		
                     <div class="well">
                      <table class="table" id="table3">
                           <tr align="center" valign="middle">
                                <th>食材ID</th>
                                <th>采购ID</th>
                                <th>数量</th>
                                <th>单价</th>
                                <th>操作</th>
                            </tr>
                            <?php 
                                  $sqls=mysql_query("select * from ingredientpurchase");
                                  $array=mysql_fetch_array($sqls);
                                  do{
                            ?>        <!-- 输出数据-->
                            <tr>
                                <td><?php echo $array['ingredientsID'];?></td>
                                <td><?php echo $array['purchaseID'];?></td>
                                <td><?php echo $array['number'];?></td>
                                <td><?php echo $array['price'];?></td>
                                <td >
                                    <a href="modify_purchaseInfo.php?id=<?php echo $array['ingredientsID'];?>&purchaseID=<?php echo $array['purchaseID'];?>" target="_parent"><i class="icon-pencil"></i></a>
                                    <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove" onClick="pass(<?php echo $array['ingredientsID'];?>,<?php echo $array['purchaseID'];?>)"></i></a>
                                </td>
                            </tr>
                            <?php 
                            }while($array=mysql_fetch_array($sqls));
                            ?>
                            </table>
                            </div>      
                                
                            <div class="pagination" >
							      <a class="btn btn-primary" style="float:left;" href="insert.php" target="_top"><i class="icon-plus"></i>添加</a>
                                              <ul style="float:right;">
                                                  <li><a href="insert_purchase.php?page=1">首页</a> </li>
                                                  <li><a href="insert_purchase.php?page=<?php if($page==1){echo $page=1; }else{ echo $page-1; }?>">上一页</a></li>
                                                  <li><a href="insert_purchase.php?page=<?php if($page<$page_page){echo $page+1;}else{ echo $page_page;}?>">下一页</a></li>
                                                  <li><a href="insert_purchase.php?page=<?php echo $page_page;?>">尾页</a></li>
                                                  <li><a href="#" onClick="stamp('page_stats');">打印</a></li>                     
                                              </ul>
                                      </div>
                      <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">提醒</h3>
                        </div>
                        <div class="modal-body">
                            <p class="error-text"><i class="icon-warning-sign modal-icon"></i>确定要删除此条信息?</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
                            <button class="btn btn-danger" data-dismiss="modal" id="del" onclick="del();">删除</button>
                        </div>
                    </div>
                    <footer>
                        <hr>
                        <p>&copy; 2012 <a href="#" target="_blank">Portnine</a></p>
                    </footer>
            </div>
        </div>
    </div>
