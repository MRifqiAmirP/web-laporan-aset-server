<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Network</title>
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

    $queryReqServer = "
    SELECT req.NO_TICKET, peg.NAMA_PEGAWAI, peg.NO_PEG, req.INTERNET, req.OPEN_PORT, req.OS
    FROM tb_request_server req
    INNER JOIN tb_server serv ON req.NO_TICKET = serv.NO_TICKET
    INNER JOIN tb_pegawai peg ON peg.NO_TICKET = req.NO_TICKET";
    $sqlReqServer = mysqli_query($conn, $queryReqServer);
    $jumlahReqServer = mysqli_num_rows($sqlReqServer);

    $queryServer = "SELECT ticket.*, net.* FROM tb_ticket ticket INNER JOIN tb_network net ON ticket.NO_TICKET = net.NO_TICKET WHERE ticket.STATUS = 'Closed'";
    $sqlServer = mysqli_query($conn, $queryServer);
    $jumlahServer = mysqli_num_rows($sqlServer);
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
                    <h1 class="h2">Network</h1>
                </div>

                <!-- Cards -->
                <div class="row">
                    <div id="request" class="col-md-3">
                        <div class="request card text-center">
                            <div class="card-body">
                                <h5 class="card-title">REQUEST</h5>
                                <p class="card-text"><?= $jumlahReqServer; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">REQUEST SELESAI</h5>
                                <p class="card-text"><?php echo htmlspecialchars($jumlahServer); ?></p>
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
                    </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.querySelectorAll('.viewStorage').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                let index = this.getAttribute('data-index');
                let text = document.getElementById('name');
                let data = document.getElementById('dataStorageSpan');
                let detail = document.getElementById('detailStorage');
                console.log("Index sebelum pengiriman: " + index);

                if (detail.style.display === 'block' && text.innerHTML === "data storage " + index) {
                    detail.style.display = 'none';
                } else {
                    detail.style.display = 'block';
                    text.innerHTML = "data storage " + index;
                    data.innerHTML = index;

                    // let xhr = new XMLHttpRequest();
                    // let dataStorage = new FormData();
                    // dataStorage.append('dataStorage', 4);

                    // console.log("Data yang dikirim:", dataStorage.get('dataStorage'));

                    // xhr.open('POST', 'sistemDB.php', true);
                    // xhr.onload = function() {
                    //     if (xhr.status === 200) {
                    //         console.log("AJAX request completed with status: " + xhr.status);
                    //         // console.log(xhr.responseText);
                    //     } else {
                    //         console.log("AJAX request failed with status: " + xhr.status);
                    //     }
                    // };
                    // xhr.onerror = function() {
                    //     console.log("Request failed");
                    // };
                    // xhr.send(dataStorage);
                    // console.log("Send berhasil");
                }

                fetch('sistemDB.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: new URLSearchParams({
                            'dataStorage': index
                        })
                    })
                    .then(response => response.text())
                    .then(data => {
                        console.log("Data yang diterima dari server: " + index);
                    })
                    .catch(error => {
                        console.error(error);
                    })
            });
        });
    </script>
    <script>
        document.getElementById('request').addEventListener('click', function() {
            window.location.href = 'request_network.php';

        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/user.js"></script>
</body>

</html>