<?php
    require_once "../php/dbcon.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ร้านอาหาร - ระบบสั่งจองอาหารออนไลน์</title> <!-- เปลี่ยน Title ของเว็บเพจ (ชื่อ Tab ของเว็บ) -->
    <link href="../css/bootstrap.css" rel="stylesheet"> <!-- นำเข้า CSS ของ Bootstrap -->
</head>

<body class="vh-100 d-flex align-items-center justify-content-center bg-info">
    <div class="containter-fluid w-25">
        <div class="card bg-warning">
            <div class="card-header fw-bold">
                Register - Restaurant
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
                    <div class="form-floating my-2">
                        <input type="file" class="form-control" id="img" placeholder="-">
                        <label>รูปภาพ</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="text" class="form-control" id="img" placeholder="-">
                        <label>ประเภทร้านอาหาร</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="text" class="form-control" id="img" placeholder="-">
                        <label>ชื่อร้านอาหาร</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="text" class="form-control" id="img" placeholder="-">
                        <label>ที่อยู่ร้านอาหาร</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="text" class="form-control" id="img" placeholder="-">
                        <label>เบอร์ติดต่อร้านอาหาร</label>
                    </div>
                    <div class="container text-end">
                        <a href="../index.php" class="btn btn-danger mx-2">BACK</a>
                        <button type="submit" class="btn btn-success">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/jquery-3.6.1.js"></script> <!-- นำเข้า JS ของ jQuery -->
    <script src="../js/bootstrap.bundle.js"></script> <!-- นำเข้า JS ของ Bootstrap -->
</body>

</html>