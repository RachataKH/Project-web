<?php
    session_start();
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    $sql = "SELECT user_id FROM post WHERE id=$_GET[id]";
    $result = $conn->query($sql);
    $row = $result->fetch();
    if ($row[0] != $_SESSION['user_id']) {
        header("location:index.php?id=0");
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
    <title>Document</title>
</head>

<body>
    <div class="container-lg mt-3">
        <h1 style="text-align: center;" class="mt-3">WEBTOON</h1>

        <?php
            include "nav.php";

            $sql = "SELECT * FROM post WHERE id=$_GET[id]";
            $row = $conn->query($sql);
            $data = $row->fetch();
        ?>
        <?php
            if (isset($_SESSION["edit_status"])) {
                echo "<div class='alert alert-success col-lg-4 mx-auto mt-4'>แก้ไขข้อมูลเรียบร้อยแล้ว</div>";
                unset($_SESSION["edit_status"]);
        }
        ?>
        <div class="card text-dark bg-white border-warning col-lg-4 mx-auto mt-4">
            <div class="card-header bg-warning text-white">แก้ไขกระทู้</div>
            <div class="card-body">
                <form action="editpost_save.php?id=<?php echo $_GET['id'] ?>" method="post">
                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">หมวดหมู่ :</label>
                        <div class="col-lg-9">
                            <select name="category" class="form-select">
                                <?php
                                    $sql = "SELECT * FROM category";
                                    $sql1 = "SELECT id,cat_id FROM post WHERE id=$_GET[id]";
                                    $result1 = $conn->query($sql1);
                                    $data1 = $result1->fetch();

                                    foreach ($conn->query($sql) as $row) {
                                        if ($data1["id"] == $_GET["id"] && $data1["cat_id"] == $row["id"]) {
                                            echo "<option value=" . $row["id"] . " selected>" . $row["name"] . "</option>";
                                        } else {
                                            echo "<option value=" . $row["id"] . ">" . $row["name"] . "</option>";
                                        }
                                    }

                                    $conn = null;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">หัวข้อ :</label>
                        <div class="col-lg-9">
                            <input type="text" name="topic" class="form-control" value="<?php echo $data['title'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">เนื้อหา :</label>
                        <div class="col-lg-9">
                            <textarea name="comment" class="form-control" rows="8" required><?php echo $data['content'] ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <center>
                                <button type="submit" class="btn btn-warning btn-sm text-white">
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