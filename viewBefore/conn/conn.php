<?php
	$conn=mysql_connect('localhost','root','111') or die('数据库连接失败'.mysql_error());
	mysql_select_db('web',$conn);
	mysql_query("set names utf8");
?>