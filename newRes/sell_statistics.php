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
<script>
function changeSrc(src) {
	var iframeSrc=document.getElementsByTagName('iframe')[0];
	iframeSrc.src=src;
}

function iframeResizeHeight(frame_name,body_name,offset) {
	parent.document.getElementById(frame_name).height=document.getElementById(body_name).offsetHeight;
}

function Resize(oframe,obody){
 	if(parent.document.getElementById(oframe)){
  		return iframeResizeHeight(oframe,obody,0);
 }
}
</script>
</head>

<body onLoad="Resize('main_sell','sellstatistics');">
<div class="well" id="sellstatistics">
<input type="radio" name="Time" onChange="changeSrc('sell_day.php')" />过去一天中&nbsp;
<input type="radio" name="Time" checked onChange="changeSrc('sell_month.php')"/>过去一月内&nbsp;
<input type="radio" name="Time" onChange="changeSrc('sell_jidu.php')"/>过去一个季度中&nbsp;   
<input type="radio" name="Time" onChange="changeSrc('sell_year.php')"/>过去一年内&nbsp;
<hr>
<iframe src="sell_day.php" id="main_sell_day" border=0 marginwidth=0 framespacing=0 marginheight=0  frameborder=0 noresize  scrolling="no" height=0 vspale="0" style="width:100%;" ></iframe>
</div>
</body>

