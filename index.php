<?php
    $conDB = mysqli_connect("localhost", "root", "", "it-comp-65"); // เชื่อมต่อฐานข้อมูล
    // if($conDB) {
    //     echo "เชื่อมต่อฐานข้อมูลสำเร็จ!";
    // }
    // else echo "เกิดข้อผิดพลาด".mysqli_connect_error();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบสั่งจองอาหารออนไลน์</title> <!-- เปลี่ยน Title ของเว็บเพจ (ชื่อ Tab ของเว็บ) -->
    <link href="css/bootstrap.min.css" rel="stylesheet"> <!-- นำเข้า CSS ของ Bootstrap -->
    <link href="css/style.css" rel="stylesheet"> <!-- นำเข้า Style (ถ้ามี) -->
</head>

<body class="vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row m-3">
            <div class="col">
                <a href="./customer/customer.php"><button type="button"
                        class="btn btn-primary w-100 py-5">ลูกค้า</button></a>
            </div>
        </div>
        <div class="row m-3">
            <div class="col-6">
                <a href="./rider/rider.php"><button type="button" class="btn btn-success w-100">ผู้ส่งอาหาร</button></a>
            </div>
            <div class="col-6">
                <a href="./restaurant/restaurant.php"><button type="button"
                        class="btn btn-warning w-100">ร้านอาหาร</button></a>
            </div>
        </div>
        <div class="row m-3">
            <div class="col">
                <a href="./admin/admin.php"><button type="button" class="btn btn-danger w-100">ผู้ดูแลระบบ</button></a>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script> <!-- นำเข้า JS ของ jQuery -->
    <script src="js/bootstrap.bundle.min.js"></script> <!-- นำเข้า JS ของ Bootstrap -->
</body>

</html>