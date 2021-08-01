<?php

$db_host = "localhost";
$base_url = "http://localhost/robean/bean"; 
$db_user = "root";
$db_pass = "";
$db_name = "bean_db";

$main_title = "Sistem Info Teknisi";

$month_name = [
    "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"
];

$mysqli = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

try {    
    //create PDO connection 
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

    // echo "Koneksi Berhasil<br>";
    // echo "used database : " . $db_name . "@" .$db_host;
} catch(PDOException $e) {
    //show error
    die("Terjadi masalah: " . $e->getMessage());
}