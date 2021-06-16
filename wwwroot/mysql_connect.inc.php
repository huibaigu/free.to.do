<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	$db_server = "localhost:3306"; 
	$db_name = "giegie"; 
	$db_user = "root";
	$db_passwd = "root"; 
	if(!@mysql_connect($db_server, $db_user, $db_passwd))
	die("无法对数据库连线"); 
	//mysql_query("SET NAMES utf8"); 
	if(!@mysql_select_db($db_name))
	die("无法使用数据库");
?>