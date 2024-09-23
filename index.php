<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function Delete(id){
            if(confirm("確認是否刪除該資料")){
                window.location.href="delete.php?id="+id;
            }
        }
        function upDate(id){
            window.location.href="upDate.php?id="+id;
        }
        
    </script>
    <style>
        .message-box{
            padding: 20px;
            position: relative;
        }
        .del-btn{
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .update-btn{
            position: absolute;
            top: 50px;
            right: 10px;
        }
    </style>
</head>
<body>
    <?php
    require_once("dbtools.inc.php");
    $link=create_connection();
    $sql="SELECT * FROM `talk` ORDER BY `id` DESC";
    $result=execute_sql($link,"iamgood",$sql);

    echo "<table width='800' align='center' border='1'>";
    $j=1;
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr><td><div class='message-box'>";
        echo "作者".$row["name"]."&nbsp&nbsp&nbsp   id:".$row["id"]."<br>";
        echo "gmail".$row["gmail"]."<br>";
        if($row["sex"]==1){
            echo "男<br>";
        }else{
            echo "女<br>";
        }
        echo "標題".$row["subject"]."<br>";
        echo "<button class='del-btn' onclick='Delete(".$row["id"].")'>x</button>";
        echo "<button class='update-btn' onclick='upDate(".$row["id"].")'>修改</button>";
        echo "內容<br><textarea readonly cols='33' rows='5' name='".$row["content"]."'>".$row["content"]."</textarea></tr></td></div>";
        $j++;
    }
    echo "</table>";
    ?>

    
    <form action="post.php" name="myForm" method="post">
        <table width="800" align="center">
            <tr>
                <td colspan="2" align="center"><p>請輸入新的留言</p></td>
            </tr>
            <tr>
                <td width="15%">作者:</td>
                <td width="85%"><input type="text" name="name" size="50"></td>
            </tr>
            <tr>
                <td width="15%">gmail:</td>
                <td width="85%"><input type="text" name="gmail" size="50"></td>
            </tr>
            <tr>
                
                    <td width="15%">性別:</td>
                    <td width="85%"><input type="radio" name="sex" value="1">   男
                    <input type="radio" name="sex" value="0">   女</td><br>
                
            </tr>
            <tr>
                <td width="15%">標題:</td>
                <td width="85%"><input type="text" name="subject" size="50"></td>
            </tr>
            <tr>
                <td width="15%">內容:</td>
                <td width="85%"><textarea name="content" cols="50" rows="5" ></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="送出">
                    <input type="reset" value="重製">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>