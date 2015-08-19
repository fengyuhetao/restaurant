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
<?php include("conn/conn.php"); ?>
<?php 
	$arr=array();
	$i=1;
	while($i<31)
	{
		$sql=mysql_query("select sum(allPrice) as sumprice from bill WHERE DATE=DATE_SUB(CURDATE( ), INTERVAL $i DAY)");
		$info=mysql_fetch_array($sql);
		array_push($arr,intval($info['sumprice']));
		$i++;
	}
	$data=json_encode($arr);
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    
<link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
<link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

<script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="js/jquery.min.js"></script>
<script src="js/highcharts.js"></script>
<script src="js/gray.js"></script>
<script>
function iframeResizeHeight(frame_name,body_name,offset) {
	parent.document.getElementById(frame_name).height=document.getElementById(body_name).offsetHeight;
}

function Resize(oframe,obody){
 	if(parent.document.getElementById(oframe)){
  		return iframeResizeHeight(oframe,obody,0);
 }
}
</script>
<title>无标题文档</title>

</head>

<body onLoad="Resize('main_sell','chart_pie');">
<script>
$(function () {
 	    $('#chart_pie').highcharts({
        title: {
            text: '月销售额',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            categories: ['1', '2', '3', '4', '5', '6','7', '8', '9', '10', '11', '12','13', '14', '15', '16', '17', '18','19', '20', '21', '22', '23', '24','25', '26', '27', '28', '29', '30']
        },
        yAxis: {
            title: {
                text: '总销售额'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '元'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: '月销售额',
            data: <?php echo $data; ?>
        }]
    });
});
</script>
<div id="chart_pie" style="width:100%; height:100%;"></div>
</body>
</html>