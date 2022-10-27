<?php
    require_once "../php/dbcon.php";
    session_start();
    
    if(empty($_SESSION['id'])) { // ถ้ายังไม่เคย Login ให้กลับไปหน้า Login
        header("refresh:0;url=admin-login.php");
    }

    if($_GET['allow']) {
        $id = $_GET['allow'];
        
        $sql = "UPDATE restaurant SET isallow = 1 WHERE id = $id"; // เตรียมคำสั่ง SQL
        $query = mysqli_query($conDB, $sql); // Query ลงฐานข้อมูล
        if(mysqli_affected_rows($conDB) > 0) { // เช็คว่าเปลี่ยนสำเร็จไหม ถ้าค่าเป็น 0 = ไม่พบข้อมูลที่ตรงเงื่อนไข WHERE, -1 = เชื่อมต่อไม่ได้, >0 = สำเร็จ
            echo "<script type='text/javascript'>alert('อนุญาตบัญชีสำเร็จ');</script>";
        }
        else echo "<script type='text/javascript'>alert('อนุญาตบัญชีไม่สำเร็จ บัญชีถูกอนุญาตอยู่แล้ว');</script>";
        }

    if($_GET['notallow']) {
        $id = $_GET['notallow'];
        
        $sql = "UPDATE restaurant SET isallow = 0 WHERE id = $id"; // เตรียมคำสั่ง SQL
        $query = mysqli_query($conDB, $sql); // Query ลงฐานข้อมูล
        if(mysqli_affected_rows($conDB) > 0) { // เช็คว่าเปลี่ยนสำเร็จไหม ถ้าค่าเป็น 0 = ไม่พบข้อมูลที่ตรงเงื่อนไข WHERE, -1 = เชื่อมต่อไม่ได้, >0 = สำเร็จ
            echo "<script type='text/javascript'>alert('ระงับบัญชีสำเร็จ');</script>";
        }
        else echo "<script type='text/javascript'>alert('ระงับบัญชีไม่สำเร็จ บัญชีถูกระงับอยู่แล้ว');</script>";
        }
    
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผู้ดูแลระบบ - ระบบสั่งจองอาหารออนไลน์</title> <!-- เปลี่ยน Title ของเว็บเพจ (ชื่อ Tab ของเว็บ) -->
    <link href="../css/bootstrap.css" rel="stylesheet"> <!-- นำเข้า CSS ของ Bootstrap -->
</head>

<body>
    <!-- ส่วนของ Navbar -->
    <?php require_once "navbar.php" ?>

    <div class="containter-fluid w-100">
        <div class="card">
            <div class="card-header fw-bold">
                จัดการบัญชีร้านอาหาร - Administrator
            </div>
            <div class="card-body">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <td>ID ร้านอาหาร</td>
                            <td>Username</td>
                            <td>สถานะบัญชี</td>
                            <td>ชื่อร้านอาหาร</td>
                            <td>ที่อยู่ร้านอาหาร</td>
                            <td>เบอร์ติดต่อร้านอาหาร</td>
                            <td>อนุญาต/ระงับการใช้งาน</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT id, username, isAllow, name, address, phone FROM restaurant";
                            $query = mysqli_query($conDB, $sql);
                            $queryrow = mysqli_num_rows($query);

                            if ($queryrow > 0) {
                                foreach($query as $row) {
                                    if($row['isAllow'] == 0) {
                                        $row['isAllow'] = "ระงับ";
                                    }
                                    else if($row['isAllow'] == 1) {
                                        $row['isAllow'] = "อนุมัติ";
                                    }

                                    echo "
                                    <tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['username']}</td>
                                    <td>{$row['isAllow']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['address']}</td>
                                    <td>{$row['phone']}</td>
                                    <td>
                                        <a href='?allow={$row['id']}' class='btn btn-success'>อนุมัติ</a>
                                        <a href='?notallow={$row['id']}' class='btn btn-danger'>ระงับ</a>
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