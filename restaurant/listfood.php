<?php //โครงเอามาจาก add-type.php ส่วน body เอามาจาก restaurant-register.php
    require_once "../php/dbcon.php";
    session_start();
    
    if(empty($_SESSION['id'])) { // ถ้ายังไม่เคย Login ให้กลับไปหน้า Login
        header("refresh:0;url=restaurant-login.php");
    }

    if($_GET['delete']) { // ลบเมนูอาหารที่เลือก
        $id = $_GET['delete'];
        
        $sql = "DELETE FROM food WHERE id = $id";
        $query = mysqli_query($conDB, $sql);

        if($query) {
        echo "<script type='text/javascript'>alert('ลบเมนูอาหารสำเร็จ');</script>";
        }
        else echo "<script type='text/javascript'>alert('เกิดข้อผิดพลาด ลบเมนูอาหารไม่สำเร็จ');</script>";
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
                จัดการเมนูอาหาร - Restaurant
            </div>
            <div class="card-body">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <td>ID อาหาร</td>
                            <td width='20%'>รูปภาพ</td>
                            <td>ชื่ออาหาร</td>
                            <td>คำอธิบายอาหาร</td>
                            <td>ราคา</td>
                            <td>ส่วนลด(%)</td>
                            <td>แก้ไข/ลบ</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $id = $_SESSION['id'];
                            $sql = "SELECT id, img, name, description, price, discount FROM food WHERE restaurant_id = $id";
                            $query = mysqli_query($conDB, $sql);
                            $queryrow = mysqli_num_rows($query);

                            if ($queryrow > 0) {
                                foreach($query as $row) {
                                    $img = base64_encode($row['img']);

                                    echo "
                                    <tr>
                                    <td>{$row['id']}</td>
                                    <td><img src='data:image/jpeg;base64,{$img}' class='img-fluid'></td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['description']}</td>
                                    <td>{$row['price']}</td>
                                    <td>{$row['discount']}</td>
                                    <td>
                                        <div class='container-fluid'>
                                        <a href='editfood.php?edit={$row['id']}' class='btn btn-warning'>แก้ไข</a>
                                        <a href='?delete={$row['id']}' class='btn btn-danger'>ลบ</a>
                                        </div>
                                    </tr>
                                    ";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../js/jquery-3.6.1.js"></script> <!-- นำเข้า JS ของ jQuery -->
    <script src="../js/bootstrap.bundle.js"></script> <!-- นำเข้า JS ของ Bootstrap -->
</body>

</html>