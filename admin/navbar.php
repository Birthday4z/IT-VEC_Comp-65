<?php
    if(isset($_POST['logout'])) { // กดปุ่ม Logout
        session_destroy();
        header("refresh:0;url=admin-login.php");
    }
?>

<nav class="navbar navbar-expand-lg bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin.php">ADMIN</a>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="editprofile.php">แก้ไขข้อมูลส่วนตัว</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="changepassword.php">เปลี่ยนรหัสผ่าน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add-type.php">สร้างประเภทร้านอาหาร</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="restaurant.php">จัดการบัญชีร้านอาหาร</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">จัดการบัญชีผู้ส่งอาหาร</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">จัดการบัญชีสมาชิก</a>
                    </li>
                </ul>
            </div>
            <!-- ปุ่ม Logout -->
            <form method="POST">
                <button class="btn btn-danger me-2" name="logout">LOGOUT</button>
            </form>
        </div>
    </nav>