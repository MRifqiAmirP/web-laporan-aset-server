<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@400;500&display=swap');

        body {
            /* background-image: url(../source/image/background-user.jpg); */
            font-family: 'Roboto', sans-serif;
            background-color: #1a1a2e;
            color: #e6e6e6;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: rgba(56, 132, 255, 0);
            z-index: 99;
            transition: all 0.3s ease-in-out;
        }

        .navbar.scrolled {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .body {
            z-index: 0;
            margin-top: -70px;
        }

        .body-form {
            width: 80%;
            margin: 100px auto;
            padding: 20px;
            background: #1f1f2e;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .form-container {
            background: #2a2a3e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
        }

        h3 {
            color: #00ffff;
            text-shadow: 0 0 10px #00ffff;
            margin-bottom: 20px;
        }

        .form-floating label {
            color: #b3b3b3;
        }

        .form-control {
            background-color: #33334d;
            border: none;
            color: #e6e6e6;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.5);
        }

        .form-control:focus {
            background-color: #33334d;
            color: #e6e6e6;
            border-color: #00ffff;
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
        }

        .form-select {
            background-color: #33334d;
            border: none;
            color: #e6e6e6;
        }

        .form-select:focus {
            background-color: #33334d;
            border-color: #00ffff;
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
        }

        .form-check-input {
            background-color: #33334d;
            border: none;
            color: #e6e6e6;
        }

        .form-check-input:checked {
            background-color: #00ffff;
            border-color: #00ffff;
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
            .body-form {
                width: 95%;
                padding: 10px;
            }
        }

        .select-os {
            transition: transform 0.3s, background-color 0.3s;
            padding: 8px;
            border-radius: 10px;
            background-color: #2c2f38;
        }

        .select-os:hover,
        .selected {
            transform: scale(1.2);
            padding: 10px;
            background-color: #00ffff;
        }

        .select-os img {
            transition: transform 0.3s;
        }

        .select-os:hover img {
            transform: scale(1.1);
        }

        .form-label {
            color: #ffffff;
        }

        @media (max-width: 767px) {
            .select-os {
                padding: 6px;
                margin-bottom: 10px;
            }

            .select-os:hover {
                transform: scale(1.1);
                padding: 8px;
            }

            .form-label {
                text-align: center;
                display: block;
                margin-bottom: 10px;
            }

            .container {
                padding: 20px;
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            .select-os {
                padding: 7px;
            }

            .select-os:hover {
                transform: scale(1.15);
                padding: 9px;
            }
        }

        @media (min-width: 992px) {
            .select-os {
                padding: 8px;
            }

            .select-os:hover {
                transform: scale(1.2);
                padding: 10px;
            }
        }


        /* Detail Popup Styles */
        .detail {
            background-color: #1f1f2e;
            color: #e6e6e6;
            width: 70%;
            height: 50%;
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
    </style>
    <title>Create Network</title>
</head>

<body>
    <?php
    include '../php/connect.php';

    if (isset($_GET['buat'])) {
        $ticket = $_GET['buat'];
        $query = "SELECT tb_pegawai.*, tb_request_server.* FROM tb_pegawai INNER JOIN tb_request_server WHERE tb_request_server.NO_TICKET = '$ticket' AND tb_pegawai.NO_TICKET = '$ticket'";
        $sql = mysqli_query($conn, $query);
        $result = mysqli_fetch_array($sql);
        $jumlah = mysqli_num_rows($sql);
    } else {
        $jumlah = 0;
    }

    ?>
    <nav class="navbar navbar-expand-lg navbar-light" style="position: sticky; top: 0; padding: 0;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: white;">ASET SERVER</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="sistemDB.php" class="nav-link">
                            <button class="btn btn-primary" type="button">Go to Console</button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- DETAIL -->
    <?php if ($jumlah != 0) { ?>
        <div class="container-fluid detail">
            <div class="row">
                <div class="col-md-6">
                    <h6><?= $result['NO_TICKET']; ?></h6>
                    <p><i class="fas fa-user" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Nama: <?= $result['NAMA_PEGAWAI']; ?></p>
                    <p><i class="fa-sharp-duotone fa-solid fa-id-card"></i>No. Pegawai: <?= $result['NO_PEG']; ?></p>
                    <p><i class="fas fa-user-circle" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Username: <?= $result['USERNAME']; ?></p>
                    <p><i class="fas fa-envelope" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Email: <?= $result['EMAIL_ADDRESS']; ?></p>
                    <p><i class="fas fa-briefcase" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Posisi: <?= $result['POSISI']; ?></p>
                </div>
                <div class="col-md-6">
                    <p><i class="fas fa-memory" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Total Memori: <?= $result['TOTAL_MEMORI']; ?> Gb</p>
                    <p><i class="fas fa-microchip" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Total RAM: <?= $result['TOTAL_RAM']; ?> Gb</p>
                    <p><i class="fas fa-microchip" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Total CPU: <?= $result['TOTAL_CPU']; ?> Cores</p>
                    <p><i class="fas fa-wifi" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Internet: <?= $result['INTERNET']; ?></p>
                    <p><i class="fas fa-plug" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Open Port: <?= $result['OPEN_PORT']; ?></p>
                    <p><i class="fas fa-hdd" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>OS: <?= $result['OS']; ?></p>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="body">
        <div class="body-form">
            <div id="form-container2" class="container mt-5">
                <h3 style="text-align: center; color: #00ffff; margin-bottom: 20px; text-shadow: 0 0 10px #00ffff;">
                    Setup Network Server</h3>
                <div class="container-fluid body-form2 p-4">
                    <div class="row justify-content-between">
                        <div class="col-12">
                            <?php if ($jumlah != 0) : ?>
                                <h6 style="font-weight: bold;">Ticket: <?= $ticket; ?></h6>
                            <?php endif; ?>
                            <form id="formNetwork" action="../php/proses.php" method="post">
                                <?php if ($jumlah != 0) : ?>
                                    <input type="hidden" name="ticket" value="<?= $ticket; ?>">
                                    <input type="hidden" name="username" value="<?= $result[2]; ?>">
                                    <input type="hidden" name="password" value="<?= $result[3]; ?>">
                                <?php endif; ?>
                                <div class="form-floating mb-3">
                                    <input type="text" id="hostname" name="hostname" class="form-control" placeholder="Hostname">
                                    <label for="hostname">Hostname</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" id="openPort" name="openPort" class="form-control" placeholder="Open Port">
                                    <label for="openPort">Open Port</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                                    <label for="username">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                    <label for="password">Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" id="ipaddress" name="ipaddress" class="form-control" placeholder="IP Address">
                                    <label for="email">IP Address</label>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-1">
                                        <button id="btn-buat-network" name="server" value="network" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="../js/user.js"></script>

    <script>
        document.getElementById('btn-buat-network').addEventListener('click' ,function() {
            let formNetwork = document.getElementById('formNetwork');
            let formDataNetwork = new FormData(formNetwork);
            formDataNetwork.append('buat-network', 'true');

            const ajax = new XMLHttpRequest();
            ajax.open('POST', '../php/email_handler.php');
            ajax.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            }
            ajax.send(formDataNetwork);
        });
    </script>
</body>

</html>