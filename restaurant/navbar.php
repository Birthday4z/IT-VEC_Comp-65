<?php
    if(isset($_POST['logout'])) { // กดปุ่ม Logout
        session_destroy();
        header("refresh:0;url=restaurant-login.php");
    }
?>

<nav class="navbar navbar-expand-lg bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="restaurant.php">RESTAURANT</a>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="editprofile.php">แก้ไขข้อมูลส่วนตัว</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="editimg.php">เปลี่ยนรูปภาพประจำตัว</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="changepassword.php">เปลี่ยนรหัสผ่าน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add-type.php">สร้างประเภทอาหาร</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add-food.php">เพิ่มรายการอาหาร</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listfood.php">จัดการรายการอาหาร</a>
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