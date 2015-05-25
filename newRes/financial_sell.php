
    <?php include('boot.php');?>
    
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
               		  <iframe src="sell_statistics.php" id="main_sell" border=0 marginwidth=0 framespacing=0 marginheight=0  frameborder=0 noresize  scrolling="no" height=0 vspale="0" style="width:100%;" ></iframe>
                 <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel">Delete Confirmation</h3>
                    </div>
                    <div class="modal-body">
                    
                         <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        <button class="btn btn-danger" data-dismiss="modal">Delete</button>
                    </div>
                 </div>


                    
                    <footer>
                        <hr>
                        

                        <p>&copy; 2012 <a href="#" target="_blank">Portnine</a></p>
                    </footer>
                    
            </div>
        </div>
    
    <script>	
	function changeSrc(src){
		var iframesrc=document.getElementById('main_sell');
		iframesrc.src=src;
	}
</script>
  </body>
</html>


