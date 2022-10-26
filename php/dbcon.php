<?php
    $hostname = "127.0.0.1"; // IP เครื่องเซิฟเวอร์ ที่ติดตั้งฐานข้อมูล
    $username = "root"; // Username เข้าฐานข้อมูล Default = root
    $password = ""; // Password เข้าฐานข้อมูล Deafult = ว่าง;
    $database = "NKPTC"; // ชื่อฐานข้อมูล (ที่เราสร้างไว้)
    $conDB = mysqli_connect($hostname, $username, $password, $database); // เชื่อมต่อฐานข้อมูล

    date_default_timezone_set("Asia/Bangkok"); // ตั้งเขตเวลาของฐานข้อมูล
?>