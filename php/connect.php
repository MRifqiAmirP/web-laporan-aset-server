<?php
    $username = "root";
    $password = "";
    $database = "db_laporan_aset_server";
    $hostname = "localhost";
    $conn = mysqli_connect($hostname, $username, $password, $database);
    mysqli_select_db($conn, $database);
?>