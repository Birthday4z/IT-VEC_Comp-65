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
    <link href="../css/bootstrap.css" rel="stylesheet"> <!-- นำเข้า CSS ของ Bootstrap -->
</head>

<body>
    <!-- ส่วนของ Navbar -->
    <?php require_once "navbar.php" ?>

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

    <script src="../js/jquery-3.6.1.js"></script> <!-- นำเข้า JS ของ jQuery -->
    <script src="../js/bootstrap.bundle.js"></script> <!-- นำเข้า JS ของ Bootstrap -->
</body>

</html>