<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$id=$_GET["id"];
require_once("dbtools.inc.php");
$link=create_connection();
$sql="SELECT * FROM `talk` WHERE `id`='$id'";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($result);

?>
<form action="upDate_action.php" name="myForm" method="post">
    <input type="hidden" name="id" value="<?php echo $row["id"];?>">
    <table width="800" align="center">
        <tr>
            <td colspan="2" align="center"><font>請輸入新的留言</font></td>
        </tr>
        <tr>
            <td width="15%">暱稱</td>
            <td width="85%"><input type="text" name="name" value="<?php echo $row["name"];?>" size="50"></td>
        </tr>
        <tr>
            <td width="15%">信箱</td>
            <td width="85%"><input type="text" name="gmail" value="<?php echo $row["gmail"];?>" size="50"></td>
        </tr>
        <tr>
            <td width="15%"></td>
            <td width="85%"><input type='radio' name=sex value='1' required>男
            <input type='radio' name=sex value='0'>女</td>
        </tr>

        <tr>
            <td width="15%">標題</td>
            <td width="85%"><input type="text" name="subject" value="<?php echo $row["subject"];?>" size="50"></td>
        </tr>
        <tr>
            <td width="15%">內容</td>
            <td width="85%"><textarea name="content" value="<?php echo $row["content"];?>" cols="50" rows="4"><?php echo $row["content"];?></textarea></td>
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