<?php
include 'connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\POP3;

require '../email/vendor/autoload.php';
$mail = new PHPMailer(true);

if (isset($_POST['respon'])) {
    if ($_POST['respon'] == 'accept') {
        $ticket = $_POST['accept'];

        $queryUpdate = "UPDATE tb_avp_response SET RESPONSE = 'Accept' WHERE NO_TICKET = '$ticket'";
        $sqlUpdate = mysqli_query($conn, $queryUpdate);

        // $queryInsertServer = "INSERT INTO tb_server VALUES('$ticket', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
        // $sqlInsertServer = mysqli_query($conn, $queryInsertServer);

        if ($sqlUpdate) {
            header('Location: ../main/avp.php');
        } else {
            echo ("Error");
        }
    }

    elseif ($_POST['respon'] == 'reject') {
        $ticket = $_POST['reject'];
        $queryUpdate = "UPDATE tb_avp_response SET RESPONSE = 'Reject' WHERE NO_TICKET = '$ticket'";
        $sqlUpdate = mysqli_query($conn, $queryUpdate);

        if ($sqlUpdate) {
            header('Location: ../main/avp.php');
        } else {
            echo ("Error");
        }
    }

    elseif ($_POST['respon'] == 'accept_edit') {
        $ticket = $_POST['accept'];

        $queryUpdate = "UPDATE tb_avp_response SET RESPONSE = 'Accept' WHERE NO_TICKET = '$ticket'";
        $sqlUpdate = mysqli_query($conn, $queryUpdate);

        if ($sqlUpdate) {
            header('Location: ../main/avp_edit.php');
        } else {
            echo ("Error");
        }
    }

    elseif ($_POST['respon'] == 'reject_edit') {
        $ticket = $_POST['reject'];

        $queryUpdate = "UPDATE tb_avp_response SET RESPONSE = 'Reject' WHERE NO_TICKET = '$ticket'";
        $sqlUpdate = mysqli_query($conn, $queryUpdate);

        if ($sqlUpdate) {
            header('Location: ../main/avp_edit.php');
        } else {
            echo ("Error");
        }
    }
}

if (isset($_POST['server'])) {
    if ($_POST['server'] == 'buat') {
        $ticket = $_POST['ticket'];
        $memori = $_POST['memori'];
        $ram = $_POST['ram'];
        $cpu = $_POST['cpu'];
        $storage = $_POST['storage'];
        $ESXi = $_POST['esxi'];
        $os = $_POST['os'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $memoriData = 0;
        $memoriData = ($memori == 1) ? 250 : (($memori == 2) ? 520 : (($memori == 3) ? 8 : 1024));
        $ramData = 0;
        $ramData = ($ram == 1) ? 1 : (($ram == 2) ? 2 : (($ram == 3) ? 4 : 0));
        $cpuData = 0;
        $cpuData = ($cpu == 1) ? 1 : (($cpu == 2) ? 2 : (($cpu == 3) ? 3 : 0));

        $queryInsertServer = "INSERT INTO tb_server VALUES('$ticket', NULL, '$ramData', '$memoriData', '$cpuData', '$storage', '$ESXi', '$os', NULL, NULL, NULL, NULL, NULL)";
        $sqlInsertServer = mysqli_query($conn, $queryInsertServer);

        $queryInsertSistemDB = "INSERT INTO tb_sistem_db VALUES('$ticket', NULL, '$ramData', '$memoriData', '$cpuData', '$storage', '$ESXi', '$os')";
        $sqlInsertSistemDB = mysqli_query($conn, $queryInsertSistemDB);

        if ($sqlInsertServer && $sqlInsertSistemDB) {
            $queryEsxi = "SELECT CPU_CORES, RAM FROM esxi WHERE ID = $ESXi";
            $sqlEsxi = mysqli_query($conn, $queryEsxi);
            $resultEsxi = mysqli_fetch_array($sqlEsxi);

            if ($resultEsxi) {
                $currentCpu = $resultEsxi['CPU_CORES'];
                $currentRam = $resultEsxi['RAM'];

                $totalCpu = $currentCpu - $cpuData;
                $totalRam = $currentRam - $ramData;

                $queryUpdateEsxi = "UPDATE esxi SET CPU_CORES = $totalCpu, RAM = $totalRam WHERE ID = $ESXi";
                $sqlUpdateEsxi = mysqli_query($conn, $queryUpdateEsxi);
                if (!$sqlUpdateEsxi) {
                    die("Error");
                }
            }

            $queryGetStorageSize = "SELECT SIZE FROM tb_data_storage WHERE DATA_STORAGE LIKE '%$storage'";
            $sqlGetStorageSize = mysqli_query($conn, $queryGetStorageSize);
            $resultStorageSize = mysqli_fetch_array($sqlGetStorageSize);

            if ($resultStorageSize) {
                $currentSize = $resultStorageSize['SIZE'];

                $newSize = $currentSize - $memoriData;

                $queryUpdateStorage = "UPDATE tb_data_storage SET size = $newSize WHERE DATA_STORAGE LIKE '%$storage'";
                $sqlUpdateStorage = mysqli_query($conn, $queryUpdateStorage);

                if ($sqlUpdateStorage) {
                    header('Location: ../main/sistemDB.php');
                    exit();
                } else {
                    echo "Error updating storage size: " . mysqli_error($conn);
                }
            } else {
                // Handle error jika tidak ditemukan storage yang sesuai
                echo "Storage not found.";
            }
        } else {
            // Handle error jika insert server atau sistem DB gagal
            echo "Error inserting data: " . mysqli_error($conn);
        }
    }

    if ($_POST['server'] == 'network') {
        // var_dump($_POST);
        $ticket = $_POST['ticket'];
        $hostname = $_POST['hostname'];
        $openPort = $_POST['openPort'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $ipaddress = $_POST['ipaddress'];

        $queryInsertNetwork = "INSERT INTO tb_network VALUE('$ticket', NULL, '$hostname', '$openPort', '$username', '$password', '$ipaddress')";
        $sqlInsertNetwork = mysqli_query($conn, $queryInsertNetwork);

        $queryUpdateNetwork = "UPDATE tb_server SET HOSTNAME = '$hostname', OPEN_PORT = '$openPort', USERNAME = '$username', PASSWORD = '$password', IP_ADDRESS = '$ipaddress' WHERE NO_TICKET = '$ticket'";
        $sqlUpdateNetwork = mysqli_query($conn, $queryUpdateNetwork);

        if ($sqlInsertNetwork && $sqlUpdateNetwork) {
            header('Location: ../main/network.php');
        }
    }

    if ($_POST['server'] == 'edit') {
        $id_server = $_POST['id'];
        $ticket = $_POST['ticket'];
        $memori = $_POST['memori'];
        $ram = $_POST['ram'];
        $cpu = $_POST['cpu'];
        $storage = $_POST['storage'];
        $esxi = $_POST['esxi'];

        $memoriData = 0;
        $memoriData = ($memori == 1) ? 250 : (($memori == 2) ? 520 : (($memori == 3) ? 1024 : 0));
        $ramData = 0;
        $ramData = ($ram == 1) ? 1 : (($ram == 2) ? 2 : (($ram == 3) ? 4 : 0));
        $cpuData = 0;
        $cpuData = ($cpu == 1) ? 1 : (($cpu == 2) ? 2 : (($cpu == 3) ? 3 : 0));

        $queryServer = "SELECT * FROM tb_server WHERE ID_SERVER = '$id_server'";
        $sqlServer = mysqli_query($conn, $queryServer);
        $resultServer = mysqli_fetch_array($sqlServer);

        if($resultServer) {
            $currentMemori = $resultServer['TOTAL_MEMORI'];
            $currentRam = $resultServer['TOTAL_RAM'];
            $currentCpu = $resultServer['TOTAL_CPU'];
            $currentStorage = $resultServer['DATA_STORAGE'];
            $currentEsxi = $resultServer['ESXi'];

            $queryDS = "SELECT * FROM tb_data_storage WHERE DATA_STORAGE LIKE '%$currentStorage'";
            $sqlDS = mysqli_query($conn, $queryDS);
            $resultDS = mysqli_fetch_array($sqlDS);

            $queryEsxi = "SELECT * FROM esxi WHERE ID = $currentEsxi";
            $sqlEsxi = mysqli_query($conn, $queryEsxi);
            $resultEsxi = mysqli_fetch_array($sqlEsxi);

            $newMemori = $resultDS['SIZE'] + $currentMemori;
            $newCpu = $resultEsxi['CPU_CORES'] + $currentCpu;
            $newRam = $resultEsxi['RAM'] + $currentRam;

            // 98 + 2 = 100
            
            $sqlUpdateStorage2 = mysqli_query($conn, "UPDATE tb_data_storage SET SIZE = $newMemori WHERE DATA_STORAGE LIKE '%$currentStorage'");

            $sqlUpdateEsxi2 = mysqli_query($conn, "UPDATE esxi SET CPU_CORES = $newCpu, RAM = $newRam WHERE ID = $currentEsxi");
            // 100

            if($storage == $currentStorage) {
                $newMemori -= $memoriData;
                $sqlUpdateStorage2 = mysqli_query($conn, "UPDATE tb_data_storage SET SIZE = $newMemori WHERE DATA_STORAGE LIKE '%$storage'");

                $sqlUpdateServer = mysqli_query($conn, "UPDATE tb_server SET TOTAL_MEMORI = $memoriData WHERE ID_SERVER = $id_server");
            }
            else {
                $queryDS2 = "SELECT * FROM tb_data_storage WHERE DATA_STORAGE LIKE '%$storage'";
                $sqlDS2 = mysqli_query($conn, $queryDS2);
                $resultDS2 = mysqli_fetch_array($sqlDS2);

                $newMemori = $resultDS2['SIZE'] - $memoriData;

                $sqlUpdateStorage2 = mysqli_query($conn, "UPDATE tb_data_storage SET SIZE = $newMemori WHERE DATA_STORAGE LIKE '%$storage'");
                
                $sqlUpdateServer = mysqli_query($conn, "UPDATE tb_server SET TOTAL_MEMORI = $memoriData, DATA_STORAGE = $storage WHERE ID_SERVER = $id_server");
            }

            if ($esxi == $currentEsxi) {
                $newCpu -= $cpuData;
                $newRam -= $ramData;

                $sqlUpdateEsxi2 = mysqli_query($conn, "UPDATE esxi SET CPU_CORES = $newCpu, RAM = $newRam WHERE ID = $esxi");

                $sqlUpdateServer2 = mysqli_query($conn, "UPDATE tb_server SET TOTAL_CPU = $cpuData, TOTAL_RAM = $ramData WHERE ID_SERVER = $id_server");
            }
            else {
                $queryEsxi2 ="SELECT * FROM esxi WHERE ID = $esxi";
                $sqlEsxi2 = mysqli_query($conn, $queryEsxi2);
                $resultEsxi2 = mysqli_fetch_array($sqlEsxi2);

                $newCpu = $resultEsxi2['CPU_CORES'] - $cpuData;
                $newRam = $resultEsxi2['RAM'] - $ramData;

                $sqlUpdateEsxi2 = mysqli_query($conn, "UPDATE esxi SET CPU_CORES = $newCpu, RAM = $newRam WHERE ID = $esxi");

                $sqlUpdateServer2 = mysqli_query($conn, "UPDATE tb_server SET TOTAL_CPU = $cpuData, TOTAL_RAM = $ramData, ESXi = $esxi WHERE ID_SERVER = $id_server");
            }

            $sqlUpdateServer3 = mysqli_query($conn, "UPDATE tb_server SET NO_TICKET = '$ticket' WHERE ID_SERVER = $id_server");

            if ($sqlUpdateServer3) {
                header("Location: ../main/sistemDB.php");
            }
        }
        else {
            echo "Server tidak ditemukan";
        }

        
    }
}


elseif ($_POST['selesai']) {
    $ticket = $_POST['ticket'];

    $queryUpdate = "UPDATE tb_ticket SET STATUS ='Closed' WHERE NO_TICKET = '$ticket'";

    if (mysqli_query($conn, $queryUpdate)) {
        header("Location: ../main/user.php");
    } else {
        echo "Error";
    }
}

elseif (isset($_POST['edit'])) {
    $ticketGenerate = 1000;
    $ticketWithPrefix = 'ED-' . $ticketGenerate;

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


    $id_server = $_POST['id'];
    $nopeg = $_POST['nopeg'];
    $memori = $_POST['memori'];
    $ram =  $_POST['ram'];
    $cpu = $_POST['cpu'];

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $posisi = $_POST['posisi'];

    $memoriData = 0;
    $memoriData = ($memori == 1) ? 256 : (($memori == 2) ? 520 : (($memori == 3) ? 1024 : 0));
    $ramData = 0;
    $ramData = ($ram == 1) ? 1 : (($ram == 2) ? 2 : (($ram == 3) ? 4 : 0));
    $cpuData = 0;
    $cpuData = ($cpu == 1) ? 1 : (($cpu == 2) ? 2 : (($cpu == 3) ? 3 : 0));

    $query = "INSERT INTO tb_req_edit_server VALUES ('$ticket', '$id_server', '$nopeg', '$memoriData', '$ramData', '$cpuData')";
    $sql = mysqli_query($conn, $query);

    $queryInsertTicket = "INSERT INTO tb_ticket VALUES('$ticket', 'OPEN')";
    $sqlInsertTicket = mysqli_query($conn, $queryInsertTicket);

    $queryInsertAvp = "INSERT INTO tb_avp_response VALUES('$ticket', 'No Respon')";
    $sqlInsertAvp = mysqli_query($conn, $queryInsertAvp);

    $queryInsertPegawai = "INSERT INTO tb_pegawai VALUES('$ticket', '$nopeg', '$nama', '$username', '$password', '$email', '$posisi')";
    $sqlInsertPegawai = mysqli_query($conn, $queryInsertPegawai);

    if ($sql && $sqlInsertTicket && $sqlInsertAvp && $sqlInsertPegawai) {
        header('Location: ../main/console.php');
    }
}
