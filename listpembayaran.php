<?php
require 'connect.php';
require 'vendor/autoload.php';

use Xendit\Xendit;

Xendit::setApiKey('xnd_development_ppJkBMdGHcy5mUx7gBPF23qX0ZdoKvUu461sQSqquaqHv6U8yCy9NxWFmIvDh');

$sql = "SELECT * FROM payment_xendit";

$result = mysqli_query($conn, $sql);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-3">List Pembayaran</h1>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group">
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {

                                    if($row['status'] == "PAID") {
                                        $status = '<span class="badge text-bg-success">' . $row['status'] . '</span>';
                                    }
                                    elseif($row['status'] == "PENDING") {
                                        $status = '<span class="badge text-bg-warning text-light">' . $row['status'] . '</span>';
                                    }
                                    else {
                                        $status = '<span class="badge text-bg-secondary">' . $row['status'] . '</span>';
                                    }

                                    echo  '<li class="list-group-item">
                                    <div>
                                        <span class="text-secondary">Pembayaran Berakhir:</span> <span class="text-danger">' . $row['expiry_date'] . '</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                    <strong>' . $row['given_names'] . ' ' . $row['surname']. '</strong>
                                    <a href="' . $row['invoice_url'] . '">Lihat Pembayaran</a>
                                    </div>
                                    ' . $status . '
                                    </li>';

                                }
                            } else {
                            echo "0 results";
                        }

                        mysqli_close($conn);

                        ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>

</html>