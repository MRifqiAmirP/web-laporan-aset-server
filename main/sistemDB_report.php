<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>REQUEST PAGE</title>
    <style>
        /* #table {
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
        } */

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #1a1a2e;
            color: #e6e6e6;
            margin: 0;
            padding: 0;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        /* Table Styles */
        #table {
            width: 80%;
            margin: 5% auto;
            padding: 20px;
            background: #002c61;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        .table {
            color: #e6e6e6;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table thead {
            background-color: #004080;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #003366;
        }

        .table-striped tbody tr:nth-of-type(even) {
            background-color: #001f4d;
        }

        .table-hover tbody tr:hover {
            background-color: #004080;
        }

        .btn {
            border: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 0.875rem;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-info {
            background-color: #17a2b8;
        }

        .btn-info:hover {
            background-color: #138496;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            #table {
                width: 100%;
                margin: 0;
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <?php
    include '../php/connect.php';

    $queryAvp = 'SELECT * FROM tb_avp_response';
    $sqlAvp = mysqli_query($conn, $queryAvp);

    $queryReqServer = 'SELECT tb_request_server.NO_TICKET, tb_pegawai.NAMA_PEGAWAI, tb_pegawai.NO_PEG, tb_request_server.* FROM tb_pegawai INNER JOIN tb_request_server WHERE tb_pegawai.NO_TICKET = tb_request_server.NO_TICKET';
    $sqlReqServer = mysqli_query($conn, $queryReqServer);

    $queryReqEdit = "SELECT req_edit.NO_TICKET, peg.NAMA_PEGAWAI, peg.NO_PEG, req_edit.* FROM tb_pegawai peg INNER JOIN tb_req_edit_server req_edit ON peg.NO_TICKET = req_edit.NO_TICKET";
    $sqlReqEdit = mysqli_query($conn, $queryReqEdit);
    ?>

    <!-- TABLE REQUEST SERVER -->
    <div id="table" class="container-fluid mt-5" style="width: 80%">
        <h3>Table Create Server</h3>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No. Ticket</th>
                    <th>Nama</th>
                    <th>No. Pegawai</th>
                    <th>Total Memori</th>
                    <th>Total RAM</th>
                    <th>Total CPU</th>
                    <th>OS</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($result = mysqli_fetch_array($sqlReqServer)) :
                    $sqlTicket = mysqli_query($conn, "SELECT tb_ticket.*, tb_request_server.* FROM tb_ticket INNER JOIN tb_request_server ON tb_ticket.NO_TICKET = tb_request_server.NO_TICKET WHERE tb_ticket.NO_TICKET = '{$result['NO_TICKET']}'");
                    $resultTicket = mysqli_fetch_array($sqlTicket);
                    if ($resultTicket['STATUS'] == 'Closed') :
                ?>
                        <tr class="text-white">
                            <td><?= $result[0]; ?></td>
                            <td><?= $result[1]; ?></td>
                            <td><?= $result[2]; ?></td>
                            <td><?= $result[5]; ?> Gb</td>
                            <td><?= $result[6]; ?> Gb</td>
                            <td><?= $result[7]; ?> Cores</td>
                            <td><?= $result[10]; ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h3 class="mt-5">Table Edit Server</h3>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No. Ticket</th>
                    <th>Nama</th>
                    <th>No. Pegawai</th>
                    <th>ID Server</th>
                    <th>Total Memori</th>
                    <th>Total RAM</th>
                    <th>Total CPU</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($resultEdit = mysqli_fetch_array($sqlReqEdit)) :
                    $sqlTicket = mysqli_query($conn, "SELECT tb_ticket.*, tb_req_edit_server.* FROM tb_ticket INNER JOIN tb_req_edit_server ON tb_ticket.NO_TICKET = tb_req_edit_server.NO_TICKET WHERE tb_ticket.NO_TICKET = '{$resultEdit['NO_TICKET']}'");
                    $resultTicket = mysqli_fetch_array($sqlTicket);
                    if ($resultTicket['STATUS'] == 'Closed') :
                ?>
                        <tr class="text-white">
                            <td><?= $resultEdit['NO_TICKET']; ?></td>
                            <td><?= $resultEdit['NAMA_PEGAWAI']; ?></td>
                            <td><?= $resultEdit['NO_PEG']; ?></td>
                            <td><?= $resultEdit['ID_SERVER']; ?></td>
                            <td><?= $resultEdit['TOTAL_MEMORI']; ?> Gb</td>
                            <td><?= $resultEdit['TOTAL_RAM']; ?> Gb</td>
                            <td><?= $resultEdit['TOTAL_CPU']; ?> Cores</td>
                        </tr>

                <?php endif;
                endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>