<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
		echo '<a href="logout.php">退出</a><br><br>';
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
				$msg = "{$_SESSION['username']}|006|\0";
				socket_write($sock, $msg, strlen($msg)) or die("socket_write() failed: reason: " . socket_strerror(socket_last_error()) ."/n");
				$buf = socket_read($sock, 8192);
				$msg = "{$_SESSION['username']}|004|\0";
				socket_write($sock, $msg, strlen($msg)) or die("socket_write() failed: reason: " . socket_strerror(socket_last_error()) ."/n");
				$buf = socket_read($sock, 8192);
				$lsd = explode('|',$buf);
				echo "CPU used: {$lsd[1]}   \n";
				$msg = "{$_SESSION['username']}|005|\0";
				socket_write($sock, $msg, strlen($msg)) or die("socket_write() failed: reason: " . socket_strerror(socket_last_error()) ."/n");
				//socket_read函数会一直读取客户端数据,直到遇见\n,\t或者\0字符.PHP脚本把这写字符看做是输入的结束符.
				$buf = socket_read($sock, 8192);
				$lsd = explode('|',$buf);
				echo "RAM used: {$lsd[1]}   \n";
				socket_close($sock);
		}
		else
		{
				echo '您无权限观看此页面!';
				echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
		}
?>