<?php
session_start()
?>
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
    <div style="text-align: center;">
    <?php
        $login = $_POST["Login"];
        $password = $_POST["Password"];
    ?>
    <?php
        if($login == "admin" && $password == "ad1234"){
        $_SESSION['username']='admin';
        $_SESSION['role']='a';
        $_SESSION['id']=session_id();
        echo "ยินดีต้อนรับคุณ ADMIN <br>";
        echo "<a href="."index.php".">กลับไปที่หน้าหลัก</a>";

        }
        elseif($login == "member" && $password == "mem1234"){
        $_SESSION['username']='member';
        $_SESSION['role']='m';
        $_SESSION['id']=session_id();
        echo "ยินดีต้อนรับคุณ MEMBER <br>";
        echo "<a href="."index.php".">กลับไปที่หน้าหลัก</a>";
        }
        else
            echo "ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง <br>";
    ?>
    </div>
</body>
</html>