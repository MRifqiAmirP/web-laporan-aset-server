<?php
include '../php/connect.php';

$nopeg = $_POST['nopeg'];
$password = $_POST['password'];

$queryRequest = "SELECT * FROM tb_request_server WHERE NO_PEG = '$nopeg'";
$sqlRequest = mysqli_query($conn, $queryRequest);

$queryCheckPass = "SELECT PASSWORD FROM tb_pegawai WHERE NO_PEG = '$nopeg' AND PASSWORD = '$password'";
$sqlCheckPass =  mysqli_query($conn, $queryCheckPass);

if (mysqli_num_rows($sqlCheckPass) != 0) {
    echo ('
    <div id="table" class="container-fluid mt-5" style="width: 80%">
        <table class="table table-striped table-hover">
            <thead class="bg-primary">
                <tr>
                    <th>No. Ticket</th>
                    <th>No. Pegawai</th>
                    <th>Total Memori</th>
                    <th>Total RAM</th>
                    <th>Total CPU</th>
                    <th>Internet</th>
                    <th>Open Port</th>
                    <th>OS</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
    ');

    if (mysqli_num_rows($sqlRequest) == 0) {
        echo '
        <tr class="text-white">
            <td colspan = "8">Data tidak ditemukan</td>
        </tr>
        ';
    } else {
        $hasOpenTickets = false;

        while ($result = mysqli_fetch_array($sqlRequest)) {
            $queryAvp = "SELECT * FROM tb_avp_response WHERE NO_TICKET = '{$result['NO_TICKET']}'";
            $sqlAvp = mysqli_query($conn, $queryAvp);
            $resultAvp = mysqli_fetch_array($sqlAvp);

            $queryServer = "SELECT * FROM tb_server WHERE NO_TICKET = '{$result['NO_TICKET']}' AND HOSTNAME IS NOT NULL";
            $sqlServer = mysqli_query($conn, $queryServer);
            $resultServer = mysqli_fetch_array($sqlServer);

            $queryTicket = "SELECT * FROM tb_ticket WHERE NO_TICKET = '{$result['NO_TICKET']}' AND STATUS = 'Closed'";
            $sqlTicket = mysqli_query($conn, $queryTicket);
            $resultTicket = mysqli_fetch_array($sqlTicket);

            if (!$resultTicket) {
                $hasOpenTickets = true;

                echo '
                    <tr class="text-white">
                    <td>' . $result['NO_TICKET'] . '</td>
                    <td>' . $result['NO_PEG'] . '</td>
                    <td>' . $result['TOTAL_MEMORI'] . ' Gb</td>
                    <td>' . $result['TOTAL_RAM'] . ' Gb</td>
                    <td>' . $result['TOTAL_CPU'] . ' Cores</td>
                    <td>' . $result['INTERNET'] . '</td>
                    <td>' . $result['OPEN_PORT'] . '</td>
                    <td>' . $result['OS'] . '</td>
                    <td style="display: flex; justify-content: space-evenly; align-items: center;">
                    ';

                if ($resultServer) {
                    echo '<form action="" method="post">
                        <input type="hidden" id="ticket" name="ticket" value="' . $result['NO_TICKET'] . '">
                        <button type="button" id="review" class="btn-review btn btn-info">Review</button>
                    </form>';
                } elseif ($resultAvp['RESPONSE'] == 'Accept') {
                    echo '<p class="bg-success p-1 rounded">Accept AVP</p>';
                } elseif ($resultAvp['RESPONSE'] == 'Reject') {
                    echo '<p class="bg-danger p-1 rounded">Reject AVP</p>';
                } else {
                    echo '<p class="bg-warning p-1 rounded">Waiting...</p>';
                }
                echo '</td></tr>';
            }
        }

        // Jika tidak ada tiket open, tampilkan pesan "Data tidak ditemukan"
        if (!$hasOpenTickets) {
            echo '
                <tr class="text-white text-center">
                    <td colspan="9">Data tidak ditemukan</td>
                </tr>
                ';
        }

        // while ($result = mysqli_fetch_array($sqlRequest)) {
        //     $queryAvp = "SELECT * FROM tb_avp_response WHERE NO_TICKET = '{$result['NO_TICKET']}'";
        //     $sqlAvp = mysqli_query($conn, $queryAvp);
        //     $resultAvp = mysqli_fetch_array($sqlAvp);

        //     $queryServer = "SELECT * FROM tb_server WHERE NO_TICKET = '{$result['NO_TICKET']}' AND HOSTNAME IS NOT NULL";
        //     $sqlServer = mysqli_query($conn, $queryServer);
        //     $resultServer = mysqli_fetch_array($sqlServer);

        //     $queryTicket = "SELECT * FROM tb_ticket WHERE NO_TICKET = '{$result['NO_TICKET']}'";
        //     $sqlTicket = mysqli_query($conn, $queryTicket);
        //     $resultTicket = mysqli_fetch_array($sqlTicket);

        //     if (!$resultTicket) {
        //         echo '
        //         <tr class="text-white">
        //             <td>' . $result['NO_TICKET'] . '</td>
        //             <td>' . $result['NO_PEG'] . '</td>
        //             <td>' . $result['TOTAL_MEMORI'] . ' Gb</td>
        //             <td>' . $result['TOTAL_RAM'] . ' Gb</td>
        //             <td>' . $result['TOTAL_CPU'] . ' Cores</td>
        //             <td>' . $result['INTERNET'] . '</td>
        //             <td>' . $result['OPEN_PORT'] . '</td>
        //             <td>' . $result['OS'] . '</td>
        //         <td style="display: flex; justify-content: space-evenly; align-items: center;">
        //         ';

        //         if ($resultServer) {
        //             echo '<form action="" method="post">
        //                         <input type="hidden" id="ticket" name="ticket" value="' . $result['NO_TICKET'] . '">
        //                         <button type="button" id="review" class="btn-review btn btn-info">Review</button>
        //                         <!-- <button type="submit" name="selesai" value="selesai" class="btn btn-primary">Selesai</button> -->
        //                     </form>';
        //         } elseif ($resultAvp['RESPONSE'] == 'Accept') {
        //             echo '<p class="bg-success p-1 rounded">Accept AVP</p>';
        //         } elseif ($resultAvp['RESPONSE'] == 'Reject') {
        //             echo '<p class="bg-danger p-1 rounded">Reject AVP</p>';
        //         } else {
        //             echo '<p class="bg-warning p-1 rounded">Waiting...</p>';
        //         }
        //         echo '</td></tr>';
        //     }

        //     else {
        //         echo '
        //         <tr class="text-white text-center">
        //             <td colspan="9">Data tidak ditemukan</td>
        //         </tr>
        //         ';
        //     }
        // }
    }
    echo '</tbody>
        </table>
        </div>';
} else {
    echo '
        <p?>Data tidak ditemukan!</p>
        ';
}
