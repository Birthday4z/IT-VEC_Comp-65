<?php
    require_once "../php/dbcon.php";
    session_start();
    
    if(empty($_SESSION['id'])) { // ถ้ายังไม่เคย Login ให้กลับไปหน้า Login
        header("refresh:0;url=admin-login.php");
    }

    if(isset($_POST['logout'])) { // กดปุ่ม Logout
        session_destroy();
        header("refresh:0;url=admin-login.php");
    }

    if(isset($_POST['submit'])) { //กดปุ่ม เปลี่ยนรหัสผ่าน
        $id = $_SESSION['id'];
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];

        $sql = "UPDATE admin SET password = '$newpassword' WHERE id = $id and password = '$oldpassword'"; // เตรียมคำสั่ง SQL
        $query = mysqli_query($conDB, $sql); // สั่งให้หาข้อมูลในฐานข้อมูล ข้อมูลที่ได้จะเป็นแบบ [Array]
        
        if(mysqli_affected_rows($conDB) > 0) { // เช็คว่ารหัสผ่านเปลี่ยนสำเร็จไหม ถ้าค่าเป็น 0 = ไม่พบข้อมูลที่ตรงเงื่อนไข WHERE, -1 = เชื่อมต่อไม่ได้, >0 = สำเร็จ
            echo "<script type='text/javascript'>alert('เปลี่ยนรหัสผ่านสำเร็จ');</script>";
        }
        else echo "<script type='text/javascript'>alert('เกิดข้อผิดพลาด เปลี่ยนรหัสผ่านไม่สำเร็จ');</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผู้ดูแลระบบ - แก้ไขข้อมูลส่วนตัว</title> <!-- เปลี่ยน Title ของเว็บเพจ (ชื่อ Tab ของเว็บ) -->
    <link href="../css/bootstrap.min.css" rel="stylesheet"> <!-- นำเข้า CSS ของ Bootstrap -->
</head>

<body>
    <!-- ส่วนของ Navbar -->
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

    <div class="containter-fluid w-100">
        <div class="card">
            <div class="card-header fw-bold">
                เปลี่ยนรหัสผ่าน - Administrator
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-floating">
                        <input type="password" class="form-control" name="oldpassword" placeholder="-">
                        <label>รหัสผ่านเก่า</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="newpassword" placeholder="-">
                        <label>รหัสผ่านใหม่</label>
                    </div>
                    <div class="container-fluid d-flex justify-content-end">
                        <button type="submit" class="btn btn-success" name="submit">เปลี่ยนรหัสผ่าน</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/jquery.min.js"></script> <!-- นำเข้า JS ของ jQuery -->
    <script src="../js/bootstrap.bundle.min.js"></script> <!-- นำเข้า JS ของ Bootstrap -->
</body>

</html>