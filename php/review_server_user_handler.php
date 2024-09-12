<?php
include 'connect.php';

$ticket = $_POST['ticket'];
$query = "SELECT * FROM tb_server WHERE NO_TICKET = '$ticket'";
$sql = mysqli_query($conn, $query);
$result = mysqli_fetch_array($sql);

echo '
<div id="detail" class="detail container-fluid">
    <div class = "row">
        <div class="col-md-6">
            <h6 id="ticket-review">' . $result['NO_TICKET'] . '</h6>
            <p><i class="fas fa-user" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i> Hostname: ' . $result['HOSTNAME'] . '</p>
            <p><i class="fas fa-network-wired" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i> Open Port ' . $result['OPEN_PORT'] . '</p>
            <p><i class="fas fa-user-circle" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i> Username: ' . $result['USERNAME'] . '</p>
            <p><i class="fas fa-envelope" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i> IP Address: ' . $result['IP_ADDRESS'] . '</p>
            <p><i class="fas fa-briefcase" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i> OS: ' . $result['OS'] . '</p>
        </div>
        <div class="col-md-6">
            <p><i class="fas fa-memory" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i> Total Memori: ' . $result['TOTAL_MEMORI'] . ' Gb</p>
            <p><i class="fas fa-microchip" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i> Total RAM: ' . $result['TOTAL_RAM'] . ' Gb</p>
            <p><i class="fas fa-microchip" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i> Total CPU: ' . $result['TOTAL_CPU'] . ' Cores</p>
        </div>
    </div>';

echo '<form action = "../php/proses.php" method = "POST">';
echo '<input type = "hidden" name="ticket" value=' . $result['NO_TICKET'] . '>';
echo '<button id="btn-close-ticket" type="submit" name="selesai" value="selesai" class="btn btn-primary">Selesai</button>';
echo '</form>';