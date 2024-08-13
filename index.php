<?php
session_start();
if (!isset($_SESSION["id"])){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <h1 style="text-align: center;">WEBTOON</h1>
    <hr>
    <div>
        หมวดหมู่ : <select name="--ทั้งหมด--" id="">
            <option value="--ทั้งหมด--">--ทั้งหมด--</option>
            <option value="เรื่องทั่วไป">เรื่องทั่วไป</option>
            <option value="เรื่องเรียน">เรื่องเรียน</option>
        </select>

        <?php
        if(!isset($_SESSION['id'])){
        echo "<a href='login.php' style='float: right;'>เข้าสู่ระบบ</a>";
        }else{
        echo "<span style='float : right'>
        ผู้ใช้งานระบบ : $_SESSION[username]&nbsp;
        <a href='logout.php' style='float: right;'>ออกจากระบบ</a><br>
        </span>";
            echo "<div><a href='newpost.php';'>สร้างกระทู้ใหม่</a></div>";
        }
        ?>
        <ul>
            <?php
            for($i=1;$i<=10;$i=$i+1)
            {
                echo "<li><a href=post.php?id=$i>กระทู้ที่ $i</a>";
                if (isset($_SESSION['id']) && $_SESSION['role']=='a'){
                    echo "&nbsp<a href='delete.php?id=$i'>ลบ</a>";

                }
            echo "</li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>