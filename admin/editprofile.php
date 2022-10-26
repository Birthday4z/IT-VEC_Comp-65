<?php
    require_once "../php/dbcon.php";
    session_start();
    
    if(empty($_SESSION['id'])) { // ถ้ายังไม่เคย Login ให้กลับไปหน้า Login
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
    <?php require_once "navbar.php" ?>

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