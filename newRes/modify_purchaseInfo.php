	<?php include('boot.php');?>
    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">采购修改</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.php">HOME</a> <span class="divider">/</span></li>
            <li><a href="#">食材添加</a> <span class="divider">/</span></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
   
                <div class="well">
                    <ul class="nav nav-tabs">
                      <li class="active">Profile</li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div class="tab-pane active in" id="home">
                     <?php include('conn/conn.php');?>
                     <?php $sql=mysql_query("SELECT * from ingredientpurchase where ingredientsID=$_GET[id] and purchaseID=$_GET[purchaseID]");
                           $info=mysql_fetch_array($sql);
                     ?>
                    <form id="tab" action="modify_purchaseInfo_ok.php?id=<?php echo $_GET[id];?>&purchaseID=<?php echo $_GET[purchaseID];?>" method="post">
                        <label>食材ID</label>
                        <input type="text" value="<?php echo $info['ingredientsID'];?>" name="stf" id="stf" class="input-xlarge"/>
                        <label>采购ID</label>
                        <input type="text" value="<?php echo $info['purchaseID'];?>" name="name" id="name" class="input-xlarge"/>
                        <label>数量</label>
                        <input type="text" value="<?php echo $info['number'];?>" name="wage" id="wage" class="input-xlarge">
                        <label>单价</label>
                       <input type="text" value="<?php echo $info['price'];?>" name="price" id="price" class="input-xlarge">
                        <br/>
                        <input type="submit" class="btn" value="保存修改"/>
                    </form>
                      </div>
                  </div>

				</div>
                    
                    <footer>
                        <hr>
                        
                        <p class="pull-right">Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
                        

                        <p>&copy; 2012 <a href="#" target="_blank">Portnine</a></p>
                    </footer>
                    
            </div>
        </div>
    </div>
    
  </body>
</html>


