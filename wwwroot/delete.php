<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	if($_SESSION['username'] != null)
	{
		echo "<form name=\"form\" method=\"post\" action=\"delete_finish.php\">";
		echo "要删除的账号：<input type=\"text\" name=\"id\" /> <br>";
		echo "<input type=\"submit\" name=\"button\" value=\"删除\" />";
		echo "</form>";
	}
	else
	{
		echo '您无权限观看此页面!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
	}
?>