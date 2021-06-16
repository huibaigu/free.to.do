<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	include("mysql_connect.inc.php");
	$id = $_POST['id'];
	if($_SESSION['username'] != null)
	{
    	$sql = "delete from users where Uid=$id";
	    if(mysql_query($sql))
	    {
	    	echo '删除成功!';
	    	echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
	    }
	    else
	    {
	    	echo '删除失败!';
	    	echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
	    }
	}
	else
	{
		echo '您无权限观看此页面!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
	}
?>