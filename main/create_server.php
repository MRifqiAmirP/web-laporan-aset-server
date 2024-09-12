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
    <?php if (isset($_GET['edit'])) : ?>
        <title>EDIT SERVER</title>
    <?php elseif (isset($_GET['edit-server'])) : ?>
        <title>CREATE EDIT SERVER</title>
    <?php else : ?>
        <title>CREATE SERVER</title>
    <?php endif; ?>
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
    } elseif (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $nopeg = $_GET['nopeg'];
        $queryPegawai = "SELECT * FROM tb_pegawai WHERE NO_PEG = '$nopeg' LIMIT 1";
        $sqlPegawai = mysqli_query($conn, $queryPegawai);
        $resultPegawai = mysqli_fetch_array($sqlPegawai);

        $query = "SELECT * FROM tb_server WHERE ID_SERVER = '$id'";
        $sql = mysqli_query($conn, $query);
        $jumlah = mysqli_num_rows($sql);
        $result = mysqli_fetch_array($sql);
    } elseif (isset($_GET['edit-server'])) {
        $id_server = $_GET['edit-server'];
        $nopeg = $_GET['nopeg'];

        $queryPegawai = "SELECT * FROM tb_pegawai WHERE NO_PEG = '$nopeg' LIMIT 1";
        $sqlPegawai = mysqli_query($conn, $queryPegawai);
        $resultPegawai = mysqli_fetch_array($sqlPegawai);

        $query = "SELECT serv.*, req_edit.* FROM tb_server serv INNER JOIN tb_req_edit_server req_edit ON serv.ID_SERVER = req_edit.ID_SERVER";
        $sql = mysqli_query($conn, $query);
        $jumlah = mysqli_num_rows($sql);
        $result = mysqli_fetch_array($sql);
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
                        <?php if (isset($_GET['edit'])) : ?>
                            <a href="console.php" class="nav-link">
                                <button class="btn btn-primary" type="button">Go to Console</button>
                            </a>
                        <?php else : ?>
                            <a href="sistemDB.php" class="nav-link">
                                <button class="btn btn-primary" type="button">Go to Sistem Database</button>
                            </a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- DETAIL -->
    <?php if (isset($_GET['buat']) && $jumlah != 0) { ?>
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
    <?php } elseif (isset($_GET['edit'])) { ?>
        <div class="container-fluid detail">
            <div class="row">
                <div class="col-md-6">
                    <p><i class="fas fa-user" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Hostname: <?= $result['HOSTNAME']; ?></p>
                    <p><i class="fa-sharp-duotone fa-solid fa-id-card"></i>Open Port: <?= $result['OPEN_PORT']; ?></p>
                    <p><i class="fas fa-user-circle" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Username: <?= $result['USERNAME']; ?></p>
                    <p><i class="fas fa-envelope" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>IP Address: <?= $result['IP_ADDRESS']; ?></p>
                    <p><i class="fas fa-wifi" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Internet: <?= $result['INTERNET']; ?></p>
                </div>
                <div class="col-md-6">
                    <p><i class="fas fa-memory" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Total Memori: <?= $result['TOTAL_MEMORI']; ?> Gb</p>
                    <p><i class="fas fa-microchip" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Total RAM: <?= $result['TOTAL_RAM']; ?> Gb</p>
                    <p><i class="fas fa-microchip" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Total CPU: <?= $result['TOTAL_CPU']; ?> Cores</p>
                    <p><i class="fas fa-hdd" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>OS: <?= $result['OS']; ?></p>
                </div>
            </div>
        </div>
    <?php } elseif (isset($_GET['edit-server'])) { 
        $sqlServer = mysqli_query($conn, "SELECT * FROM tb_server WHERE ID_SERVER = '{$result['ID_SERVER']}'");
        $resultServer = mysqli_fetch_array($sqlServer);
        ?>
        <div class="container-fluid detail">
            <div class="row">
                <div class="col-md-6">
                    <p><i class="fa-sharp-duotone fa-solid fa-id-card"></i>ID Server: <?= $result['ID_SERVER']; ?></p>
                    <p><i class="fas fa-user" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Hostname: <?= $result['HOSTNAME']; ?></p>
                    <p><i class="fas fa-network-wired" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Open Port: <?= $result['OPEN_PORT']; ?></p>
                    <p><i class="fas fa-user-circle" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Username: <?= $result['USERNAME']; ?></p>
                    <p><i class="fas fa-envelope" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>IP Address: <?= $result['IP_ADDRESS']; ?></p>
                    <p><i class="fas fa-wifi" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Internet: <?= $result['INTERNET']; ?></p>
                </div>
                <div class="col-md-6">
                    <p><i class="fas fa-memory" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Total Memori: <?= $result['TOTAL_MEMORI']; ?> Gb ⬅ (<?= $resultServer['TOTAL_MEMORI'];?> Gb)</p>
                    <p><i class="fas fa-microchip" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Total RAM: <?= $result['TOTAL_RAM']; ?> Gb ⬅ (<?= $resultServer['TOTAL_RAM'];?> Gb)</p>
                    <p><i class="fas fa-microchip" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Total CPU: <?= $result['TOTAL_CPU']; ?> Cores ⬅ (<?= $resultServer['TOTAL_CPU'];?> Cores)</p>
                    <p><i class="fas fa-hdd" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>OS: <?= $result['OS']; ?></p>
                    <p><i class="fas fa-hdd" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>Lokasi Storage: <?= $resultServer['DATA_STORAGE']; ?></p>
                    <p><i class="fas fa-hdd" style="margin-right: 10px; color: #00ffff; font-size: 1.5rem;"></i>ESXi: <?= $resultServer['ESXi']; ?></p>
                </div>
            </div>
        </div>
    <?php } ?>


    <div class="body">
        <div class="body-form">
            <div id="form-container2" class="container mt-5">
                <h3 style="text-align: center; color: #00ffff; margin-bottom: 20px; text-shadow: 0 0 10px #00ffff;">
                    Setup Server</h3>
                <div class="container-fluid body-form2 p-4">
                    <div class="row justify-content-between">
                        <div class="col-12">
                            <?php if (isset($_GET['buat']) && $jumlah != 0) : ?>
                                <h6 style="font-weight: bold;">Ticket: <?= $ticket ?></h6>
                            <?php endif; ?>
                            <form id="formServer" action="../php/proses.php" method="post">
                                <?php if ($jumlah != 0) : ?>
                                    <?php if (isset($_GET['edit'])) : ?>
                                        <input type="hidden" name="id" id="id" value="<?php echo htmlspecialchars($result['ID_SERVER']); ?>">
                                        <input type="hidden" name="nopeg" id="nopeg" value="<?= $nopeg; ?>">
                                        <input type="hidden" name="nama" id="nama" value="<?= $resultPegawai['NAMA_PEGAWAI']; ?>">
                                        <input type="hidden" name="username" id="username" value="<?= $resultPegawai['USERNAME']; ?>">
                                        <input type="hidden" name="password" id="password" value="<?= $resultPegawai['PASSWORD']; ?>">
                                        <input type="hidden" name="email" id="email" value="<?= $resultPegawai['EMAIL_ADDRESS']; ?>">
                                        <input type="hidden" name="posisi" id="posisi" value="<?= $resultPegawai['POSISI']; ?>">
                                    <?php elseif (isset($_GET['edit-server'])) : ?>
                                        <input type="hidden" name="id" id="id" value="<?= $resultServer['ID_SERVER'];?>">
                                    <?php else : ?>
                                        <input type="hidden" name="ticket" id="ticket" value="<?php echo htmlspecialchars($result['NO_TICKET']); ?>">
                                        <input type="hidden" name="username" value="<?= $result[2]; ?>">
                                        <input type="hidden" name="password" value="<?= $result[3]; ?>">
                                    <?php endif; ?>
                                <?php endif; ?>
                                <div class="mb-3">
                                    <label for="memori" class="form-label">Memori</label>
                                    <select id="memori" name="memori" class="form-select" aria-label="Default select example">
                                        <option selected>Pilih Total Memori</option>
                                        <option value="1">256 Gb</option>
                                        <option value="2">520 Gb</option>
                                        <option value="3">1024 Gb</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="ram" class="form-label">RAM</label>
                                    <select id="ram" name="ram" class="form-select" aria-label="Default select example">
                                        <option selected>Pilih Total RAM</option>
                                        <option value="1">1 Gb</option>
                                        <option value="2">2 Gb</option>
                                        <option value="3">4 Gb</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="cpu" class="form-label">CPU</label>
                                    <select id="cpu" name="cpu" class="form-select" aria-label="Default select example">
                                        <option selected>Pilih Total CPU</option>
                                        <option value="1">1 core</option>
                                        <option value="2">2 core</option>
                                        <option value="3">3 core</option>
                                    </select>
                                </div>

                                <?php if (!isset($_GET['edit'])) : ?>
                                    <div class="mb-3">
                                        <label for="storage" class="form-label">DATA STORAGE</label>
                                        <select id="storage" name="storage" class="form-select" aria-label="Default select example">
                                            <option selected>Pilih Data Storage</option>
                                            <option value="1">Data Storage 1</option>
                                            <option value="2">Data Storage 2</option>
                                            <option value="3">Data Storage 3</option>
                                            <option value="4">Data Storage 4</option>
                                            <option value="5">Data Storage 5</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="esxi" class="form-label">ESXi</label>
                                        <select id="esxi" name="esxi" class="form-select" aria-label="Default select example">
                                            <option selected>Pilih Data Storage</option>
                                            <option value="1">ESXi 1</option>
                                            <option value="2">ESXi 2</option>
                                            <option value="3">ESXi 3</option>
                                            <option value="4">ESXi 4</option>
                                            <option value="5">ESXi 5</option>
                                        </select>
                                    </div>
                                <?php endif; ?>

                                <label for="" class="form-label mt-2">Operating System</label>
                                <div class="mb-3 d-flex flex-row justify-content-start col-5">
                                    <div class="select-os me-3" id="select-os1" data-index="1">
                                        <img src="../source/image/logo-windows.png" alt="OS Windows" width="40px">
                                    </div>
                                    <div class="select-os me-3" id="select-os2" data-index="2">
                                        <img src="../source/image/logo-linux.png" alt="OS Linux" width="40px">
                                    </div>
                                    <div class="select-os" id="select-os3" data-index="3">
                                        <img src="../source/image/logo-macos.png" alt="OS Mac OS" width="40px">
                                    </div>
                                </div>
                                <input type="hidden" name="os" id="osInput">

                                <div class="row justify-content-center">
                                    <div class="col-1">
                                        <?php if (isset($_GET['edit'])) : ?>
                                            <button id="btn-edit-server" name="edit" value="edit" type="submit" class="btn btn-primary">Submit</button>
                                            <div id="btn-buat-server" style="display: none;"></div>
                                        <?php elseif (isset($_GET['edit-server'])) : ?>
                                            <button id="btn-buat-server" name="server" value="edit" type="submit" class="btn btn-primary">Edit</button>
                                        <?php else : ?>
                                            <button id="btn-buat-server" name="server" value="buat" type="submit" class="btn btn-primary">Submit</button>
                                        <?php endif; ?>
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
        document.getElementById('')
    </script>

    <script>
        document.getElementById('btn-buat-server').addEventListener('click', function() {
            // console.log("Button buat ditekan");
            let dataServer = document.getElementById('formServer');
            let formDataServer = new FormData(dataServer);
            formDataServer.append('buat-server', 'true');

            const ajax = new XMLHttpRequest();
            ajax.open('POST', '../php/email_handler.php', true);
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(ajax.responseText);
                }
            }
            ajax.send(formDataServer);
        });
    </script>

    <script>
        document.getElementById('btn-edit-server').addEventListener('click', function() {
            console.log("Button edit ditekan");
            let dataServer = document.getElementById('formServer');
            let formDataServer = new FormData(dataServer);
            formDataServer.append('edit-server', 'true');

            const ajax = new XMLHttpRequest();
            ajax.open('POST', '../php/email_handler.php', true);
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            }
            ajax.send(formDataServer);
        });
    </script>

    <script>
        document.querySelectorAll('.select-os').forEach(os => {
            os.addEventListener('click', function() {
                document.querySelectorAll('.select-os').forEach(item => {
                    item.classList.remove('selected');
                });

                this.classList.add('selected');

                let index = this.getAttribute('data-index');
                let osValue;
                if (index === '1') {
                    osValue = 'Windows';
                } else if (index === '2') {
                    osValue = 'Linux';
                } else if (index === '3') {
                    osValue = 'Mac OS';
                }
                document.getElementById('osInput').value = osValue;
                console.log(osValue);
            });
        });
    </script>
</body>

</html>