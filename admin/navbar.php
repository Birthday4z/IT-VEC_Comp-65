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
                        <a class="nav-link" href="#">สร้างประเภทร้านอาหาร</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            จัดการร้านอาหาร
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">อนุญาตบัญชีร้านอาหาร</a></li>
                            <li><a class="dropdown-item" href="#">ยกเลิกบัญชีร้านอาหาร</a></li>
                            <li><a class="dropdown-item" href="#">แสดงข้อมูลร้านอาหาร</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            จัดการผู้ส่งอาหาร
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">อนุญาตบัญชีผู้ส่งอาหาร</a></li>
                            <li><a class="dropdown-item" href="#">ยกเลิกบัญชีผู้ส่งอาหาร</a></li>
                            <li><a class="dropdown-item" href="#">แสดงข้อมูลผู้ส่งอาหาร</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            จัดการสมาชิก
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">อนุญาตบัญชีสมาชิก</a></li>
                            <li><a class="dropdown-item" href="#">ยกเลิกบัญชีสมาชิก</a></li>
                            <li><a class="dropdown-item" href="#">แสดงข้อมูลสมาชิก</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- ปุ่ม Logout -->
            <form method="POST">
                <button class="btn btn-danger me-2" name="logout">LOGOUT</button>
            </form>
        </div>
    </nav>