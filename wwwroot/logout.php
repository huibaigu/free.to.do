<?php session_start(); ?>  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	unset($_SESSION['username']);
	echo '登出中......';
	echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
?>