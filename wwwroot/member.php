<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
        include("mysql_connect.inc.php");
        echo '<a href="logout.php">退出</a><br><br>';
        if($_SESSION['username'] != null)
        {
                echo '<a href="serve.php">查看服务器信息</a>    ';
                echo '<a href="add.php">增加下载任务</a>    ';
                echo '<a href="get.php">获取下载文件</a>    ';
                echo '<a href="update.php">修改账户信息</a><br><br>';
                $sql = "SELECT * FROM users where Uid = {$_SESSION['username']}";  
                $result = mysql_query($sql);
                $sqlW = "SELECT * FROM events where Eid = {$_SESSION['username']}";  
                $resultW = mysql_query($sql);
                $ld=-1;
                while($row = mysql_fetch_row($result))
                {
                        while($kw = mysql_fetch_row($resultW))
                        {
                                if($kw[3] != 2)
                                {
                                        $ld = $ld + 1;
                                }
                        }
                        echo "账号：$row[0] - 最后登录IP：$row[2] - 最后登录时间：$row[3]<br><br>";
                        echo '<a href=get.php>正在执行的任务数量：';
                        echo "{$ld}</a>";
                }
        }
        else
        {
                echo '您无权限观看此页面!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
?>