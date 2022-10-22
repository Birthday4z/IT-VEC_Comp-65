<?php
    session_start();
    $conDB = mysqli_connect("localhost", "root", "", "it-comp-65"); // เชื่อมต่อฐานข้อมูล
    // if($conDB) {
    //     echo "เชื่อมต่อฐานข้อมูลสำเร็จ!";
    // }
    // else echo "เกิดข้อผิดพลาด".mysqli_connect_error();
    
    
    if(empty($_SESSION['id'])) { // ถ้ายังไม่เคย Login ให้กลับไปหน้า Login
        header("refresh:0;url=admin-login.php");
    }

    if(isset($_POST['logout'])) { // กดปุ่ม Logout
        session_destroy();
        header("refresh:0;url=admin-login.php");
    }

    if(isset($_POST['submit'])) { //กดปุ่ม แก้ไข
        $id = $_SESSION['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        $sql = "UPDATE admin SET firstname = '$firstname', lastname = '$lastname', address = '$address', phone = '$phone' WHERE id = $id"; // เตรียมคำสั่ง SQL
        $query = mysqli_query($conDB, $sql); // สั่งให้หาข้อมูลในฐานข้อมูล ข้อมูลที่ได้จะเป็นแบบ [Array]
        if($query) {
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['address'] = $address;
            $_SESSION['phone'] = $phone;
            echo "<script type='text/javascript'>alert('แก้ไขข้อมูลสำเร็จ');</script>";
        }
        else echo "<script type='text/javascript'>alert('เกิดข้อผิดพลาด แก้ไขข้อมูลไม่สำเร็จ');</script>";
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
                แก้ไขข้อมูลส่วนตัว - Administrator
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="firstname" placeholder="-"
                            value="<?php echo $_SESSION['firstname'] ?>">
                        <label>ชื่อจริง</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="lastname" placeholder="-"
                            value="<?php echo $_SESSION['lastname'] ?>">
                        <label>นามสกุล</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="address" placeholder="-"
                            value="<?php echo $_SESSION['address'] ?>">
                        <label>ที่อยู่</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="phone" placeholder="-"
                            value="<?php echo $_SESSION['phone'] ?>">
                        <label>เบอร์โทรศัพท์</label>
                    </div>
                    <div class="container-fluid d-flex justify-content-end">
                        <button type="submit" class="btn btn-success" name="submit">แก้ไข</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/jquery.min.js"></script> <!-- นำเข้า JS ของ jQuery -->
    <script src="../js/bootstrap.bundle.min.js"></script> <!-- นำเข้า JS ของ Bootstrap -->
</body>

</html>