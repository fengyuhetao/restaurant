<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}
else
{
	if(!isset($_SESSION['MM_Username']))
  	{
	  header("Location: main.php");
	  exit;}
}

require_once('conn/conn.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>登录界面</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script  src="js/signin.js" type="text/javascript"></script>

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

  <body > 
  <!--<![endif]-->
    
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                </ul>
                 <a class="brand" href="main.php"><span class="first">餐厅营业</span> <span class="second">管理系统</span></a>
        </div>
    </div>
   
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">登录</p>
            <div class="block-body">
                <form  id="form1" name="form1"  method="post" action="index.php">
                    <label>用户名</label>
                    <input type="text" class="span12" name="uname" id="uname"  placeholder="用户登录ID" />
                    <label>密码</label>
                    <input type="password" class="span12" name="upass" id="upass" placeholder="*********"/>
                    <input type="submit" class="btn btn-primary pull-right" value="登录" id="onload"  />
              			<div class="clearfix"></div>
                </form>
            </div>
        </div>
       <!-- <p class="pull-right" style=""><a href="#" target="blank">Theme by Portnine</a></p>-->
       <!-- <p><a href="reset-password.html">忘记密码？</a></p>-->
    </div>
</div>


<script src="lib/bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
		$(".alert").alert('close');
    </script>

  </body>
</html>


