<?php
include 'connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\POP3;

require '../email/vendor/autoload.php';
$mail = new PHPMailer(true);
$mail2 = new PHPMailer(true);
$mail3 = new PHPMailer(true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && isset($_POST['ticket'])) {
        $action = $_POST['action'];
        $ticket = $_POST['ticket'];

        $ticket = $_POST['ticket'];
        $query = "SELECT NAMA_PEGAWAI, EMAIL_ADDRESS FROM tb_pegawai WHERE NO_TICKET = '$ticket'";
        $sql = mysqli_query($conn, $query);
        $result = mysqli_fetch_array($sql);

        if ($action === 'accept') {
            echo "Tombol Accept ditekan untuk tiket: " . $result['EMAIL_ADDRESS'];
            try {
                // Pengaturan Server SMTP
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com'; // Alamat SMTP server Gmail
                $mail->SMTPAuth   = true;
                $mail->Username   = 'cocrifqi351@gmail.com'; // Ganti dengan email Anda
                $mail->Password   = 'yejw dtky oyjo hbpv';  // Ganti dengan App Password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587; // Port SMTP untuk TLS

                // Informasi Pengirim dan Penerima
                $mail->setFrom('cocrifqi351@gmail.com', 'AVP');
                // $mail->addAddress('faizalalvarizy1@gmail.com', 'Sir Fai');
                $mail->addAddress($result['EMAIL_ADDRESS'], $result['NAMA_PEGAWAI']);

                // Konten Email
                $mail->isHTML(true); // Set email format ke HTML
                $mail->Subject = 'AVP Response';
                // $mail->Body    = '<h1>Ini adalah isi email HTML</h1><p>Email yang dikirim menggunakan <b>PHPMailer</b>.</p>';
                $mail->Body = '<h2>' . $ticket . '</h2><br>Status: <h1> Accept </h1>';
                $mail->AltBody = 'Ini adalah isi teks biasa dari email untuk klien email yang tidak mendukung HTML.';

                $mail->send();
            } catch (Exception $e) {
                echo "Email tidak dapat dikirim. Error PHPMailer: {$mail->ErrorInfo}";
            }
        } elseif ($action === 'reject') {
            echo "Tombol Reject ditekan untuk tiket: " . $result['EMAIL_ADDRESS'];
            try {
                // Pengaturan Server SMTP
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'cocrifqi351@gmail.com';
                $mail->Password   = 'yejw dtky oyjo hbpv'; 
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587; // Port SMTP untuk TLS

                // Informasi Pengirim dan Penerima
                $mail->setFrom('cocrifqi351@gmail.com', 'AVP');
                $mail->addAddress($result['EMAIL_ADDRESS'], $result['NAMA_PEGAWAI']);

                // Konten Email
                $mail->isHTML(true); // Set email format ke HTML
                $mail->Subject = 'AVP Response';
                // $mail->Body    = '<h1>Ini adalah isi email HTML</h1><p>Email yang dikirim menggunakan <b>PHPMailer</b>.</p>';
                $mail->Body = '<h2>' . $ticket . '</h2><br>Status: <h1> Reject </h1>';
                $mail->AltBody = 'Ini adalah isi teks biasa dari email untuk klien email yang tidak mendukung HTML.';

                $mail->send();
            } catch (Exception $e) {
                echo "Email tidak dapat dikirim. Error PHPMailer: {$mail->ErrorInfo}";
            }
        } elseif ($action === 'accept_edit') {
            try {
                // Pengaturan Server SMTP
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'cocrifqi351@gmail.com';
                $mail->Password   = 'yejw dtky oyjo hbpv';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587; // Port SMTP untuk TLS

                // Informasi Pengirim dan Penerima
                $mail->setFrom('cocrifqi351@gmail.com', 'AVP');
                $mail->addAddress($result['EMAIL_ADDRESS'], $result['NAMA_PEGAWAI']);

                // Konten Email
                $mail->isHTML(true); // Set email format ke HTML
                $mail->Subject = 'AVP Response';
                // $mail->Body    = '<h1>Ini adalah isi email HTML</h1><p>Email yang dikirim menggunakan <b>PHPMailer</b>.</p>';
                $mail->Body = '<h2>' . $ticket . '</h2><br>Status: <h1> Accept </h1>';
                $mail->AltBody = 'Ini adalah isi teks biasa dari email untuk klien email yang tidak mendukung HTML.';

                $mail->send();
            } catch (Exception $e) {
                echo "Email tidak dapat dikirim. Error PHPMailer: {$mail->ErrorInfo}";
            }
        } elseif ($action === 'reject_edit') {
            try {
                // Pengaturan Server SMTP
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'cocrifqi351@gmail.com';
                $mail->Password   = 'yejw dtky oyjo hbpv';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587; // Port SMTP untuk TLS

                // Informasi Pengirim dan Penerima
                $mail->setFrom('cocrifqi351@gmail.com', 'AVP');
                $mail->addAddress($result['EMAIL_ADDRESS'], $result['NAMA_PEGAWAI']);

                // Konten Email
                $mail->isHTML(true); // Set email format ke HTML
                $mail->Subject = 'AVP Response';
                // $mail->Body    = '<h1>Ini adalah isi email HTML</h1><p>Email yang dikirim menggunakan <b>PHPMailer</b>.</p>';
                $mail->Body = '<h2>' . $ticket . '</h2><br>Status: <h1> Reject </h1>';
                $mail->AltBody = 'Ini adalah isi teks biasa dari email untuk klien email yang tidak mendukung HTML.';

                $mail->send();
            } catch (Exception $e) {
                echo "Email tidak dapat dikirim. Error PHPMailer: {$mail->ErrorInfo}";
            }
        } else {
            echo "Aksi tidak dikenali.";
        }
    }

    if (isset($_POST['buat-server'])) {
        $ticket = $_POST['ticket'];
        $query = "SELECT NAMA_PEGAWAI, EMAIL_ADDRESS FROM tb_pegawai WHERE NO_TICKET = '$ticket'";
        $sql = mysqli_query($conn, $query);
        $result = mysqli_fetch_array($sql);

        $memori = $_POST['memori'];
        $ram = $_POST['ram'];
        $cpu = $_POST['cpu'];
        $storage = $_POST['storage'];
        $esxi = $_POST['esxi'];
        $os = $_POST['os'];

        $memoriData = 0;
        $memoriData = ($memori == 1) ? 256 : (($memori == 2) ? 520 : (($memori == 3) ? 1024 : 0));
        $ramData = 0;
        $ramData = ($ram == 1) ? 1 : (($ram == 2) ? 2 : (($ram == 3) ? 4 : 0));
        $cpuData = 0;
        $cpuData = ($cpu == 1) ? 1 : (($cpu == 2) ? 2 : (($cpu == 3) ? 3 : 0));

        try {
            // Pengaturan Server SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'cocrifqi351@gmail.com';
            $mail->Password   = 'yejw dtky oyjo hbpv';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Informasi Pengirim dan Penerima
            $mail->setFrom('cocrifqi351@gmail.com', 'Sistem Database');
            $mail->addAddress($result['EMAIL_ADDRESS'], $result['NAMA_PEGAWAI']);

            // Konten Email
            $mail->isHTML(true); // Set email format ke HTML
            $mail->Subject = 'Detail Server yang Dibuat';
            // $mail->Body    = '<h1>Ini adalah isi email HTML</h1><p>Email yang dikirim menggunakan <b>PHPMailer</b>.</p>';
            $mail->Body = '<h1>' . htmlspecialchars($ticket) . '</h1><hr><br><h3>Rincian</h3>';

            $mail->Body .= '
                <table border="1" cellpadding="5" cellspacing="0">
                    <thead>
                        <tr>
                            <th><strong>Memori</strong></th>
                            <th><strong>RAM</strong></th>
                            <th><strong>CPU</strong></th>
                            <th><strong>Storage</strong></th>
                            <th><strong>ESXi</strong></th>
                            <th><strong>OS</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>' . htmlspecialchars($memoriData) . ' Gb</td>
                            <td>' . htmlspecialchars($ramData) . ' Gb</td>
                            <td>' . htmlspecialchars($cpuData) . ' Cores</td>
                            <td>Data Storage ' . htmlspecialchars($storage) . '</td>
                            <td>ESXi ' . htmlspecialchars($esxi) . '</td>
                            <td>' . htmlspecialchars($os) . '</td>
                        </tr>
                    </tbody>
                </table>
            ';
            $mail->AltBody = 'Ini adalah isi teks biasa dari email untuk klien email yang tidak mendukung HTML.';

            $mail->send();
        } catch (Exception $e) {
            echo "Email tidak dapat dikirim. Error PHPMailer: {$mail->ErrorInfo}";
        }
    }

    if (isset($_POST['buat-network'])) {
        $ticket = $_POST['ticket'];
        $hostname = $_POST['hostname'];
        $openPort = $_POST['openPort'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $ipAddress = $_POST['ipaddress'];

        $query = "SELECT NAMA_PEGAWAI, EMAIL_ADDRESS FROM tb_pegawai WHERE NO_TICKET = '$ticket'";
        $sql = mysqli_query($conn, $query);
        $result = mysqli_fetch_array($sql);

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
            $mail->setFrom('cocrifqi351@gmail.com', 'Network');
            $mail->addAddress($result['EMAIL_ADDRESS'], $result['NAMA_PEGAWAI']);

            $mail->isHTML(true);
            $mail->Subject = 'Detail Network Server yang Dibuat';
            $mail->Body = '<h1>' . htmlspecialchars($ticket) . '</h1><hr><br><h3>Rincian</h3>';

            $mail->Body .= '
                <table border="1" cellpadding="5" cellspacing="0">
                    <thead>
                        <tr>
                            <th><strong>Hostname</strong></th>
                            <th><strong>Open Port</strong></th>
                            <th><strong>Username</strong></th>
                            <th><strong>Password</strong></th>
                            <th><strong>IP Address</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>' . htmlspecialchars($hostname) . '</td>
                            <td>' . htmlspecialchars($openPort) . '</td>
                            <td>' . htmlspecialchars($username) . '</td>
                            <td>' . htmlspecialchars($password) . '</td>
                            <td>' . htmlspecialchars($ipAddress) . '</td>
                        </tr>
                    </tbody>
                </table>
            ';
            $mail->AltBody = 'Ini adalah isi teks biasa dari email untuk klien email yang tidak mendukung HTML.';

            $mail->send();
        } catch (Exception $e) {
            echo "Email tidak dapat dikirim. Error PHPMailer: {$mail->ErrorInfo}";
        }
    }

    if (isset($_POST['close-ticket'])) {
        $ticket = $_POST['ticket'];

        try {
            // Pengaturan Server SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'cocrifqi351@gmail.com';
            $mail->Password   = 'yejw dtky oyjo hbpv';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587; // Port SMTP untuk TLS

            // Informasi Pengirim dan Penerima
            $mail->setFrom('cocrifqi351@gmail.com', 'User');
            $mail->addAddress('muhammadrifqiamirp20@gmail.com', 'AVP');

            // Konten Email
            $mail->isHTML(true); // Set email format ke HTML
            $mail->Subject = 'Ticket Status';
            // $mail->Body    = '<h1>Ini adalah isi email HTML</h1><p>Email yang dikirim menggunakan <b>PHPMailer</b>.</p>';
            $mail->Body = '<h2>' . $ticket . '</h2><br>Tiket sudah ditutup oleh User';
            $mail->AltBody = 'Ini adalah isi teks biasa dari email untuk klien email yang tidak mendukung HTML.';

            $mail->send();

            $mail2->isSMTP();
            $mail2->Host       = 'smtp.gmail.com';
            $mail2->SMTPAuth   = true;
            $mail2->Username   = 'cocrifqi351@gmail.com';
            $mail2->Password   = 'yejw dtky oyjo hbpv';
            $mail2->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail2->Port       = 587; // Port SMTP untuk TLS

            // Informasi Pengirim dan Penerima
            $mail2->setFrom('cocrifqi351@gmail.com', 'User');
            $mail2->addAddress('muhammadrifqiamirp20@gmail.com', 'Sistem DB');

            // Konten Email
            $mail2->isHTML(true); // Set email format ke HTML
            $mail2->Subject = 'Ticket Status';
            $mail2->Body = '<h2>' . $ticket . '</h2><br>Tiket sudah ditutup oleh User';
            $mail2->AltBody = 'Ini adalah isi teks biasa dari email untuk klien email yang tidak mendukung HTML.';

            $mail2->send();

            $mail3->isSMTP();
            $mail3->Host       = 'smtp.gmail.com';
            $mail3->SMTPAuth   = true;
            $mail3->Username   = 'cocrifqi351@gmail.com';
            $mail3->Password   = 'yejw dtky oyjo hbpv';
            $mail3->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail3->Port       = 587; // Port SMTP untuk TLS

            // Informasi Pengirim dan Penerima
            $mail3->setFrom('cocrifqi351@gmail.com', 'User');
            $mail3->addAddress('muhammadrifqiamirp20@gmail.com', 'Network');

            // Konten Email
            $mail3->isHTML(true); // Set email format ke HTML
            $mail3->Subject = 'Ticket Status';
            $mail3->Body = '<h2>' . $ticket . '</h2><br>Tiket sudah ditutup oleh User';
            $mail3->AltBody = 'Ini adalah isi teks biasa dari email untuk klien email yang tidak mendukung HTML.';

            $mail->send();
            echo ("Berhasil mengirim email");
        } catch (Exception $e) {
            echo "Email tidak dapat dikirim. Error PHPMailer: {$mail->ErrorInfo}";
        }
    }

    if (isset($_POST['edit-server'])) {
        $id =  $_POST['id'];
        $query = "SELECT peg.*, serv.* FROM tb_server serv LEFT JOIN tb_pegawai peg ON peg.USERNAME = serv.USERNAME WHERE ID_SERVER = '$id' LIMIT 1;";
        $sql = mysqli_query($conn, $query);
        $result = mysqli_fetch_array($sql);

        $ticketGenerate = 1000;
        $ticketWithPrefix = 'ED-' . $ticketGenerate;

        // Siapkan statement sekali di luar loop
        $queryTicket = "SELECT NO_TICKET FROM tb_req_edit_server WHERE NO_TICKET = ?";
        $stmt = mysqli_prepare($conn, $queryTicket);

        if (!$stmt) {
            die('Prepare failed: ' . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, 's', $ticketWithPrefix);

        $jumlah = 1;
        while ($jumlah > 0) {
            mysqli_stmt_execute($stmt);
            $resultTicket = mysqli_stmt_get_result($stmt);
            $jumlah = mysqli_num_rows($resultTicket);

            if ($jumlah > 0) {
                $ticketGenerate += 1;
                $ticketWithPrefix = 'ED-' . $ticketGenerate;
                mysqli_stmt_bind_param($stmt, 's', $ticketWithPrefix);
            }
        }
        $ticket = "ED-" . $ticketGenerate;


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
            $mail->Subject = 'Request Edit Server Baru';
            // $mail->Body    = '<h1>Ini adalah isi email HTML</h1><p>Email yang dikirim menggunakan <b>PHPMailer</b>.</p>';
            $mail->Body = 'Tiket baru: <h2>' . $ticket . '</h2><br> Nomor Pegawai: ' . $result['NO_PEG'] . '<br> Nama: ' . $result['NAMA_PEGAWAI'];
            $mail->AltBody = 'Ini adalah isi teks biasa dari email untuk klien email yang tidak mendukung HTML.';

            $mail->send();
            echo "Email terkirim";
        } catch (Exception $e) {
            echo "Email tidak dapat dikirim. Error PHPMailer: {$mail->ErrorInfo}";
        }
    }

    // else {
    //     echo "Parameter tidak lengkap.";
    // }
} else {
    echo "Hanya permintaan POST yang diterima.";
}
