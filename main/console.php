<?php
session_start();
if (isset($_SESSION['no_peg'])) {
    // header("Location: login.php");
    $nopeg = $_SESSION['no_peg'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Console</title>
    <style>
        /* #table {
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
        } */

        .navbar {
            background-color: rgba(56, 132, 255, 0);
            z-index: 99;
            transition: all 0.3s ease-in-out;
        }

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

    $query = "SELECT peg.NO_TICKET, peg.NO_PEG, serv.* FROM tb_pegawai peg INNER JOIN tb_server serv ON peg.NO_TICKET = serv.NO_TICKET WHERE peg.NO_PEG = '$nopeg'";
    $sql = mysqli_query($conn, $query);

    ?>

    <nav class="navbar navbar-expand-lg navbar-light" style="position: sticky; top: 0; padding: 0;">
        <div class="container-fluid" style="padding: 7px;">
            <a class="navbar-brand" href="#" style="color: white;">ASET SERVER</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="user.php" class="nav-link">
                            <button class="btn btn-primary" type="button">Go to Client</button>
                        </a>
                        <!-- <form action="login.php" method="post">
                            <input type="hidden" name="user" value="user">
                            <button class="btn btn-primary" type="submit">Go to </button>
                        </form> -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- TABLE REQUEST SERVER -->
    <div id="table" class="container-fluid mt-5" style="width: 80%">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Hostname</th>
                    <th>Open Port</th>
                    <th>Username</th>
                    <th>Total Memori</th>
                    <th>Total RAM</th>
                    <th>Total CPU</th>
                    <th>OS</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($result = mysqli_fetch_array($sql)) :
                    $queryCheckServer = "SELECT serv.*, req.* FROM tb_server serv INNER JOIN tb_req_edit_server req ON serv.ID_SERVER = req.ID_SERVER WHERE serv.ID_SERVER = '{$result['ID_SERVER']}'";
                    $sqlCheckServer = mysqli_query($conn, $queryCheckServer);
                    $checkServer = mysqli_num_rows($sqlCheckServer);
                    $dataServer = mysqli_fetch_array($sqlCheckServer);

                    if ($dataServer) {
                        $sqlAvp = mysqli_query($conn, "SELECT NO_TICKET, RESPONSE FROM tb_avp_response WHERE NO_TICKET = '{$dataServer['NO_TICKET']}'");
                        $avpResponse = mysqli_fetch_array($sqlAvp);

                        $sqlRSC = mysqli_query($conn, "SELECT tb_server.NO_TICKET, tb_req_edit_server.NO_TICKET FROM tb_server INNER JOIN tb_req_edit_server ON tb_server.NO_TICKET = tb_req_edit_server.NO_TICKET WHERE tb_req_edit_server.NO_TICKET =  '{$dataServer['NO_TICKET']}'");

                        $sqlTicket = mysqli_query($conn, "SELECT * FROM tb_ticket WHERE NO_TICKET = '{$dataServer['NO_TICKET']}'");
                        $resultTicket = mysqli_fetch_array($sqlTicket);
                    }
                ?>
                    <tr class="text-white">
                        <td><?= $result['HOSTNAME']; ?></td>
                        <td><?= $result['OPEN_PORT']; ?></td>
                        <td><?= $result['USERNAME']; ?></td>
                        <td><?= $result['TOTAL_MEMORI']; ?> Gb</td>
                        <td><?= $result['TOTAL_RAM']; ?> Gb</td>
                        <td><?= $result['TOTAL_CPU']; ?> Cores</td>
                        <td><?= $result['OS']; ?></td>
                        <td style="display: flex; justify-content: space-evenly; align-items: center;">
                            <?php if ($checkServer) : ?>
                                <div class="container">
                                    <?php if ($resultTicket['STATUS'] == 'Closed') : ?>
                                        <a href="create_server.php?edit=<?= $result['ID_SERVER']; ?>&&nopeg=<?= $result['NO_PEG']; ?>" style="font-size: small;" class="btn btn-primary">EDIT</a>
                                    <?php elseif (mysqli_num_rows($sqlRSC) > 0) : ?>
                                        <p>Maintenance</p>
                                        <form action="../php/proses.php" method="post">
                                            <input type="hidden" id="ticket" name="ticket" value="<?= $result['NO_TICKET']; ?>">
                                            <button type="submit" name="close-ticket" id="btn-close-ticket" class="btn-review btn btn-success">Selesai</button>
                                        </form>
                                        <?php elseif ($avpResponse) :
                                        if ($avpResponse['RESPONSE'] == 'Accept') : ?>
                                            <p>Maintenance</p>
                                            <p class="bg-info rounded text-center" style="padding: 5px; margin-top: -10px;">Accept</p>
                                        <?php elseif ($avpResponse['RESPONSE'] == 'Reject') : ?>
                                            <p>Maintenance</p>
                                            <p class="bg-danger rounded text-center" style="padding: 5px; margin-top: -10px;">Reject</p>
                                        <?php else : ?>
                                            <p>Maintenance</p>
                                            <p class="bg-warning rounded text-center" style="padding: 5px; margin-top: -10px;">Waiting...</p>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            <?php else : ?>
                                <a href="create_server.php?edit=<?= $result['ID_SERVER']; ?>&&nopeg=<?= $result['NO_PEG']; ?>" style="font-size: small;" class="btn btn-primary">EDIT</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script>
        let ticket = document.getElementById('ticket').value;

        document.getElementById('btn-close-ticket').addEventListener('click', function() {
            console.log("Button ditekan");
            const ajax3 = new XMLHttpRequest();
            ajax3.open('POST', '../php/email_handler.php', true);
            ajax3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax3.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            }
            ajax3.send("close-ticket=true&&ticket=" + ticket);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>