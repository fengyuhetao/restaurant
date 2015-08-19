<?php include('boot.php');?>
    
    <div class="content">
    	<div class="header">
            
            <h1 class="page-title">人员统计</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
        		<div class="btn-toolbar">
                    <button class="btn" onClick="changeSrc('staff_info.php')">员工信息</button>
                    <button class="btn" onClick="changeSrc('staff_check.php')">员工考勤</button>
                    <button class="btn" onClick="changeSrc('staff_salary.php')">员工工资</button>
                 </div>
                 <div class="btn-group">
                 </div>
               		  <iframe src="staff_info.php" id="main_info" border=0 marginwidth=0 framespacing=0 marginheight=0  frameborder=0 noresize  scrolling="no" height=0 vspale="0" style="width:100%;" ></iframe>

                    
                    <footer>
                        <hr>
                        <p>&copy; 2015 by sunrise laboratory </p>
                </footer>
                    
            </div>
        </div>
    </div>
     <script>
	function changeSrc(src){
		var iframesrc=document.getElementsByTagName('iframe')[0];
		iframesrc.src=src;
	}
</script>



