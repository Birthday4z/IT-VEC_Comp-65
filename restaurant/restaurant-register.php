<?php
    require_once "../php/dbcon.php";

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $img = mysqli_real_escape_string($conDB, (file_get_contents($_FILES['img']['tmp_name'])));
        $type_id = $_POST['type'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        $sql = "INSERT INTO restaurant(username, password, img, type_id, name, address, phone) VALUES ('$username', '$password', '$img', $type_id, '$name', '$address', '$phone')";
        $query = mysqli_query($conDB, $sql);

        if ($query > 0) {
            echo "<script type='text/javascript'>alert('เพิ่มบัญชีร้านอาหารสำเร็จ');</script>";
        }
        else echo "<script type='text/javascript'>alert('เกิดข้อผิดพลาด เพิ่มบัญชีร้านอาหารไม่สำเร็จ');</script>";
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
                Register - Restaurant
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="username" placeholder="-">
                        <label>Username</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="password" class="form-control" name="password" placeholder="-">
                        <label>Password</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="file" class="form-control" name="img" placeholder="-">
                        <label>รูปภาพ</label>
                    </div>
                    <div class="form-floating my-2">
                    <select class="form-select" name="type">
                        <option selected>กรุณาเลือกประเภทร้านอาหาร</option>
                        <?php
                        // ดึงข้อมูลประเภทอาหาร
                        $sql = "SELECT id, type FROM restaurant_type";
                        $query = mysqli_query($conDB, $sql);
                        $queryrow = mysqli_num_rows($query);
                        if($queryrow > 0) {
                            foreach($query as $row) {
                                echo "<option value='{$row['id']}'>{$row['type']}</option>";
                            }
                        }
                        ?>
                    </select>
                        <label>ประเภทร้านอาหาร</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="text" class="form-control" name="name" placeholder="-">
                        <label>ชื่อร้านอาหาร</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="text" class="form-control" name="address" placeholder="-">
                        <label>ที่อยู่ร้านอาหาร</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="text" class="form-control" name="phone" placeholder="-">
                        <label>เบอร์ติดต่อร้านอาหาร</label>
                    </div>
                    <div class="container text-end">
                        <a href="../index.php" class="btn btn-danger mx-2">BACK</a>
                        <button type="submit" class="btn btn-success" name="submit">UPLOAD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/jquery-3.6.1.js"></script> <!-- นำเข้า JS ของ jQuery -->
    <script src="../js/bootstrap.bundle.js"></script> <!-- นำเข้า JS ของ Bootstrap -->
</body>

</html>