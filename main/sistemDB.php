<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #1a1a2e;
            color: #e6e6e6;
            margin: 0;
            padding: 0;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #002c61;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            padding: 10px 20px;
            z-index: 1000;
        }

        .navbar-brand {
            color: #00ffff !important;
            font-weight: bold;
            text-shadow: 0 0 5px #00ffff;
        }

        .navbar-toggler {
            border-color: #00ffff;
        }

        .navbar-toggler-icon {
            background-color: #00ffff;
        }

        .nav-link .btn {
            background: linear-gradient(145deg, #ff8c00, #ffcc00);
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            color: #1a1a2e;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .nav-link .btn:hover {
            /* background-color: #004080; */
            transform: scale(1.1);
            background: linear-gradient(145deg, #ffcc00, #ff8c00);
        }

        /* Main Content Styles */
        .main {
            margin-top: 20px;
        }

        .h2 {
            color: #00ffff;
            text-shadow: 0 0 5px #00ffff;
        }

        /* Card Styles */
        .card {
            background: #002c61;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            cursor: pointer;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 191, 255, 0.8);
        }

        .card-title {
            color: #00ffff;
            text-shadow: 0 0 5px #00ffff;
        }

        .card-text {
            color: #e6e6e6;
        }

        /* Table Styles */
        .table {
            background: #1a1a2e;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .table th,
        .table td {
            text-align: center;
            color: #e6e6e6;
        }

        .table-hover tbody tr:hover {
            background-color: #004080;
        }

        .table-info {
            background-color: #00ffff;
            color: #1a1a2e;
        }

        /* Chart Card Styles */
        .card-body h5 {
            color: #00ffff;
            text-shadow: 0 0 5px #00ffff;
        }

        .chart-container {
            position: relative;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <?php
    include '../php/connect.php';

    $query = 'SELECT tb_request_server.NO_TICKET, tb_pegawai.NAMA_PEGAWAI, tb_pegawai.NO_PEG, tb_request_server.* FROM tb_pegawai INNER JOIN tb_request_server WHERE tb_pegawai.NO_PEG = tb_request_server.NO_PEG';
    $sql = mysqli_query($conn, $query);

    $queryAvpAcc = "SELECT (RESPONSE) FROM tb_avp_response WHERE RESPONSE = 'Accept'";
    $sqlAvpAcc = mysqli_query($conn, $queryAvpAcc);
    $jumlahRequest = mysqli_num_rows($sqlAvpAcc);

    $queryTicket = "SELECT STATUS FROM tb_ticket WHERE STATUS = 'Closed'";
    $sqlTicket = mysqli_query($conn, $queryTicket);
    $jumlahTicket = mysqli_num_rows($sqlTicket);

    // Ambil data dari tb_data_storage
    $queryDataStorage = 'SELECT * FROM tb_data_storage';
    $sqlDataStorage = mysqli_query($conn, $queryDataStorage);

    // Ambil data untuk error types chart dari tb_data_storage
    // $dataStorage_query = 'SELECT DATA_STORAGE, SIZE FROM tb_data_storage';
    // $error_sql = mysqli_query($conn, $error_query);
    $storage_data = [];
    while ($row = mysqli_fetch_assoc($sqlDataStorage)) {
        $storage_data[] = $row;
    }

    // Konversi data storage ke JSON
    $json_storage_data = json_encode($storage_data);
    ?>

    <nav class="navbar navbar-expand-lg navbar-light" style="position: sticky; top: 0; padding: 0;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html" style="color: white;">ASET SERVER</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="create_server.php" class="nav-link">
                            <button class="btn btn-primary" type="button">Create Server</button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Main content -->
            <main role="main" class="col-md col-lg-12 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Sistem Database</h1>
                </div>

                <!-- Cards -->
                <div class="row">
                    <div id="request" class="col-md-3">
                        <div class="request card text-center">
                            <div class="card-body">
                                <h5 class="card-title">REQUEST</h5>
                                <p class="card-text"><?= $jumlahRequest; ?></p>
                            </div>
                        </div>
                    </div>
                    <div id="report" class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">REQUEST SELESAI</h5>
                                <p class="card-text"><?= $jumlahTicket; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">DATA STORAGE</h5>
                                <p class="card-text">###</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">COMING SOON</h5>
                                <p class="card-text">###</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table container-fluid" style="margin-top: 100px;">
                    <div class="row">
                        <div class="col-md-7">
                            <table class="table table-dark table-hover">
                                <thead class="table-dark">
                                    <th scope="col" style="text-align: center;">Storage</th>
                                    <th scope="col" style="text-align: center;">Size(GB)</th>
                                    <th scope="col" style="text-align: center;"></th>
                                </thead>
                                <tbody>
                                    <?php
                                    mysqli_data_seek($sqlDataStorage, 0);
                                    $viewStorage = 0;
                                    while ($result = mysqli_fetch_array($sqlDataStorage)) :
                                        $viewStorage++;
                                    ?>
                                        <tr>
                                            <td><?= $result[0]; ?></td>
                                            <td><?= $result[1]; ?> Gb</td>
                                            <td>
                                                <form action="sistemDB.php" method="post">
                                                    <input type="hidden" id="dataStorage" name="dataStorage" value="<?= $viewStorage; ?>">
                                                    <button data-index="<?= $viewStorage; ?>" name="data" type="submit" class="btn btn-outline-primary px-2 viewStorage" style="padding: 1px;">&#9664;</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    endwhile;
                                    ?>
                                </tbody>
                            </table>

                            <div id="detailStorage" style="background-color: #ffcc00; display: none;">
                                <!-- <?php
                                if (isset($_POST['data'])) {
                                    $data = $_POST['data'];
                                    // Lakukan sesuatu dengan $data
                                    echo "Data diterima: $data";
                                } else {
                                    echo "Data belum ada";
                                    var_dump($_POST); 
                                }
                                $queryServer = "SELECT * FROM tb_server WHERE DATA_STORAGE = '$data'";
                                $sqlServer = mysqli_query($conn, $queryServer);
                                $jumlah = mysqli_num_rows($sqlServer);
                                if ($jumlah != 0) {
                                ?>
                                    <table class="table table-dark table-hover">
                                        <thead class="table-dark">
                                            <th scope="col" style="text-align: center;">NO TICKET</th>
                                            <th scope="col" style="text-align: center;">TOTAL RAM</th>
                                            <th scope="col" style="text-align: center;">TOTAL MEMORI</th>
                                            <th scope="col" style="text-align: center;">TOTAL CPU</th>
                                            <th scope="col" style="text-align: center;">TOTAL MEMORI</th>
                                            <th scope="col" style="text-align: center;">OS</th>
                                            <th scope="col" style="text-align: center;">ESXi</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($result = mysqli_fetch_assoc($sqlServer)) {
                                            ?>
                                                <tr>
                                                    <td><?= $result['ID_SERVER']; ?></td>
                                                    <td><?= $result['TOTAL_RAM']; ?></td>
                                                    <td><?= $result['TOTAL_MEMORI']; ?></td>
                                                    <td><?= $result['TOTAL_CPU']; ?></td>
                                                    <td><?= $result['TOTAL_MEMORI']; ?></td>
                                                    <td><?= $result['OS']; ?></td>
                                                    <td><?= $result['ESXi']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                <?php
                                } else {
                                ?>
                                    <div>Data belum ada</div>
                                <?php
                                }
                                ?> -->
                            </div>
                        </div>

                        <div class="diagram-donat col-md-5 ms-auto" style="width: 35%;">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Data Storage</h5>
                                    <canvas id="storageChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Charts -->
                        <!-- <div class="row mt-4">
                            <div class="col-md-8">
                                <canvas id="loadTimeChart"></canvas>
                            </div>
                        </div> -->
                    </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let indexDump = 0;
        document.querySelectorAll('.viewStorage').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                let index = this.getAttribute('data-index');
                let detail = document.getElementById('detailStorage');

                if (detail.style.display === 'block' && index == indexDump) {
                    detail.style.display = 'none';
                } else {
                    detail.style.display = 'block';
                }

                const ajax = new XMLHttpRequest()
                ajax.open('POST', '../php/list_storage_handler.php', true)
                ajax.setRequestHeader('Content-Type', "application/x-www-form-urlencoded")
                ajax.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200) {
                        detail.innerHTML = this.responseText;
                        console.log(this.responseText);
                    }
                }
                ajax.send("data=" + index);
                indexDump = index;
                // console.log(dataBtn)
            });
        });
    </script>
    <script>
        document.getElementById('request').addEventListener('click', function() {
            window.location.href = 'request-page.php';

        });

        document.getElementById('report').addEventListener('click', function() {
            window.location.href = 'sistemDB_report.php';

        });
    </script>

    <script>
        // var ctx = document.getElementById('loadTimeChart').getContext('2d');
        // var loadTimeChart = new Chart(ctx, {
        //     type: 'line',
        //     data: {
        //         labels: ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00'],
        //         datasets: [{
        //             label: 'Load Time',
        //             data: [3.0, 2.5, 3.5, 4.0, 3.0, 2.0],
        //             backgroundColor: 'rgba(54, 162, 235, 0.2)',
        //             borderColor: 'rgba(54, 162, 235, 1)',
        //             borderWidth: 1
        //         }]
        //     },
        //     options: {
        //         scales: {
        //             y: {
        //                 beginAtZero: true
        //             }
        //         }
        //     }
        // });

        // Storage Chart
        var storageData = <?php echo $json_storage_data; ?>;
        var storageLabels = storageData.map(function(item) {
            return item.DATA_STORAGE;
        });
        var storageSizes = storageData.map(function(item) {
            return item.SIZE;
        });

        var ctx2 = document.getElementById('storageChart').getContext('2d');
        var storageChart = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: storageLabels,
                datasets: [{
                    label: 'Storage Sizes',
                    data: storageSizes,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/user.js"></script>
</body>

</html>