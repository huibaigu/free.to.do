<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
    include("mysql_connect.inc.php");
    if($_SESSION['username'] != null)
    {
        $id = $_SESSION['username'];
        $sql = "SELECT * FROM users where Uid='$id'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);  
        echo "<form name=\"form\" method=\"post\" action=\"update_finish.php\">";
        echo "账号：<input type=\"text\" name=\"id\" value=\"$row[1]\" />(此项目无法修改) <br>";
        echo "密码：<input type=\"password\" name=\"pw\" value=\"$row[2]\" /> <br>";
        echo "再一次输入密码：<input type=\"password\" name=\"pw2\" value=\"$row[2]\" /> <br>";
        echo "<input type=\"submit\" name=\"button\" value=\"确定\" />";
        echo "</form>";  
    }
    else
    {
        echo '您无权限观看此页面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
    }
?>