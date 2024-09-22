<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function Delete(id){
            if(confirm("確認是否刪除")){
                window.location.href="delete.php?id="+id;
            }
        }
        function upDate(id) {
            window.location.href="upDate.php?id="+id;
        }
    </script>
</head>
<body>
<?php
require_once("dbtools.inc.php");

$link=create_connection();
$sql="SELECT * FROM `talk` ORDER BY `name` DESC";
$result=execute_sql($link,"iamgood",$sql);

echo "<table width='800' align='center' border='1'>";
$j=1;
while($row=mysqli_fetch_assoc($result)){
    echo "<tr><td><div class='message-box'>";
    echo "暱稱".$row["name"]."&nbsp&nbsp&nbsp   id".$row["id"]."<br>";
    echo "信箱".$row["gmail"]."<br>";
    if($row["sex"]==1){
        echo "男<br>";
    }else{
        echo "女<br>";
    }
    echo "留言主旨:".$row["subject"]."<br>";
    echo "<button class='delete-btn' onclick='Delete(" .($row["id"]). ")'>x</button>";
    echo "<button class='delete-btn' onclick='upDate(".$row["id"].")'>修改</button>";
    echo "留言內容<br><textarea rows='5' cols='33' readonly>".$row["content"]."</textarea></div><td><tr>";
    $j++;
}
echo "</table>";
?>
<form action="post.php" name="myForm" method="post">
    <table width="800" align="center">
        <tr>
            <td colspan="2" align="center"><font>請輸入新的留言</font></td>
        </tr>
        <tr>
            <td width="15%">暱稱</td>
            <td width="85%"><input type="text" name="name" size="50"></td>
        </tr>
        <tr>
            <td width="15%">信箱</td>
            <td width="85%"><input type="text" name="gmail" size="50"></td>
        </tr>
        <tr>
            <td width="15%"></td>
            <td width="85%"><input type='radio' name=sex value='1'>男
            <input type='radio' name=sex value='0'>女</td>
        </tr>

        <tr>
            <td width="15%">標題</td>
            <td width="85%"><input type="text" name="subject" size="50"></td>
        </tr>
        <tr>
            <td width="15%">內容</td>
            <td width="85%"><textarea name="content" cols="50" rows="4"></textarea></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="送出">
            </td>
        </tr>
    </table>
</form>



</body>
</html>