<?php
include 'connect.php';
$ticketGenerate = 1000;
$query = "SELECT NO_TICKET FROM tb_request_server WHERE NO_TICKET = $ticketGenerate";
$sql = mysqli_query($conn, $query);
$jumlah = mysqli_num_rows($sql);

while ($jumlah > 0) {
    $ticketGenerate += 1;
    $query = "SELECT NO_TICKET FROM tb_request_server WHERE NO_TICKET = $ticketGenerate";
    $sql = mysqli_query($conn, $query);
    $jumlah = mysqli_num_rows($sql);
}
$ticket = $ticketGenerate;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $memori = $_POST['memori'];
    $ram =  $_POST['ram'];
    $cpu = $_POST['cpu'];
}

$queryInsert = "INSERT INTO tb_request_server VALUES ('$ticket', 'NULL', 'NULL', 'NULL','NULL', 'NULL', 'NULL')";
$sqlInsert = mysqli_query($conn, $queryInsert);

echo $ticket;
echo $memori;
echo $ram;
echo $cpu;
