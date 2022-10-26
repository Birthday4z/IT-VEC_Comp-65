<?php
    require_once "../php/dbcon.php";
    session_start();

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT id, username, password, firstname, lastname, address, phone FROM admin WHERE username = '$username' and password = '$password'"; // เตรียมคำสั่ง SQL
        $query = mysqli_query($conDB, $sql); // สั่งให้หาข้อมูลในฐานข้อมูล ข้อมูลที่ได้จะเป็นแบบ [Array]
        $queryrow = mysqli_num_rows($query); // หาจำนวนแถวของข้อมูลที่ได้จากฐานข้อมูล
        
        if($queryrow > 0) {
            echo "<script type='text/javascript'>alert('Login สำเร็จ');</script>";
            foreach($query as $row) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['address'] = $row['address'];
                $_SESSION['phone'] = $row['phone'];

                header("refresh:0;url=admin.php");
            }
        }
        else {
            echo "<script type='text/javascript'>alert('Login ไม่สำเร็จ');</script>";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผู้ดูแลระบบ - ระบบสั่งจองอาหารออนไลน์</title> <!-- เปลี่ยน Title ของเว็บเพจ (ชื่อ Tab ของเว็บ) -->
    <link href="../css/bootstrap.min.css" rel="stylesheet"> <!-- นำเข้า CSS ของ Bootstrap -->
</head>

<body class="vh-100 d-flex align-items-center justify-content-center bg-info">
    <div class="containter-fluid w-25">
        <div class="card bg-danger">
            <div class="card-header fw-bold">
                LOGIN - Administrator
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="username" placeholder="-">
                        <label>Username</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="password" class="form-control" name="password" placeholder="-">
                        <label>Password</label>
                    </div>
                    <div class="container d-flex justify-content-end">
                        <a href="../index.php" class="btn btn-warning mx-2">BACK</a>
                        <button type="submit" class="btn btn-success" name="submit">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/jquery.min.js"></script> <!-- นำเข้า JS ของ jQuery -->
    <script src="../js/bootstrap.bundle.min.js"></script> <!-- นำเข้า JS ของ Bootstrap -->
</body>

</html>