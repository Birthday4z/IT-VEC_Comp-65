<?php //โครงเอามาจาก add-type.php ส่วน body เอามาจาก restaurant-register.php
    require_once "../php/dbcon.php";
    session_start();
    
    if(empty($_SESSION['id'])) { // ถ้ายังไม่เคย Login ให้กลับไปหน้า Login
        header("refresh:0;url=restaurant-login.php");
    }

    if(isset($_POST['submit'])) {
        $id = $_SESSION['id']; // id ของ restaurant
        $name = $_POST['name'];
        $description = mysqli_real_escape_string($conDB, $_POST['description']);
        $img = mysqli_real_escape_string($conDB, (file_get_contents($_FILES['img']['tmp_name'])));
        $type = $_POST['type'];
        $price = $_POST['price'];

        $sql = "INSERT INTO food(restaurant_id, food_type_id, img, name, description, price) VALUES ($id, $type, '$img', '$name', '$description', $price)";
        $query = mysqli_query($conDB, $sql);

        if ($query > 0) {
            echo "<script type='text/javascript'>alert('เพิ่มอาหารสำเร็จ');</script>";
        }
        else echo "<script type='text/javascript'>alert('เกิดข้อผิดพลาด เพิ่มอาหารไม่สำเร็จ');</script>";
    }

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผู้ดูแลร้านอาหาร - ระบบสั่งจองอาหารออนไลน์</title> <!-- เปลี่ยน Title ของเว็บเพจ (ชื่อ Tab ของเว็บ) -->
    <link href="../css/bootstrap.css" rel="stylesheet"> <!-- นำเข้า CSS ของ Bootstrap -->
</head>

<body>
    <!-- ส่วนของ Navbar -->
    <?php require_once "navbar.php" ?>

    <div class="containter-fluid w-100">
        <div class="card">
            <div class="card-header fw-bold">
                เพิ่มเมนู - Restaurant
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="name" placeholder="-">
                        <label>ชื่อเมนูอาหาร</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="text" class="form-control" name="description" placeholder="-">
                        <label>คำอธิบายอาหาร</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="file" class="form-control" name="img" placeholder="-">
                        <label>รูปภาพ</label>
                    </div>
                    <div class="form-floating my-2">
                    <select class="form-select" name="type">
                        <option selected>กรุณาเลือกประเภทอาหาร</option>
                        <?php
                        // ดึงข้อมูลประเภทอาหาร
                        $id = $_SESSION['id'];
                        $sql = "SELECT id, type FROM food_type WHERE restaurant_id = $id";
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
                        <input type="number" class="form-control" name="price" placeholder="-">
                        <label>ราคา</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="number" class="form-control" name="discount" placeholder="-">
                        <label>ส่วนลด(%)</label>
                    </div>
                    <div class="container text-end">
                        <a href="../index.php" class="btn btn-danger mx-2">BACK</a>
                        <button type="submit" class="btn btn-success" name="submit">เพิ่มเมนู</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/jquery-3.6.1.js"></script> <!-- นำเข้า JS ของ jQuery -->
    <script src="../js/bootstrap.bundle.js"></script> <!-- นำเข้า JS ของ Bootstrap -->
</body>

</html>