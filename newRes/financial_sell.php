<?php include('boot.php');?>
<script>    
    function changeSrc(src){
        var iframesrc=document.getElementById('main_sell');
        iframesrc.src=src;
    }
</script>
    <div class="content">
    	<div class="header">
            
            <h1 class="page-title">销售统计</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
        		<div class="btn-toolbar">
                    <button class="btn" onClick="changeSrc('sell_statistics.php')">销售统计</button>
                    <button class="btn" onClick="changeSrc('sell_menu_statistics.php')">菜单统计</button>
                    <button class="btn" onClick="changeSrc('sell_picture.php')">走势图</button>
                </div>
                <div class="btn-group">
                </div>
            	<iframe src="sell_statistics.php" id="main_sell" border=0 marginwidth=0 framespacing=0 marginheight=0  frameborder=0 noresize  scrolling="no" height=0 vspale="0" style="width:100%;" ></iframe>    
                <footer>
                        <hr>
                        <p>&copy; 2015 by sunrise laboratory </p>
                </footer>
                    
            </div>
        </div>
    </div>
    


