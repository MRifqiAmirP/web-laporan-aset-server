<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>AVP</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #1a1a2e;
            color: #e6e6e6;
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .blur {
            filter: blur(5px);
            transition: filter 0.3s;
        }

        .card {
            background: linear-gradient(145deg, #2a2a40, #1a1a2e);
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.25), 0 6px 6px rgba(0, 0, 0, 0.22);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4), 0 10px 10px rgba(0, 0, 0, 0.22);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            color: #ffcc00;
        }

        .card-subtitle {
            font-size: 1rem;
            color: #b3b3b3;
        }

        .card-text {
            font-size: 1rem;
            margin-bottom: 15px;
        }

        .btn-primary {
            background: linear-gradient(145deg, #ff8c00, #ffcc00);
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            color: #1a1a2e;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(145deg, #ffcc00, #ff8c00);
        }

        /* Add responsive design */
        @media (max-width: 576px) {
            .card {
                width: 100%;
                margin: 10px 0;
            }
        }

        /* Sidebar Styles */
        .sidebar {
            background-color: #002c61;
            height: 97vh;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
            position: sticky;
        }

        .sidebar a {
            display: block;
            color: #e6e6e6;
            padding: 15px 20px;
            text-decoration: none;
            font-size: 1rem;
            transition: background 0.3s, color 0.3s;
        }

        .sidebar a:hover {
            background-color: #004080;
            color: #00ffff;
            text-shadow: 0 0 5px #00ffff;
            border-left: 4px solid #00ffff;
        }

        .sidebar a:not(:last-child) {
            border-bottom: 1px solid #004080;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                float: left;
            }

            .sidebar a {
                text-align: center;
                float: none;
            }
        }

        /* Detail Popup Styles */
        .detail {
            display: none;
            background-color: rgba(0, 44, 97, 0.95);
            color: #e6e6e6;
            width: 70%;
            height: 50%;
            position: absolute;
            top: 100px;
            left: 15%;
            z-index: 999;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 44, 97, 0.8);
            transition: all 0.3s ease;
        }

        .detail h6 {
            color: #00ffff;
            font-weight: bold;
            text-shadow: 0 0 5px #00ffff;
            margin-bottom: 20px;
        }

        .detail p {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        .detail p i {
            margin-right: 10px;
            color: #00ffff;
            font-size: 1.5rem;
            /* Larger icon size */
        }

        .detail .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .detail .col-md-6 {
            flex: 0 0 48%;
        }

        .detail .col-md-6 h6,
        .detail .col-md-6 p {
            text-align: left;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .btn-container button {
            margin: 0 10px;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-accept {
            background-color: #28a745;
            color: white;
        }

        .btn-accept:hover {
            background-color: #218838;
        }

        .btn-reject {
            background-color: #dc3545;
            color: white;
        }

        .btn-reject:hover {
            background-color: #c82333;
        }

        .btn-cancel {
            background-color: #6c757d;
            color: white;
        }

        .btn-cancel:hover {
            background-color: #5a6268;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .detail {
                width: 90%;
                left: 5%;
                top: 50px;
            }

            .detail .col-md-6 {
                flex: 0 0 100%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body style="max-width: 100%; overflow-x: hidden;">
    <?php
    include '../php/connect.php';

    // $queryServer = "SELECT * FROM tb_server";
    // $sqlServer = mysqli_query($conn, $queryServer);
    // if (!$sqlServer) {
    //     die("Query failed: " . mysqli_error($connection));
    // }

    $queryServer = "SELECT * FROM tb_server";
    $sqlServerOriginal = mysqli_query($conn, $queryServer);
    if (!$sqlServerOriginal) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Simpan hasil query asli ke dalam array
    $sqlServerResults = [];
    while ($row = mysqli_fetch_array($sqlServerOriginal)) {
        $sqlServerResults[] = $row;
    }

    $queryAvp = 'SELECT * FROM tb_avp_response';
    $sqlAvp = mysqli_query($conn, $queryAvp);

    $indexBtn = 0;

    $query = 'SELECT tb_pegawai.*, tb_request_server.* FROM tb_pegawai INNER JOIN tb_request_server WHERE tb_pegawai.NO_TICKET = tb_request_server.NO_TICKET';
    $sql = mysqli_query($conn, $query);
    ?>
    <div id="main" class="row" style="height: inherit">
        <div class="sidebar col-md-2" style="height: 100%;">
            <a href="#" style="background-color: #004080; color: #00ffff; text-shadow: 0 0 5px #00ffff; border-left: 4px solid #00ffff;"><i class="fas fa-server" style="margin-right: 10px;"></i>Request Buat Server</a>
            <a href="avp_edit.php"><i class="fas fa-edit" style="margin-right: 10px;"></i>Request Edit Server</a>
            <a href="avp_report.php"><i class="fas fa-file-alt" style="margin-right: 10px;"></i>Laporan Request</a>
            <a href="index.html" style="position: absolute; bottom: 0;"><i class="fas fa-sign-out-alt" style="margin-right: 10px;"></i>Go To Dashboard</a>
        </div>
        <div class="col-md-10">
            <div class="row justify-content-center">
                <?php
                $indexBtn = 0; // Inisialisasi indexBtn
                $indexReview = 0;
                while ($result = mysqli_fetch_array($sql)) :
                    $queryServer = "SELECT NO_TICKET FROM tb_server WHERE NO_TICKET = '$result[0]' AND HOSTNAME != ''";
                    $sqlServer = mysqli_query($conn, $queryServer);
                    $dataJumlahServer = mysqli_num_rows($sqlServer);
                    $resultAvp = mysqli_fetch_array($sqlAvp);
                    $indexBtn++; ?>
                    <div class="card content-card" style="width: 18rem; margin-right: 20px; margin-top: 20px;">
                        <div class="card-body" style="display: flex; flex-direction: column; justify-content: space-between;">
                            <div>
                                <h5 class="card-title">Buat Server Baru</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= $result[0]; ?></h6>
                                <p class="card-text">Nama: <?= $result[2]; ?></p>
                                <p class="card-text" style="margin-top: -20px;">No. Pegawai: <?= $result[1]; ?></p>
                                <p class="card-text" style="margin-top: -20px;">Username: <?= $result[3]; ?></p>
                                <p class="card-text" style="margin-top: -20px;">Email: <?= $result[5]; ?></p>
                                <p class="card-text" style="margin-top: -20px;">Posisi: <?= $result[6]; ?></p>
                            </div>
                            <?php if ($resultAvp[1] == 'Accept' && $dataJumlahServer == 0) { ?>
                                <div>
                                    <button class="btn btn-info detail-btn" type="button" data-index="<?= $indexBtn; ?>">
                                        Proses
                                    </button>
                                </div>
                            <?php
                            } elseif ($resultAvp[1] == 'Reject') {
                            ?>
                                <div>
                                    <div class="bg-danger col-5 text-center" style="border-radius: 5px; padding: 8px;">Reject</div>
                                </div>
                            <?php } elseif ($dataJumlahServer == 1) {
                                $indexReview++; ?>
                                <div class="row justify-content-center">
                                    <div class="bg-success col-5 text-center" style="border-radius: 5px; padding: 8px;">Selesai</div>
                                    <button class="btn btn-info ms-1 col-5 review-btn" type="button" data-index="<?= $indexReview; ?>">
                                        Review
                                    </button>
                                </div>
                            <?php } else { ?>
                                <div>
                                    <button class="btn btn-primary detail-btn" type="button" data-index="<?= $indexBtn; ?>">
                                        Lihat detail
                                    </button>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>


    <?php
    $indexBtn = 0;
    mysqli_data_seek($sql, 0);
    mysqli_data_seek($sqlAvp, 0);
    while ($result = mysqli_fetch_array($sql)) :
        $resultAvp = mysqli_fetch_array($sqlAvp);
        $indexBtn++; ?>
        <div id="detail<?= $indexBtn; ?>" class="detail container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h6><?= $result[0]; ?></h6>
                    <p><i class="fas fa-user"></i>Nama: <?= $result[2]; ?></p>
                    <p><i class="fa-sharp-duotone fa-solid fa-id-card"></i>No. Pegawai: <?= $result[1]; ?></p>
                    <p><i class="fas fa-user-circle"></i>Username: <?= $result[3]; ?></p>
                    <p><i class="fas fa-envelope"></i>Email: <?= $result[5]; ?></p>
                    <p><i class="fas fa-briefcase"></i>Posisi: <?= $result[6]; ?></p>
                </div>
                <div class="col-md-6">
                    <p><i class="fas fa-memory"></i>Total Memori: <?= $result[9]; ?> Gb</p>
                    <p><i class="fas fa-microchip"></i>Total RAM: <?= $result[10]; ?> Gb</p>
                    <p><i class="fas fa-microchip"></i>Total CPU: <?= $result[11]; ?> Cores</p>
                    <p><i class="fas fa-wifi"></i>Internet: <?= $result[12]; ?></p>
                    <p><i class="fas fa-plug"></i>Open Port: <?= $result[13]; ?></p>
                    <p><i class="fas fa-hdd"></i>OS: <?= $result[14]; ?></p>
                </div>
            </div>
            <?php if ($resultAvp[1] != 'Accept') { ?>
                <div class="btn-container">
                    <form action="../php/proses.php" method="post">
                        <input id="ticket<?= $indexBtn; ?>" type="hidden" name="accept" value="<?= $result[0]; ?>">
                        <button data-index="<?= $indexBtn; ?>" type="submit" name="respon" value="accept" class="btn-accept">Accept</button>
                    </form>
                    <form action="../php/proses.php" method="post">
                        <input id="ticket<?= $indexBtn; ?>" type="hidden" name="reject" value="<?= $result[0]; ?>">
                        <button data-index="<?= $indexBtn; ?>" type="submit" name="respon" value="reject" class="btn-reject">Reject</button>
                    </form>
                    <button type="button" class="btn-cancel" onclick="closePopup(<?= $indexBtn; ?>)">Batal</button>
                </div>
            <?php
            } elseif ($resultAvp[1] == 'Reject') {
            ?>
                <div class="btn-container">
                    <div class="bg-info px-3 p-2" style="border-radius: 5px;">Reject</div>
                    <button type="button" class="btn-cancel" onclick="closePopup(<?= $indexBtn; ?>)">Batal</button>
                </div>
            <?php } else { ?>
                <div class="btn-container">
                    <div class="bg-info px-3 p-2" style="border-radius: 5px;">Proses</div>
                    <button type="button" class="btn-cancel" onclick="closePopup(<?= $indexBtn; ?>)">Batal</button>
                </div>
            <?php } ?>
        </div>
    <?php endwhile; ?>

    <?php $indexReview = 0;
    mysqli_data_seek($sqlServer, 0);

    foreach ($sqlServerResults as $dataServer) :
        $indexReview += 1;
    ?>
        <div id="review<?= $indexReview; ?>" class="container-fluid bg-danger detail" style="display: none;">
            <div class="row">
                <div class="col-md-6">
                    <h6><?= $dataServer[0]; ?></h6>
                    <p><i class="fas fa-user"></i>Total Ram: <?= $dataServer[1]; ?></p>
                    <p><i class="fa-sharp-duotone fa-solid fa-id-card"></i>No. Pegawai: <?= $dataServer[0]; ?></p>
                    <p><i class="fas fa-user-circle"></i>Username: <?= $dataServer[2]; ?></p>
                    <p><i class="fas fa-envelope"></i>Email: <?= $dataServer[4]; ?></p>
                    <p><i class="fas fa-briefcase"></i>Posisi: <?= $dataServer[5]; ?></p>
                </div>
                <div class="col-md-6">
                    <p><i class="fas fa-memory"></i>Total Memori: <?= $dataServer[8]; ?></p>
                    <p><i class="fas fa-microchip"></i>Total RAM: <?= $dataServer[9]; ?></p>
                    <p><i class="fas fa-microchip"></i>Total CPU: <?= $dataServer[10]; ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <script>
        document.querySelectorAll('.review-btn').forEach(button => {
            button.addEventListener('click', function() {
                let indexReview = this.getAttribute('data-index');
                let review = document.getElementById('review' + indexReview);
                let content = document.getElementById('main');
                console.log('Button: ' + indexReview);
                console.log('Review Element:', review);

                if (review) {
                    if (review.style.display === 'none' || review.style.display === '') {
                        review.style.display = 'block';
                        content.classList.add('blur');
                    } else {
                        review.style.display = 'none';
                        content.classList.remove('blur');
                    }
                } else {
                    console.error('Elemen review tidak ditemukan untuk index:', indexReview);
                }
            });
        });
    </script>

    <script>
        document.querySelectorAll('.detail-btn').forEach(button => {
            // console.log(button);
            button.addEventListener('click', function() {
                let index = this.getAttribute('data-index');
                let detail = document.getElementById('detail' + index);
                let content = document.getElementById('main');

                if (detail.style.display === 'none' || detail.style.display === '') {
                    detail.style.display = 'block';
                    content.classList.add('blur');
                } else {
                    detail.style.display = 'none';
                    content.classList.remove('blur');
                }
            });
        });

        function closePopup(index) {
            document.getElementById('detail' + index).style.display = 'none';
            document.getElementById('main').classList.remove('blur');
        }

        function showPopup(index) {
            document.getElementById('detail' + index).style.display = 'block';
            document.getElementById('main').classList.add('blur');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        // Event listener for accept button
        document.querySelectorAll('.btn-accept').forEach(accept => {
            accept.addEventListener('click', function() {
                let index = this.getAttribute('data-index');
                let ticket = document.getElementById('ticket' + index).value;

                const ajax = new XMLHttpRequest();
                ajax.open('POST', '../php/email_handler.php', true);
                ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                ajax.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log("Accept. Email terkirim " + this.responseText);
                    }
                };
                ajax.send('action=accept&ticket=' + ticket);
            });
        });

        // Event listener for reject button
        document.querySelectorAll('.btn-reject').forEach(reject => {
            reject.addEventListener('click', function() {
                let index = this.getAttribute('data-index');
                let ticket = document.getElementById('ticket' + index).value;

                const ajax = new XMLHttpRequest();
                ajax.open('POST', '../php/email_handler.php', true);
                ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                ajax.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log("Reject. Email tidak dikirim " + this.responseText);
                    }
                };
                ajax.send('action=reject&ticket=' + ticket);
            });
        });
    </script>

</body>

</html>