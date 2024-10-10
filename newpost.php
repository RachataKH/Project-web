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
<div class="container-lg mt-3">
        <h1 style="text-align: center;">WEBTOON</h1>

        <?php
            include "nav.php";
        ?>
		<br>

        <div class="card text-dark bg-white border-info col-lg-4 mx-auto">
            <div class="card-header bg-info text-white">ตั้งกระทู้ใหม่</div>
            <div class="card-body">
                <form action="newpost_save.php" method="post">
                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">หมวดหมู่ :</label>
                        <div class="col-lg-9">
                            <select name="category" class="form-select">
                                <?php
                                    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                                    $sql = "SELECT * FROM category";
                                    foreach($conn->query($sql) as $row) {
                                        echo "<option value=".$row["id"].">".$row["name"]."</option>";
                                    }
                                    $conn=null;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">หัวข้อ :</label>
                        <div class="col-lg-9">
                            <input type="text" name="topic" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">เนื้อหา :</label>
                        <div class="col-lg-9">
                            <textarea name="comment" class="form-control" rows="8" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <center>
                                <button type="submit" class="btn btn-info btn-sm text-white">
                                    <i class="bi bi-caret-right-square me-1"></i>บันทึกข้อความ
                                </button>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>