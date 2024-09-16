<?php
include 'connect.php';

$dataStorage = $_POST['data'];
$queryServer = "SELECT * FROM tb_server WHERE DATA_STORAGE = '$dataStorage'";
$sqlServer = mysqli_query($conn, $queryServer);

echo '
<table class="table table-dark table-hover">
    <thead class="table-dark">
        <th scope="col" style="text-align: center;">ID SERVER</th>
        <th scope="col" style="text-align: center;">TOTAL RAM</th>
        <th scope="col" style="text-align: center;">TOTAL MEMORI</th>
        <th scope="col" style="text-align: center;">TOTAL CPU</th>
        <th scope="col" style="text-align: center;">OS</th>
        <th scope="col" style="text-align: center;">ESXi</th>
    </thead>
    <tbody>
';
if (mysqli_num_rows($sqlServer) == 0) {
    echo '<tr>';
    echo '<td colspan = "7">Belum ada server yang dibuat!</td>';
    echo '</tr>';
}
else {
    while ($result = mysqli_fetch_array($sqlServer)) {
        echo '<tr?>';
        echo '<td>' . $result['ID_SERVER'] . '</td>';
        echo '<td>' . $result['TOTAL_RAM'] . ' Gb</td>';
        echo '<td>' . $result['TOTAL_MEMORI'] . ' Gb</td>';
        echo '<td>' . $result['TOTAL_CPU'] . ' Cores</td>';
        echo '<td>' . $result['OS'] . '</td>';
        echo '<td>' . $result['ESXi'] . '</td>';
        echo '</tr>';
    }
}
echo '</tbody>';
echo '</table>';