<?php
session_start();
if (!isset($_SESSION["id"])){
    header("location:index.php");
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
    
    <?php
    echo "ผู้ใช้ : $_SESSION[username] <br>";
    ?>
    <table>
        <tr>
            <td>
                หมวดหมู่ :
            </td>
            <td>
                <select name="--ทั้งหมด--" id="">
                    <option value="--ทั้งหมด--">--ทั้งหมด--</option>
                    <option value="เรื่องทั่วไป">เรื่องทั่วไป</option>
                    <option value="เรื่องเรียน">เรื่องเรียน</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                หัวข้อ :
            </td>
            <td>
                <input type="text">
            </td>
        </tr>
        <tr>
            <td>
                เนื้อหา :
            </td>
            <td>
                <textarea></textarea>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="button" value="บันทึกข้อความ">
            </td>
        </tr>
    </table>
    <a href="index.php">กลับไปที่หน้าหลัก</a>
</body>
</html>