<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<a href="logout.php">退出</a><br><br>
<h3 style="text-align:center;">任务详情</h3>
<table style="margin: 0 auto;" border="1" width="80%" cellpadding="0" cellspacing="0" backcolor="blue">
    <tr style="text-align:center;">
    <td>用户ID</td>
    <td>事件代码</td>
    <td>事件文本</td>
    <td>事件状态</td>
    <td>事件收到时间</td>
    </tr>
    <?php
        include("mysql_connect.inc.php");
        if($_SESSION['username'] != null)
        {
            $sql = "SELECT * FROM events where Eid = {$_SESSION['username']}"; 
            $result = mysql_query($sql);
            while($row = mysql_fetch_row($result))
            {
                ?>
                    <tr style="text-align:center;">
                    <td><?php echo $row[0];?></td>
                    <td><?php echo $row[1];?></td>
                    <td><?php echo $row[2];?></td>
                    <td><?php echo $row[3];?></td>
                    <td><?php echo $row[4];?></td>
                    </tr>
                <?php
            }
        }
        else
        {
            echo '您无权限观看此页面!';
            echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
        }
    ?>
</table>