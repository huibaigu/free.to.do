<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php  
        include("mysql_connect.inc.php");
        $id = $_POST['id'];
        $pw = $_POST['pw'];
        $pw2 = $_POST['pw2'];
        if($_SESSION['username'] != null && $pw != null && $pw2 != null && $pw == $pw2)
        {
                $id = $_SESSION['username'];
                $sql = "update users set Upassword=$pw where Uid='$id'";
                if(mysql_query($sql))
                {
                        echo '修改成功!';
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
                }
                else
                {
                        echo '修改失败!';
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
                }
        }
        else
        {
                echo '您无权限观看此页面!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
?>