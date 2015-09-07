<?php
include_once('conn/conn.php');
$selectDealTFNum=mysql_query("select count(*) as count from bill where dealTF  is null; ",$conn);
$arrayDealTFNum=mysql_fetch_array($selectDealTFNum);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>后台管理系统</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>
    <!-- Demo page code -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->
    
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                    <li><a href="bill.php" title="您有账单待处理！" role="button"><i class="icon-envelope"></i>信息</span><span id ="remindNum"class="label label-warning"><?php echo $arrayDealTFNum['count'];?></span></a></i>

          
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i>
                            <i id="iuser">test</i> 
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="user.php"><i class="icon-pencil"></i>我的账户</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" class="visible-phone" href="#">Settings</a></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="logout.php"><i class="icon-off"></i>退出</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="main.php"><span class="first">餐厅营业</span> <span class="second">管理系统</span></a>
        </div>
    </div>
    


    <div class="copyrights">Collect from <a href="http://www.cssmoban.com/"  title="网站模板">网站模板</a></div>
    <div class="sidebar-nav">
        <form class="search form-inline">
            <!--<input type="text" placeholder="Search...">-->
        </form>


        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>主菜单<i class="icon-chevron-up"></i></a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
            <li><a href="seat.php">座位情况</a></li>
            <li><a href="menu.php">今日菜单</a></li>
            <li><a href="bill.php">当前账单</a></li>
            
            <!--<li ><a href="users.html">今日菜单</a></li>
            <li ><a href="user.html">今日账单</a></li>
            <li ><a href="media.html">Media</a></li>
            <li ><a href="calendar.html">Calendar</a></li>-->
            
        </ul>

        <a href="#dashboard-pur" class="nav-header collapsed" data-toggle="collapse"><i class="icon-exclamation-sign"></i>采购管理<i class="icon-chevron-up"></i></a>
        <ul id="dashboard-pur" class="nav nav-list collapse">
            <li ><a href="purchase_manage.php">库存信息</a></li>
            <li ><a href="insert_purchase.php">采购管理</a></li>
            <li ><a href="ingredientsinfo.php">食材管理</a></li>
            <li ><a href="foodinfo.php">菜品管理</a></li>
  <!--         <li ><a href="404.html">404 page</a></li>
            <li ><a href="500.html">500 page</a></li>
            <li ><a href="503.html">503 page</a></li>       -->
         </ul>

        <a href="#accounts-bill" class="nav-header collapsed" data-toggle="collapse"><i class="icon-dashboard"></i>财务管理<i class="icon-chevron-up"></i></a>
        <ul id="accounts-bill" class="nav nav-list collapse">
            <li ><a href="financial_sell.php">销售统计</a></li>
            <li ><a href="financial_staff.php">人员统计</a></li>
            <li ><a href="financial_repair.php">维修记录</a></li>
            <li ><a href="financial_purchase.php">采购记录</a></li>
        </ul>

        <a href="#dashboard-man" class="nav-header collapsed" data-toggle="collapse"><i class="icon-dashboard"></i>人事管理<i class="icon-chevron-up"></i></a>
        <ul id="dashboard-man" class="nav nav-list collapse">
             <!--
            <li><a href="index.html">Home</a></li>
            <li class="active"><a href="users.html">Sample List</a></li>
            <li ><a href="user.html">Sample Item</a></li>
            <li ><a href="media.html">Media</a></li>
            <li ><a href="calendar.html">Calendar</a></li>
            -->
            <li><a href="staffinfo.php">员工信息管理</a></li> 
        </ul>

        

        <a href="#legal-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-legal"></i>后勤管理<i class="icon-chevron-up"></i></a>
        <ul id="legal-menu" class="nav nav-list collapse">
            <li ><a href="repairinfo.php">维修记录</a></li>
            <li ><a href="repertoryinfo.php">仓库管理</a></li>
            <li ><a href="menuinfo.php">菜单管理</a></li>
            <li ><a href="seatinfo.php">座位管理</a></li>
            <!--<li ><a href="terms-and-conditions.html">Terms and Conditions</a></li>-->
        </ul>

        <a href="#" class="nav-header" ><i class="icon-question-sign"></i>Help</a>
        <a href="#" class="nav-header" ><i class="icon-comment"></i>Faq</a>
    </div>
    


    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function() { return false; });
        });
    </script>

    <script>
    var xmlHttp;
    function createXMLHttpRequest(){
        if (window.ActiveXObject)
        {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        else if (window.XMLHttpRequest)
        {
            xmlHttp = new XMLHttpRequest();
        }
    }
    function doStart ()
    {
        createXMLHttpRequest();
        var url = "refreshBill.php";
        xmlHttp.open("GET",url,true);
        xmlHttp.onreadystatechange = callback;
        xmlHttp.send(null);
    }
    function callback()
    {
        if (xmlHttp.readyState == 4)
        {
            if (xmlHttp.status == 200)
            {
                var message = xmlHttp.responseXML.getElementsByTagName("message")[0].firstChild.data;
                if ( message == "yes")
                {
                    //提示用户有新的订单
                    alert("您有新的订单，请及时查看！");
                    location.reload();
                }
                setTimeout("pollServer()",3000);//3s后再次请求后台
            }
        }
    }
    function pollServer() {
        createXMLHttpRequest();
        var url = "refreshBill.php";
        xmlHttp.open("GET",url,true);
        xmlHttp.onreadystatechange = callback;
        xmlHttp.send(null);
    }

    </script>
<script type="text/javascript">
    var muser = document.getElementById('iuser');
    muser.innerHTML = "<?php echo $_SESSION['MM_Username'];?>";
</script>
    <?php echo "<script type='text/javascript'>doStart();</script>"; ?>