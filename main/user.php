<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="../style/styleUser.css">
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

        /* Container Styles */
        .body-atas {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: -50px;
        }

        /* Card Styles */
        .card {
            margin: 0 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-position 0.3s ease;
            max-width: 19rem;
            background: linear-gradient(145deg, #2a2a40, #1a1a2e);
            background-size: 200% 100%;
            background-position: right bottom;
            border-radius: 15px;
            overflow: hidden;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 191, 255, 0.8);
            background-position: left bottom;
            cursor: pointer;
        }

        .card img {
            border-bottom: 2px solid #00ffff;
        }

        .card-body {
            padding: 20px;
            text-align: center;
        }

        .card-text {
            font-size: 1.2rem;
            color: #ffcc00;
            text-shadow: 0 0 10px rgba(255, 204, 0, 0.5);
        }

        /* Add responsive design */
        @media (max-width: 576px) {
            .body-atas {
                flex-direction: column;
                align-items: center;
            }

            .card {
                margin: 20px 0;
            }
        }

        .img {
            width: 200px;
            height: 200px;
            margin: 0 auto;
        }

        .carousel-inner {
            width: 100%;
        }

        .carousel-item {
            position: relative;
        }

        .carousel-item img {
            display: block;
            width: 100%;
            height: 550px;
            object-fit: cover;
        }

        .carousel-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom,
                    rgba(0, 0, 0, 0) 80%,
                    rgb(0, 0, 0));
        }

        /* ============================== FORM STYLE ============================== */
        .body-form {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background: #1f1f2e;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        /* ============================= STYLE FORM 1 ============================== */
        .form-container {
            background: #2a2a3e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
        }

        .form-floating label {
            color: #b3b3b3;
            opacity: 0.6;
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

        /* ============================= STYLE FORM 2 ============================== */
        .headerForm2 {
            color: #00ffff;
            text-shadow: 0 0 10px #00ffff;
            margin-bottom: 20px;
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

        .btn-review {
            background: #4287f5;
            border: none;
            border-radius: 5px;
            color: #1a1a2e;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .btn-review:hover {
            color: white;
        }

        /* Container Edit Server */
        .container-edit-server {
            background: #2a2a3e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            margin-top: 20px;
        }

        h1 {
            color: #ffcc00;
            text-shadow: 0 0 10px #ffcc00;
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

        #loading {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 1000;
            text-align: center;
            padding-top: 20%;
        }

        .spinner {
            border: 8px solid #f3f3f3;
            /* Light grey */
            border-top: 8px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 2s linear infinite;
            margin: auto;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* ============================== CONTAINER REVIEW ============================== */
        .review-container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background: #1f1f2e;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .detail {
            background-color: #2a2a3e;
            color: #e6e6e6;
            width: 100%;
            height: 50%;
            z-index: 999;
            border-radius: 10px;
            padding: 20px;
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
    <title>CLIENT</title>
</head>

<body>
    <?php
    include "../php/connect.php";
    ?>
    <nav class="navbar navbar-expand-lg navbar-light" style="position: sticky; top: 0; padding: 0;">
        <div class="container-fluid" style="padding: 7px;">
            <a class="navbar-brand" href="index.html" style="color: white;">ASET SERVER</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <!-- <a href="login.php" class="nav-link">
                            <button class="btn btn-primary" type="button">Go to Console</button>
                        </a> -->
                        <form action="login.php" method="post">
                            <input type="hidden" name="user" value="user">
                            <button class="btn btn-primary" type="submit">Go to Console</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="body">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner carousel-sm" style="width: 100%; margin: 0 auto; background-color: #4facfe;">
                <div class="carousel-item active">
                    <img src="../source/image/gambar-tambang.webp" class="d-block w-100" alt="...">
                    <div class="carousel-overlay"></div>
                </div>
                <div class="carousel-item">
                    <img src="../source/image/kantor-ptba.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-overlay"></div>
                </div>
                <div class="carousel-item">
                    <img src="../source/image/logo-ptba.png" class="d-block w-100" alt="...">
                    <div class="carousel-overlay"></div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="body-atas container-fluid">
            <div id="card-buat-server" class="card-buat-server card" style="width: 18rem;">
                <img src="../source/image/gambar-buat-server.png" class="img img-buat-server card-img-top" alt="Buat Server">
                <div class="card-body">
                    <p class="card-text" style="text-align: center;">BUAT SERVER</p>
                </div>
            </div>
            <div id="card-edit-server" class="card-edit-server card" style="width: 18rem;">
                <img src="../source/image/gambar-edit-server.png" class="img img-edit-server card-img-top" alt="Edit Server">
                <div class="card-body">
                    <p class="card-text" style="text-align: center;">STATUS REQUEST</p>
                </div>
            </div>
        </div>

        <div class="body-form">
            <div id="form-container" class="form-container">
                <form id="formDataPegawai" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" id="nopeg" name="nopeg" class="form-control" placeholder="Nomor Pegawai">
                        <label for="nopeg">Nomor Pegawai</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nama">
                        <label for="name">Nama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        <label for="password">Password (Sesuaikan dengan akun pegawai anda)</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email address">
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" id="position" name="position" class="form-control" placeholder="Posisi">
                        <label for="position">Posisi</label>
                    </div>
                </form>
            </div>
            <div id="form-container2" class="container mt-5">
                <h3 class="headerForm2" style="text-align: center; color: #00ffff; margin-bottom: 20px; text-shadow: 0 0 10px #00ffff;">
                    Setup Your Server</h3>
                <div class="container-fluid body-form2 p-4">
                    <div class="row justify-content-between">
                        <div class="col-5">
                            <form id="formServer" method="post">
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

                                <label for="" class="form-label mt-2">Operating System</label>
                                <div class="mb-3 d-flex flex-row justify-content-evenly">
                                    <div class="select-os" id="select-os1" data-index="1">
                                        <img src="../source/image/logo-windows.png" alt="OS Windows" width="40px">
                                    </div>
                                    <div class="select-os" id="select-os2" data-index="2">
                                        <img src="../source/image/logo-linux.png" alt="OS Linux" width="40px">
                                    </div>
                                    <div class="select-os" id="select-os3" data-index="3">
                                        <img src="../source/image/logo-macos.png" alt="OS Mac OS" width="40px">
                                    </div>
                                </div>
                                <input type="hidden" name="os" id="osInput">
                            </form>
                        </div>

                        <div class="col-5">
                            <form id="formNetwork" method="post">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="switchInternet" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Internet</label>
                                </div>
                                <div id="openPort" class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">Open Port</label>
                                    <input type="text" name="openPort" class="form-control" id="exampleFormControlInput1" placeholder="default: 80" disabled>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-1">
                            <button id="submit" name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="container-edit-server" class="container-edit-server" style="display: none;">
                <div>
                    <form id="formCheckServer" action="" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" id="cNopeg" name="nopeg" class="form-control" placeholder="Nama">
                            <label for="name">Nomor Pegawai</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" id="cPassword" name="password" class="form-control" placeholder="Nama">
                            <label for="name">Password</label>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-1">
                                <button type="button" class="btn btn-primary" onclick="listServer()">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="list_req_server"></div>
            </div>
        </div>
        <div id="review-container" class="review-container container" style="display: none;"></div>
    </div>

    <div id="loading" style="display:none;">
        <div class="spinner"></div>
        <p>Loading, please wait...</p>
    </div>

    <div id="success" style="color: green; text-align: center; z-index: 999;">
        <i class="fa fa-check-circle" style="font-size: 100px;"></i>
        <p>Berhasil!</p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/user.js"></script>

    <script>
        function listServer() {
            let nopeg = document.getElementById('cNopeg').value;
            let formCheckServer = document.getElementById('formCheckServer');
            let formData = new FormData(formCheckServer);

            let ajax = new XMLHttpRequest();
            ajax.open("POST", '../php/list_server_handler.php', true);
            // ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.onreadystatechange = function() {
                if (ajax.readyState == 4) {
                    if (ajax.status == 200) {
                        try {
                            let jsonResponse = JSON.parse(ajax.responseText);
                            if (jsonResponse.success === false) {
                                alert(jsonResponse.message);
                            }
                        } catch (e) {
                            document.getElementById('list_req_server').innerHTML = ajax.responseText;

                            document.querySelectorAll('.btn-review').forEach(button => {
                                button.addEventListener('click', function() {
                                    let ticket = document.getElementById('ticket').value;
                                    document.getElementById('review-container').style.display = "block";
                                    window.scrollTo({
                                        top: document.body.scrollHeight,
                                        behavior: "smooth" 
                                    });

                                    let ajax2 = new XMLHttpRequest();
                                    ajax2.open("POST", "../php/review_server_user_handler.php", true);
                                    ajax2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                    ajax2.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {
                                            document.getElementById('review-container').innerHTML = this.responseText;
                                            let ticket = document.getElementById('ticket-review').innerText;

                                            document.getElementById('btn-close-ticket').addEventListener('click', function() {
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
                                        }
                                    }
                                    ajax2.send("ticket=" + ticket);
                                });
                            });
                        }
                    }
                }
            };
            ajax.send(formData);
        }

        // document.getElementById('list_req_server').addEventListener('click', function(event) {
        //     if (event.target && event.target.classList.contains('btn-review')) {
        //         console.log("Hello");
        //     }
        // });
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

    <script>
        // document.getElementById("flexSwitchCheckDefault").addEventListener("click", function() {
        //     let openPortCheckbox = document.getElementById("defaultCheck1");
        //     let openPortInput = document.getElementById("exampleFormControlInput1");
        //     let openPort = document.getElementById("openPort");

        //     if (this.checked) {
        //         openPortCheckbox.disabled = false;
        //         openPortInput.disabled = !openPortCheckbox.checked;
        //         openPort.style.display = 'block';
        //     } else {
        //         openPortCheckbox.disabled = true;
        //         openPortInput.disabled = true;
        //         openPort.style.display = 'none';
        //     }
        // });

        document.getElementById('defaultCheck1').addEventListener('change', function() {
            let openPortInput = document.getElementById('exampleFormControlInput1');
            openPortInput.disabled = !this.checked;
        });
    </script>

    <script>
        document.getElementById("card-buat-server").addEventListener("click", function() {
            document.getElementById("form-container").style.display = "block";
            document.getElementById("form-container2").style.display = "block";
            document.getElementById("container-edit-server").style.display = "none";
        });

        document.getElementById("card-edit-server").addEventListener("click", function() {
            document.getElementById("form-container").style.display = "none";
            document.getElementById("form-container2").style.display = "none";
            document.getElementById("container-edit-server").style.display = "block";
        });
    </script>

    <script>
        document.getElementById('submit').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the form from submitting the default way
            console.log("Submit button clicked");
            let os = document.querySelectorAll('.select-os');

            let nopeg = document.getElementById('nopeg');
            let username = document.getElementById('username');

            let formDataPegawai = document.getElementById('formDataPegawai');
            let formData1 = new FormData(formDataPegawai);

            let formDataServer = document.getElementById('formServer');
            let formData2 = new FormData(formDataServer);

            let internetChecked = document.getElementById('flexSwitchCheckDefault').checked;
            let openPortValue = document.getElementById('exampleFormControlInput1').value;
            let formData3 = new FormData();
            formData3.append('internet', internetChecked);
            formData3.append('openPort', openPortValue);

            for (let pair of formData2.entries()) {
                formData1.append(pair[0], pair[1]);
            }
            for (let pair of formData3.entries()) {
                formData1.append(pair[0], pair[1]);
            }

            let xhr = new XMLHttpRequest();
            xhr.open('POST', '../php/getData.php', true);

            // Show loading animation
            document.getElementById('loading').style.display = 'block';
            document.getElementById('submit').disabled = true;

            xhr.onload = function() {
                console.log("AJAX request completed with status: " + xhr.status);
                document.getElementById('loading').style.display = 'none'; // Hide loading animation
                if (xhr.status === 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        console.log("Response received: ", response);
                        if (response.success) {
                            // Show success message and checkmark icon
                            document.getElementById('success').style.display = 'block';

                            // Hide the success message after 3 seconds
                            setTimeout(function() {
                                document.getElementById('success').style.display = 'none';
                            }, 3000);

                            console.log("Clear");
                            // Clear form fields
                            formDataPegawai.reset();
                            formDataServer.reset();
                            document.getElementById('flexSwitchCheckDefault').checked = false;
                            document.getElementById('exampleFormControlInput1').value = '';
                            os.classList.remove('selected');
                            // alert('Form submitted successfully!');
                            // window.location.href = '../main/user.php';
                        } else {
                            alert('Nomor pegawai atau username tidak ada');
                            nopeg.style.border = '1px solid red';
                            username.style.border = '1px solid red';
                        }
                    } catch (e) {
                        console.error("Error parsing JSON response: ", e);
                        console.error("Response text: ", xhr.responseText);
                    }
                } else {
                    alert('An error occurred: ' + xhr.status);
                }
                document.getElementById('submit').disabled = false;
            };

            xhr.onerror = function() {
                console.log("Request failed");
                alert('An error occurred while sending the request.');
                document.getElementById('loading').style.display = 'none'; // Hide loading animation
                document.getElementById('submit').disabled = false;
            };

            xhr.send(formData1);
            console.log("AJAX request sent");
        });
    </script>

    <script>
        const cards = document.querySelectorAll('.card');

        cards.forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                card.style.background = `radial-gradient(circle at ${x}px ${y}px, #ff8c00, #2a2a40)`;
            });

            card.addEventListener('mouseleave', () => {
                card.style.background = 'linear-gradient(145deg, #2a2a40, #1a1a2e)';
            });
        });
    </script>
</body>

</html>