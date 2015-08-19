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
<?php include("conn/conn.php");?>
<?php 
    if(isset($_GET['page'])){       //判断是否有$_GET['page']变量传进来
        $page=$_GET['page'];
    }
    else{
        $page=1;
    }
    $page_count=20;
    $sql=mysql_query("select bill.date,bill.billID,billfood.foodID,billfood.number,billfood.price,food.foodName from bill left join (billfood left join food on billfood.foodID=food.foodID) on bill.billID=billfood.billID where bill.date>= DATE_SUB(CURDATE( ), INTERVAL 2 MONTH)");
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
<body onLoad="Resize('main_sell','sell_menu');">
    <div id="sell_menu">
    <a href="#page-stats" class="block-heading" data-toggle="collapse">页次<?php echo $page;?>/<?php echo $page_page;?>页 记录：<?php echo $row;?>条</a>
    	  <div class="well" style="padding:0px;  border:0px;">
            <div id="page_stats" class="well" style="margin:0px;">
                <table class="table">
                  <tr align="center" valign="middle">
                      <th>流水号</th>
                      <th>食物ID</th>
                      <th>名称</th>
                      <th>数量</th>
                      <th>单价</th>
                      <th>日期</th>
                  </tr>
                  <?php 
                        $sqls=mysql_query("select bill.date,bill.billID,billfood.foodID,billfood.number,billfood.price,food.foodName from bill left join (billfood left join food on billfood.foodID=food.foodID) on bill.billID=billfood.billID where bill.date>= DATE_SUB(CURDATE( ), INTERVAL 2 MONTH) limit $last_record,$page_count");
                        $array=mysql_fetch_array($sqls);
                        do{
                  ?>
                  <tr>
                      <td><?php echo $array['billID'];?></td>
                      <td><?php echo $array['foodID'];?></td>
                      <td><?php echo $array['foodName'];?></td>
                      <td><?php echo $array['number'];?></td>
                      <td><?php echo $array['price'];?></td>
                      <td><?php echo $array['date'];?>
                  </tr>
                  <?php 
                  }while($array=mysql_fetch_array($sqls));
                  ?>
                </table>
               </div>
                <div class="pagination" >
                      <ul style="float:right;">
                      	  <li><a href="sell_menu_statistics.php?page=1">首页</a> </li>
                          <li><a href="sell_menu_statistics.php?page=<?php if($page==1){echo $page=1; }else{ echo $page-1; }?>">上一页</a></li>
                          <li><a href="sell_menu_statistics.php?page=<?php if($page<$page_page){echo $page+1;}else{ echo $page_page;}?>">下一页</a></li>
                          <li><a href="sell_menu_statistics.php?page=<?php echo $page_page;?>">尾页</a></li>
                          <li><a onClick="stamp('page_stats');">打印</a></li>
                      </ul>
                </div>
  <hr/>
  				<div class="well">
                <table class="table" style="width:30%;">
                    <caption>本月销售金榜</caption>
                    <tr align="center" valign="middle">
                        <th>食物ID</th>
                    </tr>
                    <?php 
                          $sqls=mysql_query("SELECT billfood.foodID, SUM(number) AS total, food.foodName FROM billfood
LEFT JOIN food ON billfood.foodID = food.foodID  GROUP BY billfood.foodID ORDER BY total LIMIT 3");
                          $array=mysql_fetch_array($sqls);
                          do{
                    ?>
                    <tr>
                        <td><?php echo $array['foodName'];?></td>
                    </tr>
                    <?php 
                    }while($array=mysql_fetch_array($sqls));
                    ?>
                </table>
                </div>
                <div class="well">
                <table class="table" style="width:30%;">
                    <caption>本周销售差榜</caption>
                      <tr align="center" valign="middle">
                          <th >食物ID</th>
                    </tr>
                    <?php 
                          $sqls=mysql_query("SELECT billfood.foodID, SUM( number ) AS total, food.foodName FROM billfood
LEFT JOIN food ON billfood.foodID = food.foodID  GROUP BY billfood.foodID ORDER BY total desc LIMIT 3");
                          $array=mysql_fetch_array($sqls);
                          do{
                    ?>
                    <tr>
                        <td><?php echo $array['foodName'];?></td>
                    </tr>
                    <?php 
                    }while($array=mysql_fetch_array($sqls));
                    ?>
                </table>
                </div>
    </div>
</div>
</body>