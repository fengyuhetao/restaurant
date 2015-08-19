<?php include('boot.php');?>

    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script>
	function check(){
		var form=document.getElementById('tab');
		if(form.stf.value==""||form.name.value==""||form.wage.value==""||form.price.value==""){
			alert("请将信息填满了");
			return false;
		}
		else{
			return true;
		}
	}
	</script>

    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">采购修改</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">首页</a> <span class="divider">/</span></li>
            <li><a href="#">采购添单</a> <span class="divider">/</span></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
   
                <div class="well">
                    <ul class="nav nav-tabs">
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div class="tab-pane active in" id="home">
                    <form id="tab" action="insert_purchaseInfo_ok.php" method="post">
                        <label>食材ID</label>
                        <input type="text" name="stf" id="stf" class="input-xlarge"/>
                        <label>采购ID</label>
                        <input type="text" name="name" id="name" class="input-xlarge"/>
                        <label>数量</label>
                        <input type="text" name="wage" id="wage" class="input-xlarge">
                        <label>单价</label>
                       <input type="text" name="price" id="price" class="input-xlarge">
                        <br/>
                        <input type="submit" class="btn" value="添加" onClick="return check();"/>
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


