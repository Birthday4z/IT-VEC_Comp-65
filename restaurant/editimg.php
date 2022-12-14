<?php
    require_once "../php/dbcon.php";
    session_start();
    
    if(empty($_SESSION['id'])) { // ถ้ายังไม่เคย Login ให้กลับไปหน้า Login
        header("refresh:0;url=restaurant-login.php");
    }

    if(isset($_POST['submit'])) { //กดปุ่ม แก้ไข
        $id = $_SESSION['id'];
        $img = mysqli_real_escape_string($conDB, (file_get_contents($_FILES['img']['tmp_name'])));

        $sql = "UPDATE restaurant SET img = '$img' WHERE id = $id"; // เตรียมคำสั่ง SQL
        $query = mysqli_query($conDB, $sql); // สั่งให้หาข้อมูลในฐานข้อมูล ข้อมูลที่ได้จะเป็นแบบ [Array]
        if($query) {
            $_SESSION['img'] = base64_encode(file_get_contents($_FILES['img']['tmp_name']));
            echo "<script type='text/javascript'>alert('แก้ไขรูปภาพสำเร็จ');</script>";
        }
        else echo "<script type='text/javascript'>alert('เกิดข้อผิดพลาด แก้ไขรูปภาพไม่สำเร็จ');</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผู้ดูแลระบบ - แก้ไขรูปภาพ</title> <!-- เปลี่ยน Title ของเว็บเพจ (ชื่อ Tab ของเว็บ) -->
    <link href="../css/bootstrap.css" rel="stylesheet"> <!-- นำเข้า CSS ของ Bootstrap -->
</head>

<body>
    <!-- ส่วนของ Navbar -->
    <?php require_once "navbar.php" ?>

    <div class="containter-fluid w-100">
        <div class="card">
            <div class="card-header fw-bold">
                แก้ไขรูปภาพ - ผู้ดูแลร้านอาหาร
            </div>
            <div class="card-body">
                <div class="container d-flex justify-content-center">
                    <img src='data:image/jpeg;base64,<?php echo $_SESSION['img'] ?>' class='img-fluid' width=20%>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-floating my-2">
                        <input type="file" class="form-control" name="img" placeholder="-">
                        <label>เปลี่ยนรูปภาพรูปภาพ</label>
                    </div>
                    <div class="container-fluid d-flex justify-content-end">
                        <button type="submit" class="btn btn-success" name="submit">แก้ไข</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/jquery-3.6.1.js"></script> <!-- นำเข้า JS ของ jQuery -->
    <script src="../js/bootstrap.bundle.js"></script> <!-- นำเข้า JS ของ Bootstrap -->
</body>

</html>