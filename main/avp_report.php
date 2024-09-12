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

        .futuristic-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #161b22;
            /* Slightly lighter dark background for the table */
            color: #c9d1d9;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .futuristic-table thead {
            background-color: #21262d;
            /* Darker header background */
            color: #58a6ff;
            /* Light blue text for headers */
            font-size: 1.1rem;
        }

        .futuristic-table thead th {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #30363d;
        }

        .futuristic-table tbody {
            background-color: #161b22;
        }

        .futuristic-table tbody tr {
            transition: background-color 0.3s, color 0.3s;
        }

        .futuristic-table tbody tr:hover {
            background-color: #30363d;
            /* Hover effect with darker shade */
            color: #58a6ff;
            /* Change text color on hover */
        }

        .futuristic-table tbody td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #30363d;
            /* Light border for separation */
        }

        .futuristic-table tbody td a.btn-light {
            background-color: #21262d;
            /* Button matching the theme */
            color: #58a6ff;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .futuristic-table tbody td a.btn-light:hover {
            background-color: #58a6ff;
            /* Button hover with bright color */
            color: #161b22;
        }

        .futuristic-button {
            background-color: #58a6ff;
            color: #161b22;
            border: none;
            padding: 10px 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .futuristic-button:hover {
            background-color: #c9d1d9;
            color: #161b22;
        }

        @media (max-width: 768px) {
            .futuristic-table thead {
                display: none;
            }

            .futuristic-table tbody tr {
                display: block;
                margin-bottom: 20px;
            }

            .futuristic-table tbody td {
                display: block;
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            .futuristic-table tbody td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-weight: bold;
                text-align: left;
            }
        }
    </style>
</head>

<body style="max-width: 100%; overflow-x: hidden;">
    <?php
    include '../php/connect.php';

    // $query = "SELECT tb_request_server.NO_TICKET, tb_pegawai.NO_PEG,  tb_pegawai.NAMA_PEGAWAI,  tb_pegawai.EMAIL_ADDRESS,  tb_pegawai.POSISI, tb_avp_response.RESPONSE FROM tb_request_server INNER JOIN tb_pegawai ON tb_request_server.NO_TICKET = tb_pegawai.NO_TICKET INNER JOIN tb_avp_response ON tb_request_server.NO_TICKET = tb_avp_response.NO_TICKET WHERE tb_avp_response.RESPONSE != 'No Respon'";
    $query = "SELECT peg.*, avp.* FROM tb_avp_response avp INNER JOIN tb_pegawai peg ON avp.NO_TICKET = peg.NO_TICKET";
    $sql = mysqli_query($conn, $query);
    ?>

    <div id="main" class="row" style="height: inherit;">
        <div class="sidebar col-md-2" style="height: 100%;">
            <a href="avp.php"><i class="fas fa-server" style="margin-right: 10px;"></i>Request Buat Server</a>
            <a href="avp_edit.php"><i class="fas fa-edit" style="margin-right: 10px;"></i>Request Edit Server</a>
            <a href="" style="background-color: #004080; color: #00ffff; text-shadow: 0 0 5px #00ffff; border-left: 4px solid #00ffff;"><i class="fas fa-file-alt" style="margin-right: 10px;"></i>Laporan Request</a>
            <a href="index.html" style="position: absolute; bottom: 0;"><i class="fas fa-sign-out-alt" style="margin-right: 10px;"></i>Go To Dashboard</a>
        </div>

        <div class="col-md-10">
            <div style="width: 90%; margin: 20px auto;">
                <button id="downloadPdf" class="futuristic-button btn btn-primary">Download PDF</button>
                <table class="table table-hover futuristic-table" style="margin: 0 auto;">
                    <thead>
                        <th>No.</th>
                        <th>No. Ticket</th>
                        <th>Nomor Pegawai</th>
                        <th>Nama Pegawai</th>
                        <th>Email Address</th>
                        <th>Posisi</th>
                        <th>Status</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        while ($result = mysqli_fetch_array($sql)) :
                            $no++; ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $result['NO_TICKET']; ?></td>
                                <td><?= $result['NO_PEG']; ?></td>
                                <td><?= $result['NAMA_PEGAWAI']; ?></td>
                                <td><?= $result['EMAIL_ADDRESS']; ?></td>
                                <td><?= $result['POSISI']; ?></td>
                                <td><?= $result['RESPONSE']; ?></td>
                                <td></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('downloadPdf').addEventListener('click', function () {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Menambahkan judul pada halaman PDF
            doc.setFontSize(18); // Ukuran font judul
            doc.text("Laporan AVP", 14, 22); // Posisi (x, y)

            // Menambahkan garis horizontal di bawah judul
            doc.setLineWidth(0.5);
            doc.line(14, 24, 196, 24);

            var elem = document.querySelector(".table");

            const startY = 30;
            doc.autoTable({ html: elem, startY: startY });

            doc.save('report_avp.pdf');
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
</body>

</html>