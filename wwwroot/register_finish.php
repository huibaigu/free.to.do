<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	include("mysql_connect.inc.php"); 
	$id = $_POST['id'];
	$pw = $_POST['pw'];
	$pw2 = $_POST['pw2'];
	if($id != null && $pw != null && $pw2 != null && $pw == $pw2)
	{
		$sql = "insert into users (Uid, Upassword) values ($id, '$pw')";
		if(mysql_query($sql))
		{
			echo '新增成功!';
			echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
		}
		else
		{
			echo '新增失败!';
			echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
		}
	}
	else
	{
		echo '您无权限观看此页面!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
	}
?>