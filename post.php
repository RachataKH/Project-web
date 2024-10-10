<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $id = $_GET['id'];
    ?>
    <h1 style="text-align: center;">WEBTOON</h1>
    <hr>
    <div>ต้องการดูกระทู้หมายเลข<?php echo $id?></div>
    <?php
        if(($id % 2) == 0){
            echo "<center>เป็นกระทู้หมายเลขคู่</center><br>";
        }
        else{
            echo "<center>เป็นกระทู้หมายเลขคี่</center><br>";
        }
    ?>
    <table style="border: 2px solid black; width: 40%;" align="center">
        <tr><td colspan="2" style="background-color: #6cd2fe;">แสดงความคิดเห็น</td></tr>
        <tr><td align="center"><textarea cols="30" rows="10"></textarea></td></tr>
        <tr><td colspan="2" align="center"><input type="submit" value="ส่งข้อความ"></td></tr>
    </table>
    <div><a href="index.php">กลับไปหน้าหลัก</a></div>  
</body>
</html>