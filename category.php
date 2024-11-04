<?php
session_start();
if (!isset($_SESSION["id"]) || ($_SESSION["role"] != "a")) {
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
    <script>
        function Cat_delete(a){
            if (confirm("ต้องการจะลบจริงหรือไม่")) {
                location.href = `deletecategory.php?id=${a}`;
            }
        }


    </script>
    
</head>

<body>
    <div class="container-lg mt-3">
        <h1 style="text-align: center;" class="mt-3">WEBTOON</h1>
        <?php
            include "nav.php";
        ?>
        <div class="col-lg-6 mx-auto mt-4">
            <?php
                if (isset($_SESSION["add_category"])) {
                    echo "<div class='alert alert-success col-lg-6 mx-auto mt-4'>เพิ่มหมวดหมู่เรียบร้อยแล้ว</div>";
                    unset($_SESSION["add_category"]);
                }

                if (isset($_SESSION["delet_category"])) {
                    echo "<div class='alert alert-success'>ลบหมวดหมู่เรียบร้อยแล้ว</div>";
                    unset($_SESSION["delet_category"]);
                }
                if (isset($_SESSION["edit_category"])) {
                    echo "<div class='alert alert-success'>แก้ไขหมวดหมู่เรียบร้อยแล้ว</div>";
                    unset($_SESSION["edit_category"]);
                }
            ?>
            <table class="table table-striped text-center">
                <tbody>
                    <tr>
                        <th>ลำดับ</t>
                        <th class="w-75">ชื่อหมวดหมู่</th>
                        <th>จัดการ</th>
                    </tr>
                    <?php
                    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                    $id = 1;
                    $sql = "SELECT * FROM category";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch()) {
                        echo "<tr><td>$id</td>";
                        echo "<td class='w-75'>$row[1]</td>";
                        echo "<td><button class='btn btn-warning btn-sm me-1'  data-bs-toggle='modal' data-bs-target='#showForm_edit' data-id='$row[0]' data-name='$row[1]'><i class='bi bi-pencil'></i></button>
                            <button onclick='Cat_delete($row[0])' class='btn btn-danger btn-sm'><i class='bi bi-trash'></i></button></td></tr>";
                        $id = $id + 1;
                    }
                    $conn = null;
                    ?>
                </tbody>
            </table>
        </div>
        <div class="text-center">
            <button class="btn btn-success" data-bs-target="#showForm_add" data-bs-toggle="modal"><i class="bi bi-bookmark-plus"></i> เพิ่มหมวดหมู่ใหม่</button>
        </div>

        <form action="category_save.php" method="post">
            <div class="modal fade" id="showForm_add">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">เพิ่มหมวดหมู่ใหม่</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>ชื่อหมวดหมู่:</label>
                                <input type="text" class="form-control" name="cat">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form action="editcategory.php" method="post">
            <div class="modal fade" id="showForm_edit">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">แก้ไขหมวดหมู่</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>ชื่อหมวดหมู่:</label>
                                <input name="name-category" type="text" class="form-control">
                                <input name="id-category" type="text" class="form-control d-none">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                            <button onclick="editcategory.php"  type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        const showForm = document.getElementById('showForm_edit');
            showForm.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const categoryId = button.getAttribute('data-id');
                const categoryName = button.getAttribute('data-name');

                const modalInput = showForm.querySelectorAll('.modal-body input');
                modalInput[0].value = categoryName;
                modalInput[1].value = categoryId;
            });
    </script>
</body>

</html>