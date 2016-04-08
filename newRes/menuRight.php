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
?>
<div class="content">
    <div class="header">
        <h1 class="page-title">
            今日菜单</h1>
    </div>
    <ul class="breadcrumb">
        <li><a href="main.php">管理系统</a> <span class="divider">/</span></li>
        <li class="active">菜单</li>
    </ul>


 <div class="container-fluid">
        <div class="row-fluid">
            <div class="row-fluid">
            <?php
                $i=0;
                while($array1=mysql_fetch_array($select))
                {
                    if($i==4)
                        {break;}
                    $i++;
            ?>
            <div class="block span3">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        
                        <img src="<?php echo $array1['image'];?>" alt="product" height="170" width="170">
                        <div class="caption">
                            <h3>
                                <?php echo $array1['foodName'];?></h3>
                            <p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
            </div>
            <div class="well">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                菜名
                            </th>
                            <th>
                                类型
                            </th>
                            <th>
                                单价
                            </th>
                            <th>
                                描述
                            </th>
                            <th>
                                状态
                            </th>
                           <!-- <th style="width: 26px;">
                            </th>-->
                        </tr>
                    </thead>
                          <?php
	  while($array=mysql_fetch_array($selects)){
	  //$icon=substr($array['icon'],3,30);
?>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $array['foodName'];?>
                            </td>
                            <td>
                                <?php echo $array['price'];?>
                            </td>
                            <td>
                                <?php echo $array['foodType'];?>
                            </td>
                            <td>
                                <?php echo $array['description'];?>
                            </td>
                            <td>
                                <?php 
								if($array['state']==1)
								{
									echo "有";}
								if($array['state']==0)
								{
									echo "无";}
								?>
                            </td>
                            <!--<td>
                                <a href="user.html"><i class="icon-pencil"></i></a><a href="#myModal" role="button"
                                    data-toggle="modal"><i class="icon-remove"></i></a>
                            </td>-->
                        </tr>
                    </tbody>
                    <?php 
}
?>
                </table>
            </div>
            <div class="pagination">
                <ul>
                	<li><a href="menu.php?page=1">第一页</a></li>
                    <li><a href="menu.php?page=<?php if($page==1){echo $page=1; }else{ echo $page-1; }?>">上一页</a></li>
                    <li><a href="menu.php?page=<?php if($page<$page_page){echo $page+1;}else{ echo $page_page;}?>">下一页</a></li>
                    <li><a href="menu.php?page=<?php echo $page_page;?>">最后一页</a></li>
                </ul>
            </div>
            <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria- hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×</button>
                    <h3 id="myModalLabel">
                        Delete Confirmation</h3>
                </div>
                <div class="modal-body">
                    <p class="error-text">
                        <i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the
                        user?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">
                        Cancel</button>
                    <button class="btn btn-danger" data-dismiss="modal">
                        Delete</button>
                </div>
            </div>
            <footer>
                        <hr>
                        <p>&copy; 2015 by sunrise laboratory </p>
                    </footer>
        </div>
    </div>
</div>


          