<?php
	session_start();
	if (isset($_SESSION['id'])) {
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<title>Register</title>
</head>

<body>
	<div class="container-lg mt-3">
		
		<h1 align="center" class="mt-3">Register</h1>

		<?php
            include "nav.php";
        ?>
		<br>

		<form action="register_save.php" method="post">
			<div class="row">
				<div class="col-lg-6 mx-auto">
					<?php
						if (isset($_SESSION["add_login"])) {
							if ($_SESSION["add_login"] == "error") {
								echo "<div class='alert alert-danger'>ชื่อบัญชีซ้ำหรือฐานข้อมูลมีปัญหา</div>";
							}else{
								echo "<div class='alert alert-success'>เพิ่มบัญชีเรียบร้อยแล้ว</div>";
							}
							unset($_SESSION["add_login"]);
						}
					?>
					<div class="card">
						<div class="card-header bg-primary text-white">เข้าสู่ระบบ</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-3 col-md-3 col-lg-3 mx-auto my-auto">
									ชื่อบัญชี:
								</div>
								<div class="col-sm-9 col-md-9 col-lg-9 mx-auto my-auto">
									<input type="text" class="form-control" name="login" required>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-sm-3 col-md-3 col-lg-3 mx-auto my-auto">
									รหัสผ่าน:
								</div>
								<div class="col-sm-9 col-md-9 col-lg-9 mx-auto my-auto">
									<input type="password" class="form-control" name="pwd" required>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-sm-3 col-md-3 col-lg-3 mx-auto my-auto">
									ชื่อ-นามสกุล:
								</div>
								<div class="col-sm-9 col-md-9 col-lg-9 mx-auto my-auto">
									<input type="text" class="form-control" name="name" required>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-sm-3 col-md-3 col-lg-3 mx-auto">
									เพศ:
								</div>
								<div class="col-sm-9 col-md-9 col-lg-9 mx-auto my-auto">
									<input type="radio" class="form-check-input" name="gender" value="m" required> ชาย <br>
									<input type="radio" class="form-check-input" name="gender" value="f" required> หญิง <br>
									<input type="radio" class="form-check-input" name="gender" value="o" required> อื่นๆ
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-sm-3 col-md-3 col-lg-3 mx-auto my-auto">
									อีเมล:
								</div>
								<div class="col-sm-9 col-md-9 col-lg-9 mx-auto my-auto">
									<input type="email" class="form-control" name="email" required>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-sm-3 col-md-3 col-lg-3 mx-auto my-auto"></div>
								<div class="col-sm-9 col-md-9 col-lg-9 mx-auto my-auto">
									<button class="btn btn-primary" required><i class="bi bi-box-arrow-in-down-right"></i> สมัครสมาชิก</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</form>
		<br>
		<div align="center"><a href="index.php">กลับไปหน้าหลัก</a></div>
	</div>
</body>
</html>