<nav class="navbar navbar-expand-lg" style="background-color:  #d3d3d3;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php?id=0"><i class="bi bi-house-door-fill"></i> Home</a>
        <ul class="navbar-nav mb-2 mb-lg-0">
            <?php
            if (!isset($_SESSION['id'])) {
                echo "<li class='nav-item'><a class='nav-link' href='login.php'><i class='bi bi-pencil-square'></i>เข้าสู่ระบบ</a></li>";
            }else{
                $user = $_SESSION['username'];
                echo "<li class='nav-item dropdown'>
                                <a class='btn btn-outline-secondary dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                    <i class='bi bi-person'></i>".$user."
                                </a>
                                <ul class='dropdown-menu'>";
                if($_SESSION['role'] == 'a'){
                    echo "<li><a class='dropdown-item' href='category.php'><i class='bi bi-card-text'></i> จัดการหมวดหมู่</a></li>";
                    echo "<li><a class='dropdown-item' href='user.php'><i class='bi bi-person-check'></i> จัดการผู้ใช้งาน</a></li>";
                }
                echo "<li><a class='dropdown-item' href='logout.php'><i class='bi bi-box-arrow-right'></i> ออกจากระบบ</a></li>
                        </ul>
                    </li>";
            
            }
            ?>
        </ul>
    </div>
</nav>