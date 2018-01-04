<?php
    $host = "localhost";
    $user = "root";
    $pass = "root";
    $name = "baper_test";

    $con = mysqli_connect($host, $user, $pass) or die("Koneksi ke database gagal!");
    mysqli_select_db($con, $name) or die("Tidak ada database yang dipilih!");
?>
