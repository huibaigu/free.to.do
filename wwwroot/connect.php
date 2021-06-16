<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	include("mysql_connect.inc.php");
	$id = $_POST['id'];  $pw = $_POST['pw'];
	$sql = "SELECT * FROM users where Uid = '$id'";
	$result = mysql_query($sql);
	$row = @mysql_fetch_row($result);
	if($id != null && $pw != null && $row[0] == $id && $row[1] == $pw)
	{
		$_SESSION['username'] = $id;
		$_SESSION['pw'] = $pw;
		print '登入成功!';
		$Tim=date('Y-m-d h:i:s', time());
		if(getenv('HTTP_CLIENT_IP')) {
		$ip = getenv('HTTP_CLIENT_IP');
		} elseif(getenv('HTTP_X_FORWARDED_FOR')) {
		$ip = getenv('HTTP_X_FORWARDED_FOR');
		} elseif(getenv('REMOTE_ADDR')) {
		$ip = getenv('REMOTE_ADDR');
		} else {
		$ip = $HTTP_SERVER_VARS['REMOTE_ADDR'];
		}
		$sql = "update users set Utime='$Tim',Uip='$ip' where Uid='$id'";
        mysql_query($sql);
		print '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
	}
	else
	{
		print '登入失败!';
		print '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
	}
?>