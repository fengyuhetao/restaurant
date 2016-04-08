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
		$page=addslashes($_GET['page']);
	}
	else{
		$page=1;
	}
	$page_count=20;
	$sql=mysql_query("select * from staff");
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

<body onLoad="Resize('main_info','main');">
<!--<table style="border:1px dotted red; width:100%;" cellpadding="1" border="1" cellspacing="0">-->
<div id="main">
    <a href="#page-stats" class="block-heading" data-toggle="collapse">页次<?php echo $page;?>/<?php echo $page_page;?>页 记录：<?php echo $row;?>条</a>
    	  <div class="well" style="padding:0px; border:0px;">
            <div id="page_stats" class="well" style="margin:0px;">
                <table class="table">
                <!--<tr align="center" valign="middle">-->
                <thread>
                    <tr>
                        <th>员工ID</th>
                        <th>姓名</th>
                        <th>性别</th>
                        <th>年龄</th>
                        <th>身份证号</th>
                        <th>职位</th>
                        <th>联系方式</th>
                        <th>薪资</th>
                        <th>劳务合同开始日期</th>
                        <th>劳务合同结束日期</th>
                    </tr>
                </thread>
                <tbody>
                <?php 
                      $sqls=mysql_query("select * from staff limit $last_record,$page_count");
                      $array=mysql_fetch_array($sqls);
                      do{
                ?>
                <tr>
                    <td><?php echo $array['staffID'];?></td>
                    <td><?php echo $array['name'];?></td>
                    <td><?php echo $array['sex'];?></td>
                    <td><?php echo $array['age'];?></td>
                    <td><?php echo $array['identityCardID'];?></td>
                    <td><?php echo $array['position'];?></td>
                    <td><?php echo $array['phone'];?></td>
                    <td><?php echo $array['wage'];?></td>
                    <td><?php echo $array['startWorkTime'];?></td>
                    <td><?php echo $array['endWorkTime'];?></td>
                </tr>
                <?php 
                }while($array=mysql_fetch_array($sqls));
                ?>
                </tbody>
                </table>
        </div>
        <div class="pagination" >
            <ul style="float:right;">
              <li><a href="staff_info.php?page=1">首页</a> </li>
              <li><a href="staff_info.php?page=<?php if($page==1){echo $page=1; }else{ echo $page-1; }?>">上一页</a></li>
              <li><a href="staff_info.php?page=<?php if($page<$page_page){echo $page+1;}else{ echo $page_page;}?>">下一页</a></li>
              <li><a href="staff_info.php?page=<?php echo $page_page;?>">尾页</a></li>
              <li><a href="#" onClick="stamp('page_stats');">打印</a></li>   
            </ul>
         </div>
         <?php 
				$sql1=mysql_query("select sum(wage) as sumprice from staff");
				$info=mysql_fetch_array($sql1);
?>
<hr/>
所有员工工资总额为:<input type="text" value="<?php echo $info[0];?>" disabled/>
           </div>
     </div>
</div>