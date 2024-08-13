<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style="text-align: center;">WEBTOON</h1>
    <hr>
    <p style="text-align: center;">ต้องการดูกระทู้หมายเลข
    <?php $id = $_GET["id"];
        echo $id."<BR>";
        if(($id %2)==0)
            echo "เป็นกระทู้หมายเลขคู่";
        else
            echo "เป็นกระทู้หมายเลขคี่";      
    ?>
    </p> 
    <table style="border: 2px solid black; width: 40%;" align="center">
        <tr><td align="center" style="background-color: #6cd2fe;">แสดงความคิดเห็น</td></tr>
        <tr><td align="center"><textarea name="" id=""></textarea></td></tr>
        <tr><td align="center"><input type="submit" value= "ส่งข้อความ"></td></tr>
    </table>
    <br>
    <div style="text-align: center;">
        <a href="index.php">กลับไปที่หน้าหลัก</a>
    </div>  
</body>
</html>