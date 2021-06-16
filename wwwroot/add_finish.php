<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	echo '<a href="logout.php">退出</a><br><br>';
	include("mysql_connect.inc.php"); 
	if($_SESSION['username'] != null)
    {
		set_time_limit(0);
		$address = "127.0.0.1";
		$port = 25555; 
		/**
		 * 创建一个SOCKET 
		 * AF_INET=是ipv4 如果用ipv6，则参数为 AF_INET6
		 * SOCK_STREAM为socket的tcp类型，如果是UDP则使用SOCK_DGRAM
		*/
		$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("socket_create() 失败的原因是:" . socket_strerror(socket_last_error()) . "/n");
		$ret = socket_connect($sock, $address, $port) or die("socket_connect() 失败:".socket_strerror(socket_last_error())."\n");
		$msg = "{$_SESSION['username']}|006|\n";
		socket_write($sock, $msg, strlen($msg)) or die("socket_write() failed: reason: " . socket_strerror(socket_last_error()) ."/n");
		$buf = socket_read($sock, 8192);
		if($_POST['id']=="001")
		{
			$msg = "{$_SESSION['username']}|001|@{$_POST['text1']}@|@{$_POST['text2']}@|";
			socket_write($sock, $msg, strlen($msg)) or die("socket_write() failed: reason: " . socket_strerror(socket_last_error()) ."/n");
			$buf = socket_read($sock, 8192);
			$lsd = explode('|',$buf);
			echo "返回{$lsd[1]}\n";
		}
		else if($_POST['id']=="002")
		{
			$msg = "{$_SESSION['username']}|002|@{$_POST['text1']}@|@{$_POST['text2']}@|";
			socket_write($sock, $msg, strlen($msg)) or die("socket_write() failed: reason: " . socket_strerror(socket_last_error()) ."/n");
			$buf = socket_read($sock, 8192);
			$lsd = explode('|',$buf);
			echo "返回{$lsd[1]}\n";
		}
		else if($_POST['id']=="003")
		{//下载文件
			$fileExt = pathinfo($filename);
			set_time_limit(0);
			ini_set('max_execution_time', '0');
			header('content-type:application/octet-stream');
			header('Accept-Ranges:bytes');
			$header_array = get_headers($filename, true);
			$filesize = $header_array['Content-Length'];
			header('Accept-Length:'.$filesize);
			header('content-disposition:attachment;filename='.basename($filename));
			$read_buffer = 4096;
			$handle = fopen($filename, 'rb');
			$sum_buffer = 0;
			while(！feof($handle) && $sum_buffer)
			fread($handle,$read_buffer);
			$sum_buffer += $read_buffer;
			fclose($handle);
			$sqlW = "INSERT INTO events VALUES ('{$_SESSION['username']}','003','{$_SESSION['username']}|003|@{$_POST['text1']}@',2)";  
            $resultW = mysql_query($sql);
			echo "返回\n";
		}
		else if($_POST['id']=="004")
		{
			$msg = "{$_SESSION['username']}|004|";
			socket_write($sock, $msg, strlen($msg)) or die("socket_write() failed: reason: " . socket_strerror(socket_last_error()) ."/n");
			$buf = socket_read($sock, 8192);
			$lsd = explode('|',$buf);
			echo "返回{$lsd[1]}\n";
		}
		else if($_POST['id']=="005")
		{
			$msg = "{$_SESSION['username']}|005|";
			socket_write($sock, $msg, strlen($msg)) or die("socket_write() failed: reason: " . socket_strerror(socket_last_error()) ."/n");
			$buf = socket_read($sock, 8192);
			$lsd = explode('|',$buf);
			echo "返回{$lsd[1]}\n";
		}
		else if($_POST['id']=="006")
		{
			$msg = "{$_SESSION['username']}|006|";
			socket_write($sock, $msg, strlen($msg)) or die("socket_write() failed: reason: " . socket_strerror(socket_last_error()) ."/n");
			$buf = socket_read($sock, 8192);
			$lsd = explode('|',$buf);
			echo "返回{$lsd[1]}\n";
		}
		socket_close($sock);
	}
	else
	{
		echo '您无权限观看此页面!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
	}
?>