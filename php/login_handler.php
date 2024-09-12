<?php
include 'connect.php';
session_start();

if (isset($_POST['login'])) {
    $loginAs = $_POST['loginAs'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo 'gagal';
        exit;
    }

    if ($loginAs == 'avp') {
        if ($username == 'admin' && $password == 'admin') {
            echo 'berhasil_avp';
        } else {
            echo 'gagal';
        }
    } 
    elseif ($loginAs == 'sistemdb') {
        if ($username == 'admin' && $password == 'admin') {
            echo 'berhasil_sistemdb';
        } else {
            echo 'gagal';
        }
    }
    elseif ($loginAs == 'network') {
        if ($username == 'admin' && $password == 'admin') {
            echo 'berhasil_network';
        } else {
            echo 'gagal';
        }
    }
    elseif ($loginAs == 'user') {
        // Gunakan prepared statement untuk mencegah SQL Injection
        $stmt = $conn->prepare("SELECT NO_PEG, PASSWORD FROM tb_pegawai WHERE NO_PEG = ? AND PASSWORD = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['no_peg'] = $row['NO_PEG'];
            echo 'berhasil_user';
            exit;
        } else {
            echo 'gagal';
            $_SESSION['status'] = 'gagal';
        }
        $stmt->close();
    } elseif ($loginAs == 1) {
        echo 'pilih';
    }
}
