<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
    include("mysql_connect.inc.php");
    echo '<a href="logout.php">退出</a><br><br>';
    echo "目前还没做好哦(⊙o⊙)";
    if($_SESSION['username'] != null)
    {
        ?>
        <form name="form" method="post" action="add_finish.php">
        <ul id="haha">
            <ba>任务类型：<input type="text" name="id" /></ba><br>
        </ul>
        <input type="button" value="添加参数" onclick="add();"/>
        <input type="submit" name="button" value="确定"/>
        <?php
    }
    else
    {
            echo '您无权限观看此页面!';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
    }
?>
<script type="text/javascript">
    function add()
    {
        var node=document.getElementById("haha");
        var liElement = document.createElement('ba');  
        var inputElement=document.createElement('input');
        var brElement=document.createElement('br');
        inputElement.type = "text";
        inputElement.name = 'text'+document.getElementById("haha").getElementsByTagName('ba').length; 
        var txt =document.createTextNode("参数"+document.getElementById("haha").getElementsByTagName('ba').length);
        liElement.appendChild(txt); 
        liElement.appendChild(inputElement);  
        liElement.appendChild(brElement);  
        node.appendChild(liElement); 
    }
</script>