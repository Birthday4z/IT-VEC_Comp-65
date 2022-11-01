<?php
    require_once "../php/dbcon.php";
    session_start();

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT id, img, type_id, name, address, phone FROM restaurant WHERE username = '$username' and password = '$password' and isAllow = 1";
        $query = mysqli_query($conDB, $sql);
        $queryrow = mysqli_num_rows($query);

        if($queryrow > 0) {
            echo "<script type='text/javascript'>alert('Login สำเร็จ');</script>";
            foreach($query as $row) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['img'] = base64_encode($row['img']);
                $_SESSION['type_id'] = $row['type_id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['address'] = $row['address'];
                $_SESSION['phone'] = $row['phone'];

                header("refresh:0;url=restaurant.php");
            }
        }
        else {
            echo "<script type='text/javascript'>alert('Login ไม่สำเร็จ กรอกข้อมูลไม่ถูกต้องหรือบัญชียังไม่ได้รับอนุญาต');</script>";
        }
    }
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
                LOGIN - Restaurant
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="username" placeholder="-">
                        <label>Username</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="password" class="form-control" name="password"  placeholder="-">
                        <label>Password</label>
                    </div>
                    <div class="container text-end">
                        <a href="../index.php" class="btn btn-danger mx-2">BACK</a>
                        <a href="restaurant-register.php" class="btn btn-primary mx-2">Register</a>
                        <button type="submit" class="btn btn-success mx-2" name="submit">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/jquery-3.6.1.js"></script> <!-- นำเข้า JS ของ jQuery -->
    <script src="../js/bootstrap.bundle.js"></script> <!-- นำเข้า JS ของ Bootstrap -->
</body>

</html>