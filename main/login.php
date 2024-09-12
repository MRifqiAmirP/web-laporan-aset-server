<?php
if (isset($_POST['user'])) {
    $statusLogin = $_POST['user'];
} else {
    $statusLogin = 'none';
}
?>

<?php
session_start();
if (isset($_SESSION['status'])) {
    $statusLogin = 'user';
    unset($_SESSION['status']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ($statusLogin == 'user') : ?>
        <title>Login | USER</title>
    <?php else : ?>
        <title>Login</title>
    <?php endif; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('../source/image/background-login.jpg') no-repeat center center/cover;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(20px);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
            max-width: 400px;
            width: 100%;
            color: #fff;
        }

        .login-container h2 {
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-select,
        .form-control {
            background: rgba(255, 255, 255, 0.3);
            border: none;
            color: #fff;
        }

        .form-select:focus,
        .form-control:focus {
            background: rgba(255, 255, 255, 0.5);
            color: #000;
        }

        .btn-primary {
            width: 100%;
            padding: 0.75rem;
            font-size: 1rem;
            background: rgba(0, 123, 255, 0.8);
            border: none;
        }

        .btn-primary:hover {
            background: rgba(0, 123, 255, 1);
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="loginForm" action="" method="post">
            <div class="form-group">
                <label for="loginAs">Login sebagai</label>
                <select class="form-select" name="loginAs" id="loginAs" aria-label="Login as">
                    <?php if ($statusLogin != 'user') : ?>
                        <option value="1" selected>Pilih tipe login</option>
                        <option value="avp">AVP</option>
                        <option value="sistemdb">Sistem DB</option>
                        <option value="network">Network</option>
                    <?php else : ?>
                        <option value="user">User</option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="username">Nomor Pegawai</label>
                <input name="username" type="text" class="form-control" id="username" placeholder="Enter nomor pegawai">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Enter password">
            </div>
            <p id="ket"></p>
            <button id="btn-login" type="button" name="login" class="btn btn-primary">Login</button>
        </form>
    </div>

    <script>
        document.getElementById('btn-login').addEventListener('click', function() {
            event.preventDefault();
            let formLogin = document.getElementById('loginForm');
            let dataFormLogin = new FormData(formLogin);
            dataFormLogin.append('login', 'true'); // Tambahan data untuk memastikan login di-trigger

            const ajax = new XMLHttpRequest();
            ajax.open('POST', '../php/login_handler.php', true);
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText); // Lihat respon dari server

                    if (this.responseText.trim() === 'berhasil_user') {
                        window.location.href = 'console.php';
                    } else if (this.responseText.trim() === 'berhasil_avp') {
                        window.location.href = 'avp.php';
                    } else if (this.responseText.trim() === 'berhasil_sistemdb') {
                        window.location.href = 'sistemDB.php';
                    } else if (this.responseText.trim() === 'berhasil_network') {
                        window.location.href = 'network.php';
                    } else if (this.responseText.trim() === 'pilih') {
                        let keterangan = document.getElementById('ket');
                        let formSelect = document.getElementById('loginAs');

                        formSelect.style.border = "2px solid red";
                        keterangan.innerHTML = "*Login sebagai apa?";
                        keterangan.style.color = 'red';
                        keterangan.style.fontSize = '12px';
                    } else if (this.responseText.trim() === 'gagal') {
                        let keterangan = document.getElementById('ket');
                        document.querySelectorAll('.form-control').forEach(formStyle => {
                            formStyle.style.border = "2px solid red";
                        });
                        keterangan.innerHTML = "*Username atau Password tidak ada";
                        keterangan.style.color = 'red';
                        keterangan.style.fontSize = '12px';
                    }
                }
            };
            ajax.send(dataFormLogin); // Kirim data FormData
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>