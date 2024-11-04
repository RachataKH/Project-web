<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Webboard</title>
</head>
<body>
    <div class="container-lg mt-3">
        <h1 style="text-align: center;" class="mt-3">WEBTOON</h1>

        <?php
            session_start();
            include "nav.php";
        ?>
        <div class="col-lg-10 mx-auto mt-4">
            <?php
				if (isset($_SESSION["edit_user"])) {
					echo "<div class='alert alert-success'>แก้ไขข้อมูลเรียบร้อยแล้ว</div>";
					unset($_SESSION["edit_user"]);
				}
			?>
            <table class="table table-striped text-center">
                <tbody>
                    <tr>
                        <th>ลำดับ</t>
                        <th>ชื่อผู้ใช้</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>เพศ</th>
                        <th>อีเมล</th>
                        <th>สิทธิ์</th>
                        <th>จัดการ</th>
                    </tr>
                    <?php
                    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                    $id = 1;
                    $sql = "SELECT * FROM user";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch()) {
                        echo "<tr><td>$id</td>";
                        echo "<td>$row[1]</td>";
                        echo "<td>$row[3]</td>";
                        echo "<td>$row[4]</td>";
                        echo "<td>$row[5]</td>";
                        echo "<td>$row[6]</td>";
                        echo "<td><button class='btn btn-warning btn-sm me-1'  data-bs-toggle='modal' data-bs-target='#showForm_user' data-id='$row[0]' data-login='$row[1]' data-name='$row[3]' data-gender='$row[4]' data-email='$row[5]' data-role='$row[6]'><i class='bi bi-pencil'></i></button>";

                        $id = $id + 1;
                    }
                    $conn = null;
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <form action="edituser.php" method="post">
            <div class="modal fade" id="showForm_user">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">แก้ไขหมวดหมู่</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>ชื่อผู้ใช้:</label>
                                <input name="user-login" type="text" class="form-control" disabled readonly>
                                <br>
                                <label>ชื่อ-นามสกุล:</label>
                                <input name="user-name" type="text" class="form-control">
                                <br>
                                <label>เพศ:</label>
                                <select name="user-gender" class="form-select" aria-label="Default select example">
                                    <option value="m">ชาย</option>
                                    <option value="f">หญิง</option>
                                    <option value="o">อื่นๆ</option>
                                </select>
                                <br>
                                <label>อีเมล:</label>
                                <input name="user-email" type="text" class="form-control">
                                <br>
                                <label>สิทธิ์:</label>
                                <select name="user-role" class="form-select" aria-label="Default select example">
                                    <option value="m">Member</option>
                                    <option value="a">Admin</option>
                                    <option value="b">Ban</option>
                                </select>
                                <br>
                                <input name="user-id" type="text" class="form-control d-none">
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

        <script>
            const showForm = document.getElementById('showForm_user');
            showForm.addEventListener('show.bs.modal', function(event){
                const button = event.relatedTarget;
                const userId = button.getAttribute('data-id');
                const userLogin = button.getAttribute('data-login');
                const userName = button.getAttribute('data-name');
                const userGender = button.getAttribute('data-gender');
                const userEmail = button.getAttribute('data-email');
                const userRole = button.getAttribute('data-role');

                const modalInput = showForm.querySelectorAll('.modal-body input');
                modalInput[0].value = userLogin;
                modalInput[1].value = userName;
                modalInput[2].value = userEmail;
                modalInput[3].value = userId;
                
                const genderSelect = showForm.querySelector('select[name="user-gender"]');
                genderSelect.value = userGender;

                const roleSelect = showForm.querySelector('select[name="user-role"]');
                roleSelect.value = userRole;
            });
        </script>
</body>
</html>