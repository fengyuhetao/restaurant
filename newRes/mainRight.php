<div class="content">
        
        <div class="header">
            <div class="stats">
    <p class="stat"><span class="number">53</span>tickets</p>
    <p class="stat"><span class="number">27</span>tasks</p>
    <p class="stat"><span class="number">15</span>waiting</p>
</div>

            <h1 class="page-title">主菜单</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="main.php">管理系统</a> <span class="divider">/</span></li>
            <li class="active">主菜单</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

<!--    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Just a quick note:</strong> Hope you like the theme!
    </div>
-->
	

    <div class="block">
    	<div class="block-heading">
            <span class="block-icon pull-right">
                <a href="#" class="demo-cancel-click" rel="tooltip" title="点击刷新"><i class="icon-refresh"></i></a>
            </span>
            <a href="#page-stats" data-toggle="collapse">座位情况</a>

        </div>
        
        <div id="page-stats" class="block-body collapse in">

            <div class="stat-widget-container">
              <?php
                while($arraySeat=mysql_fetch_array($selectSeat))
                {
               ?>
                <div class="stat-widget gallery">
                  <?php
                      if($arraySeat['seatState']==0)
                      {
                  ?>
                        <img class="img-polaroid" src="images/zhuozi.gif">
                      <?php
                      }
                      else
                      {
                      ?>
                      <img class="img-polaroid" src="images/zhuoziNo.jpg">
                      <?php
                      }
                      ?>
                      <div class="stat-button">
                        <p class="title">桌号:<?php echo $arraySeat['number'];?></p>
                        <p class="detail">容量:<?php echo $arraySeat['capacity'];?>人</p>
                      </div>
                </div>
                <?php
              }
              ?>
                
               
            </div>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="block span6">
        <a href="#tablewidget" class="block-heading" data-toggle="collapse">今日菜单</a>
        <div id="tablewidget" class="block-body collapse in">
            <table class="table">
              <thead>
                <tr>
                  <th>菜名</th>
                  <th>类型</th>
                  <th>单价</th>
                </tr>
              </thead>

              <?php
                $i=0;
                while($arrayMenu=mysql_fetch_array($selectMenu))
                {
                    if($i==5)
                        {break;}
                    $i++;

                    if($arrayMenu['state']==0)
                      {continue;}
               ?>
              <tbody>
                <tr>
                  <td><?php echo $arrayMenu['foodName'];?></td>
                  <td><?php echo $arrayMenu['foodType'];?></td>
                  <td><?php echo $arrayMenu['price'];?></td>
                </tr>
              </tbody>
              <?php
            }
            ?>
            </table>
            <p><a href="menu.php">更多...</a></p>
        </div>
    </div>
    <div class="block span6">
        <div class="block-heading">
            <span class="block-icon pull-right">
                <a href="#" class="demo-cancel-click" rel="tooltip" onclick="refreshClick();" title="点击刷新"><i class="icon-refresh"></i></a>
            </span>

            <a href="#widget2container" data-toggle="collapse">当前账单</a>
        </div>
        <div id="widget2container" class="block-body collapse in">
            <table class="table list">
              <?php
                $i=0;
                while($arrayBill=mysql_fetch_array($selectBill))
                {
                    if($i==5)
                        {break;}
                    $i++;
               ?>
              <tbody>
                  <tr>
                      <td>
                          <p><i class="icon-shopping-cart"></i> 账单号:<?php echo $arrayBill['billID'];?></p>
                      </td>
                      <td>
                          <p>总价:<?php echo $arrayBill['allPrice'];?>￥</p>
                      </td>
                      <td><?php 
                      if($arrayBill['dealTF']==1)
                      {echo "处理完";}
                      else
                      {echo "待处理";}
                      ?></td> 
                      <td>
                          <p>时间:<?php echo $arrayBill['date'];?></p>
                          
                      </td>
                  </tr>
                  
                 
                <?php
              }
              ?>
                    
              </tbody>
            </table>
            <p><a href="bill.php">详细信息</a></p>
        </div>
    </div>
</div>




                    
                    <footer>
                        <hr>
                        <p>&copy; 2015 by sunrise laboratory </p>
                    </footer>
                    
            </div>
        </div>
    </div>


<script>
function refreshClick()
{ 
  //****************************
  }
  
</script>