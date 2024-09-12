<?php
include 'connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../email/vendor/autoload.php';
$mail = new PHPMailer(true);

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nopeg = $_POST['nopeg'];
    $nama = $_POST['name'];
    $user_name = $_POST['username'];
    $password = $_POST['password'];
    $email =  $_POST['email'];
    $position =  $_POST['position'];

    // $queryCheckNopeg = "SELECT NO_PEG FROM tb_pegawai WHERE NO_PEG = '$nopeg' AND USERNAME = '$user_name'";
    // $sqlCheckNopeg = mysqli_query($conn, $queryCheckNopeg);
    // $jumlah = mysqli_num_rows($sqlCheckNopeg);

    // if ($jumlah == 0) {
    //     $response['success'] = false;
    //     echo json_encode($response);
    //     $conn->close();
    //     exit;
    // } else {
    //     $response['success'] = true;
    // }

    $ticketGenerate = 1000;
    $query = "SELECT NO_TICKET FROM tb_request_server WHERE NO_TICKET = ?";
    $stmt = mysqli_prepare($conn, $query);
    $ticketWithPrefix = 'CR-' . $ticketGenerate;
    mysqli_stmt_bind_param($stmt, 's', $ticketWithPrefix);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $jumlah = mysqli_num_rows($result);

    while ($jumlah > 0) {
        $ticketGenerate += 1;
        $query = "SELECT NO_TICKET FROM tb_request_server WHERE NO_TICKET = ?";
        $stmt = mysqli_prepare($conn, $query);
        $ticketWithPrefix = 'CR-' . $ticketGenerate;
        mysqli_stmt_bind_param($stmt, 's', $ticketWithPrefix);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $jumlah = mysqli_num_rows($result);
    }

    $ticket = "CR-" . $ticketGenerate;

    $queryInsertUser = "INSERT INTO tb_pegawai VALUES('$ticket', '$nopeg', '$nama', '$user_name', '$password', '$email', '$position')";
    $sqlInserUser = mysqli_query($conn, $queryInsertUser);

    $memori = $_POST['memori'];
    $ram =  $_POST['ram'];
    $cpu = $_POST['cpu'];
    $internet = $_POST['internet'];
    $openPort = isset($_POST['openPort']) ? $_POST['openPort'] : '';
    $os = $_POST['os'];

    if ($internet == 'true') {
        $openPortData = ($openPort == "") ? "80" : ("80, " . $openPort);
    } else {
        $openPortData = "80";
    }

    $memoriData = 0;
    $memoriData = ($memori == 1) ? 250 : (($memori == 2) ? 520 : (($memori == 3) ? 1024 : 0));
    $ramData = 0;
    $ramData = ($ram == 1) ? 1 : (($ram == 2) ? 2 : (($ram == 3) ? 4 : 0));
    $cpuData = 0;
    $cpuData = ($cpu == 1) ? 1 : (($cpu == 2) ? 2 : (($cpu == 3) ? 3 : 0));

    $internetData = ($internet == 'true') ? 'Yes' : 'No';
    $queryInsert = "INSERT INTO tb_request_server VALUES ('$ticket', '$nopeg', '$memoriData', '$ramData', '$cpuData', '$internetData', '$openPortData', '$os')";

    $queryInsertAVP = "INSERT INTO tb_avp_response VALUES ('$ticket', 'No Respon')";
    $sqlInsertAVP = mysqli_query($conn, $queryInsertAVP);

    $queryInsertTicket = "INSERT INTO tb_ticket VALUES ('$ticket', 'OPEN')";
    $sqlInsertTicket = mysqli_query($conn, $queryInsertTicket);

    if (mysqli_query($conn, $queryInsert)) {
        try {
            // Pengaturan Server SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // Alamat SMTP server Gmail
            $mail->SMTPAuth   = true;
            $mail->Username   = 'cocrifqi351@gmail.com'; // Ganti dengan email Anda
            $mail->Password   = 'yejw dtky oyjo hbpv';  // Ganti dengan password Anda
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587; // Port SMTP untuk TLS

            // Informasi Pengirim dan Penerima
            $mail->setFrom('cocrifqi351@gmail.com', 'User');
            // $mail->addAddress('faizalalvarizy1@gmail.com', 'Sir Fai');
            $mail->addAddress('muhammadrifqiamirp20@gmail.com', 'AVP');

            // Konten Email
            $mail->isHTML(true); // Set email format ke HTML
            $mail->Subject = 'Request Buat Server Baru';
            // $mail->Body    = '<h1>Ini adalah isi email HTML</h1><p>Email yang dikirim menggunakan <b>PHPMailer</b>.</p>';
            $mail->Body = 'Tiket baru: <h2>' . $ticket . '</h2><br> Nomor Pegawai: ' . $nopeg . '<br> Nama: ' . $nama;
            $mail->AltBody = 'Ini adalah isi teks biasa dari email untuk klien email yang tidak mendukung HTML.';

            $mail->send();
        } catch (Exception $e) {
            echo "Email tidak dapat dikirim. Error PHPMailer: {$mail->ErrorInfo}";
        }
        $response['ticket'] = $ticket;
        $response['success'] = true;
    } else {
        $response['success'] = false;
        $response['error'] = "Error: " . mysqli_error($conn);
    }
    echo json_encode($response);
    $conn->close();
}
