<?php
session_start();
if (isset($_SESSION["id"])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>register</title>
</head>

<body>
    <div class="container-lg">
        <h1 style="text-align: center;" class="mt-3">WEBTOON</h1>
        <?php include "nav.php" ?>
        <div class="row mt-4">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
                <div class="card border-primary">
                    <h5 class="card-header bg-primary text-white">สมัครสมาชิก</h5>
                    <div class="card-body">
                        <form action="register_save.php" method="post">
                        <div class="row">
                            <label class="col-lg-3 col-from-label" for="">ชื่อบัญชี :</label>
                            <div class="col-lg-9">
                                <input type="text" name="login" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 col-from-label" for="">รหัสผ่าน :</label>
                            <div class="col-lg-9">
                                <input type="password" name="pwd" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 col-from-label" for="">ชื่อ-นามสกุล :</label>
                            <div class="col-lg-9">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                                <label class="col-lg-3 col-from-label" for="">เพศ :</label>
                                <div class="col-lg-9">
                                <input name="gender" value="m" type="radio"> ชาย <br>
                                <input name="gender" value="f" type="radio"> หญิง <br>
                                <input name="gender" value="o" type="radio"> อื่นๆ
                                </div>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 col-from-label" for="">อีเมล :</label>
                            <div class="col-lg-9">
                                <input type="text" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                        <label class="col-lg-3 col-from-label" for=""></label>
                            <div class="col-lg-9" >
                                <input type="submit" class="btn btn-primary " value="สมัครสมาชิก">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <table style="border: 2px solid black; width: 40%;" align="center">
        <tr><td colspan="2" align="center" style="background-color: #6cd2fe;">กรอกข้อมูลสมาชิก</td></tr>
        <tr><td>ชื่อบัญชี :</td><td><input type="text" name="Login"></td></tr>
        <tr><td>รหัสผ่าน :</td><td><input type="password" name="Password"></td></tr>
        <tr><td>ชื่อ-นามสกุล :</td><td><input type="text" name="name"></td></tr>
        <tr><td>เพศ :</td><td>
            <input type="radio" name="gender" value="m">ชาย<br>
            <input type="radio" name="gender" value="f">หญิง<br>
            <input type="radio" name="gender" value="n">ไม่ระบุ
        </td></tr>
        <tr><td>อีเมล :</td><td><input type="text" name="Password"></td></tr>
        <tr><td colspan="2" align="center"><input type="submit" value= "สมัครสมาชิก"></td></tr>
    </table>
    <br>
    <div style="text-align: center;">
        <a href="index.html">กลับไปที่หน้าหลัก</a>
    </div> -->
</body>

</html>