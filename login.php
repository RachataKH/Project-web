<?php
session_start();
if (isset($_SESSION['id'])) {
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
    <title>Login</title>
</head>

<body>
    <div class="container-lg" ;>
        <h1 style="text-align: center;">WEBTOON</h1>

        <?php
        include "nav.php";
        ?>

        <br>

        <form action="verify.php" method="post">
            <div class="row">
                <div class="col-sm-8 col-md-6 col-lg-4 mx-auto">
                    <?php
                    if (isset($_SESSION['error'])) {
                            echo "
                                <div class='alert alert-danger'>
                                ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง
                                </div>";
                            unset($_SESSION['error']);
                    }
                    ?>
                    <div class="card">
                        <div class="card-header">เข้าสู่ระบบ</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="login" class="form-label">Login :</label>
                                <input id="login" type="text" placeholder="ชื่อผู้ใช้" class="form-control" name="login">
                            </div>
                            <div class="mb-3">
                                <label for="pwd" class="form-label">Password :</label>
                                <input id="pwd" type="password" placeholder="รหัสผ่าน" class="form-control" name="pwd">
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Login" class="btn btn-success">
                                <a href="login.php" class="btn btn-danger">Reset</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

        <br>

        <div style="text-align: center;">
            ถ้ายังไม่ได้เป็นสมาชิก <a href="register.php">กรุณาสมัครสมาชิก</a>
        </div>
    </div>
</body>

</html>