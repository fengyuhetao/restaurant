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
include("conn/conn.php"); ?>
  <?php 
   if(isset($_GET['page'])){       //判断是否有$_GET['page']变量传进来
            $page=$_GET['page'];
        }
        else{
            $page=1;
        }
        $page_count=20;
        $sql=mysql_query("select * from ingredientpurchasetemp");
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
                                  $sqls=mysql_query("select * from ingredientpurchasetemp");
                                  $array=mysql_fetch_array($sqls);
                                  do{
                            ?>        <!-- 输出数据-->
                            <tr>
                                <td><?php echo $array['ingredientIDtemp'];?></td>
                                <td><?php echo $array['purchaseIDtemp'];?></td>
                                <td><?php echo $array['numbertemp'];?></td>
                                <td><?php echo $array['pricetemp'];?></td>
                                <td >
                                    <a href="modify_purchaseInfo.php?id=<?php echo $array['ingredientIDtemp'];?>&purchaseID=<?php echo $array['purchaseIDtemp'];?>" target="_parent"><i class="icon-pencil"></i></a>
                                    <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove" onClick="pass(<?php echo $array['ingredientIDtemp'];?>,<?php echo $array['purchaseIDtemp'];?>)"></i></a>
                                </td>
                            </tr>
                            <?php 
                            }while($array=mysql_fetch_array($sqls));
                            ?>
                            </table>
                            </div>      
                                
                            <div class="pagination" >
                            <a href="#dealModal" class="btn btn-primary" data-toggle="modal"><i class="icon-save"></i>处理</a>

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
                    <div class="modal small hide fade" id="dealModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">提醒</h3>
                        </div>
                        <div class="modal-body">
                       	 <p class="error-text"><i class="icon-warning-sign modal-icon"></i>请选择仓库?</p><br>
                         <?php 
    					    $repertory=mysql_query("select * from repertory");
    					    $row_repertory=1;
							while($array_repertory=mysql_fetch_array($repertory))
							{
  						  ?>
                            <input type="radio" value="<?php echo $array_repertory['repertoryID'];?>" name="address"><?php echo "仓库".$row_repertory.":".$array_repertory['position']; $row_repertory++; ?><br>
                     		<?php }?>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
                            <button class="btn btn-danger" data-dismiss="modal" id="deal" onclick="deal();">确定</button>
                        </div>
                    </div>
                     <footer>
                        <hr>
                        <p>&copy; 2015 by sunrise laboratory </p>
                    </footer>
            </div>
        </div>
    </div>

  </body>
  </html>
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
	
	function deal(){
		var aRadio=document.getElementsByName('address');
		var address;
		var panduan=0;
		for(var i=0;i<aRadio.length;i++)
			if(aRadio[i].checked)
			{
				panduan=1;
				address=aRadio[i].value;
			}
		if(panduan==1)
			window.location.href="deal.php?repertoryID="+address;
		else 
			alert("请选择仓库");
	}
    function stamp(obj)
    {
      var oldStr=document.body.innerHTML;
      document.body.innerHTML=document.getElementById(obj).innerHTML;
      window.print();
      document.body.innerHTML=oldStr;
    }                                                        //打印自己要打印的内容
  </script>