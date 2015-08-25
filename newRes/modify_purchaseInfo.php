<?php 
include('conn/conn.php');?>
<?php include('boot.php');?>
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">采购修改</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.php">首页</a> <span class="divider">/</span></li>
            <li><a href="#">食材添加</a> <span class="divider">/</span></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
   
                <div class="well">
                    <ul class="nav nav-tabs">
                      <li class="active">食材添加</li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div class="tab-pane active in" id="home">
                     
                     <?php $sql=mysql_query("SELECT * from ingredientpurchasetemp where ingredientIDtemp=$_GET[id] and purchaseIDtemp=$_GET[purchaseID]");
                           $info=mysql_fetch_array($sql);
                     ?>
                    <form id="tab" action="modify_purchaseInfo_ok.php?id=<?php echo $_GET[id];?>&purchaseID=<?php echo $_GET[purchaseID];?>" method="post">
                        <label>食材ID</label>
                        <input type="text" value="<?php echo $info['ingredientIDtemp'];?>" name="stf" id="stf" class="input-xlarge"/>
                        <label>采购ID</label>
                        <input type="text" value="<?php echo $info['purchaseIDtemp'];?>" name="name" id="name" class="input-xlarge"/>
                        <label>数量</label>
                        <input type="text" value="<?php echo $info['numbertemp'];?>" name="wage" id="wage" class="input-xlarge">
                        <label>单价</label>
                       <input type="text" value="<?php echo $info['pricetemp'];?>" name="price" id="price" class="input-xlarge">
                        <br/>
                        <input type="submit" class="btn" value="保存修改"/>
                    </form>
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
    
  </body>
</html>


