<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php
    include '../php/connect.php';
    ?>

    <form action="" method="post" class="col-3">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NO TICKET</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="ticket">
        </div>
        <button id="submit" name="submit" type="submit" class="btn btn-danger">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ticket = $_POST['ticket'];

        // Use prepared statements to prevent SQL injection
        $queryDeleteAvp = $conn->prepare('DELETE FROM tb_avp_response WHERE NO_TICKET = ?');
        $queryDeleteAvp->bind_param('s', $ticket);
        $sqlDeleteAvp = $queryDeleteAvp->execute();

        $queryDeleteRequest = $conn->prepare('DELETE FROM tb_request_server WHERE NO_TICKET = ?');
        $queryDeleteRequest->bind_param('s', $ticket);
        $sqldeleteRequest = $queryDeleteRequest->execute();

        if ($sqlDeleteAvp && $sqldeleteRequest) {
            echo 'Berhasil';
        } else {
            echo 'Gagal';
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>