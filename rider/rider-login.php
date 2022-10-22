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
    <title>ผู้ส่งอาหาร - ระบบสั่งจองอาหารออนไลน์</title> <!-- เปลี่ยน Title ของเว็บเพจ (ชื่อ Tab ของเว็บ) -->
    <link href="../css/bootstrap.min.css" rel="stylesheet"> <!-- นำเข้า CSS ของ Bootstrap -->
</head>

<body class="vh-100 d-flex align-items-center justify-content-center bg-info">
    <div class="containter-fluid w-25">
        <div class="card bg-success">
            <div class="card-header fw-bold">
                LOGIN - Rider
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="username" placeholder="-">
                        <label>Username</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="password" class="form-control" id="password" placeholder="-">
                        <label>Password</label>
                    </div>
                    <div class="container d-flex justify-content-end">
                        <a href="../index.php" class="btn btn-warning mx-2">BACK</a>
                        <button type="submit" class="btn btn-danger">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/jquery.min.js"></script> <!-- นำเข้า JS ของ jQuery -->
    <script src="../js/bootstrap.bundle.min.js"></script> <!-- นำเข้า JS ของ Bootstrap -->
</body>

</html>