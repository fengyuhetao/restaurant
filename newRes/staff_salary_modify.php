<?php /*?><?php session_start();?><?php */?>
	<?php include('boot.php');?>
    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">薪资修改</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="financial_staff.php">员工统计</a> <span class="divider">/</span></li>
            <li><a href="staff_salary">员工薪资</a> <span class="divider">/</span></li>
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
                     <?php $sql=mysql_query("SELECT staffID,name,wage from staff where staffID=$_GET[id]");
                           $info=mysql_fetch_array($sql);
                     ?>
                    <form id="tab" action="staff_salary_modify_ok.php?id=<?php echo $_GET[id];?>" method="post">
                        <label>员工ID</label>
                        <input type="text" value="<?php echo $info['staffID'];?>" name="stf" id="stf" class="input-xlarge"/>
                        <label>姓名</label>
                        <input type="text" value="<?php echo $info['name'];?>" name="name" id="name" class="input-xlarge"/>
                        <label>薪资</label>
                        <input type="text" value="<?php echo $info['wage'];?>" name="wage" id="wage" class="input-xlarge"><br/>
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


