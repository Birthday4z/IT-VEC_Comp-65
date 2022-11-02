<?php //ก็อปโครงมาจาก editprofile.php
    require_once "../php/dbcon.php";
    session_start();
    
    if(empty($_SESSION['id'])) { // ถ้ายังไม่เคย Login ให้กลับไปหน้า Login
        header("refresh:0;url=restaurant-login.php");
    }

    if($_GET['edit']) { // ดึงข้อมูลอาหารตาม ID
        $id = $_GET['edit'];
        $sql = "SELECT id, food_type_id, name, description, price, discount FROM food WHERE id = $id";
        $query = mysqli_query($conDB, $sql);
        $queryrow = mysqli_num_rows($query);
        if($queryrow > 0) {
            foreach($query as $row) {
                $_SESSION['food_id'] = $row['id'];
                $_SESSION['food_type_id'] = $row['food_type_id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['description'] = $row['description'];
                $_SESSION['price'] = $row['price'];
                $_SESSION['discount'] = $row['discount'];
            }
        }
    }

    if(isset($_POST['submit'])) { //กดปุ่ม แก้ไข
        $id = $_SESSION['food_id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $img = mysqli_real_escape_string($conDB, (file_get_contents($_FILES['img']['tmp_name'])));
        $type = $_POST['type'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];

        $sql = "UPDATE food SET food_type_id = $type, img = '$img', name = '$name', description = '$description', price = $price, discount = $discount WHERE id = $id"; // เตรียมคำสั่ง SQL
        $query = mysqli_query($conDB, $sql); // สั่งให้หาข้อมูลในฐานข้อมูล ข้อมูลที่ได้จะเป็นแบบ [Array]
        if($query) {
            $_SESSION['name'] = $name;
            $_SESSION['description'] = $description;
            $_SESSION['price'] = $price;
            $_SESSION['discount'] = $discount;
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
    <title>ผู้ดูแลร้านอาหาร - แก้ไขข้อมูลอาหาร</title> <!-- เปลี่ยน Title ของเว็บเพจ (ชื่อ Tab ของเว็บ) -->
    <link href="../css/bootstrap.css" rel="stylesheet"> <!-- นำเข้า CSS ของ Bootstrap -->
</head>

<body>
    <!-- ส่วนของ Navbar -->
    <?php require_once "navbar.php" ?>

    <div class="containter-fluid w-100">
        <div class="card">
            <div class="card-header fw-bold">
                แก้ไขข้อมูลอาหาร - ผู้ดูแลร้านอาหาร
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="name" placeholder="-"
                            value="<?php echo $_SESSION['name'] ?>">
                        <label>ชื่ออาหาร</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="description" placeholder="-"
                            value="<?php echo $_SESSION['description'] ?>">
                        <label>คำอธิบายอาหาร</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="file" class="form-control" name="img" placeholder="-">
                        <label>รูปภาพ</label>
                    </div>
                    <div class="form-floating">
                        <select class="form-select" name="type">
                            <option selected>กรุณาเลือกประเภทอาหาร</option>
                            <?php
                            // ดึงข้อมูลประเภทอาหาร
                            $id = $_SESSION['id']; // ดึงค่า id ของร้านอาหาร
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
                        <label>ประเภทอาหาร</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="price" placeholder="-"
                            value="<?php echo $_SESSION['price'] ?>">
                        <label>ราคา</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="discount" placeholder="-"
                            value="<?php echo $_SESSION['discount'] ?>">
                        <label>ส่วนลด(%)</label>
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