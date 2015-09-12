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
<?php include ("conn/conn.php"); ?>
<?php 
	if(isset($_GET['page'])){       //判断是否有$_GET['page']变量传进来
		$page=$_GET['page'];
	}
	else{
		$page=1;
	}
	$page_count=20;
	$sql=mysql_query("SELECT billID,seatID,allPrice,date,staffID from bill WHERE date>= DATE_SUB(CURDATE( ), INTERVAL 4 MONTH)");
	$row=mysql_num_rows($sql);                  //判断数据的数量
	$page_page=ceil($row/$page_count);          //判断页数
	$last_record=($page-1)*$page_count;          //获取上一页的最后一条记录
?>
<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    
<link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
<link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">
<script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>
<script>
function iframeResizeHeight(frame_name,body_name,offset) {
	parent.document.getElementById(frame_name).height=document.getElementById(body_name).offsetHeight;
}

function Resize(oframe,obody){
 	if(parent.document.getElementById(oframe)){
  		return iframeResizeHeight(oframe,obody,0);
 }
}

function stamp(obj)
{
	var oldStr=document.body.innerHTML;
	document.body.innerHTML=document.getElementById(obj).innerHTML;
	window.print();
	document.body.innerHTML=oldStr;
}
 </script>
</head>

<body onLoad="Resize('main_sell_day','sellday');">
<div id="sellday">
    <a  class="block-heading" data-toggle="collapse">页次<?php echo $page;?>/<?php echo $page_page;?>页 记录：<?php echo $row;?>条</a>

    	  <div class="well" style="padding:0px;  border:0px;">
            <div id="page_stats" class="well" style="margin:0px;">
              <table class="table" id="table3">
                  <tr align="center" valign="middle">
                      <th>流水号</th>
                      <th>座位号</th>
                      <th>总价格</th>
                      <th>日期</th>
                      <th>处理人ID</th>
                  </tr>
                  <?php 
                        $sqls=mysql_query("SELECT billID,seatID,allPrice,date,staffID from bill WHERE date>= DATE_SUB(CURDATE( ), INTERVAL 4 MONTH) limit $last_record,$page_count;");
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
                  </table>
                  </div>
                  <div class="pagination" >
                    <?php 
                 $sql1=mysql_query("select sum(allPrice) as sumprice from bill WHERE DATE>= DATE_SUB(CURDATE( ), INTERVAL 4 MONTH)");
                     $info=mysql_fetch_array($sql1);
?>
                  总销售额为:<input type="text" value="<?php echo $info[0];?>" disabled/>
                </div>
              			<ul style="float:right;">
                            <li><a href="sell_day.php?page=1">首页</a> </li>
                  		    <li><a href="sell_day.php?page=<?php if($page==1){echo $page=1; }else{ echo $page-1; }?>">上一页</a></li>
                    		<li><a href="sell_day.php?page=<?php if($page<$page_page){echo $page+1;}else{ echo $page_page;}?>">下一页</a></li>
                    		<li><a href="sell_day.php?page=<?php echo $page_page;?>">尾页</a></li>
                    		<li><a href="#" onClick="stamp('page_stats');">打印</a></li>
                        </ul>
                  </div>
             

</div>
</body>