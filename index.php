<?php
require 'connect.php';
require 'vendor/autoload.php';

use Xendit\Xendit;

Xendit::setApiKey('apikey-anda');

// $id = '63c0e47ba59ff7c3537117bb';
// Melihat Invoice
// $getInvoice = \Xendit\Invoice::retrieve($id);
// echo '<pre>';
// print_r($getInvoice);
// echo '</pre>';

// Invoice Kadaluarsa
// $expireInvoice = \Xendit\Invoice::expireInvoice($id);
// echo '<pre>';
// print_r($expireInvoice);
// echo '</pre>';

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paymant Gateway</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="mt-3">
            <a href="listpembayaran.php">List Pembayaran</a>
        </div>
        <h1 class="mt-3">Info Pembayaran</h1>
        <form class="mt-3" action="pay.php" method="POST">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="firstname" class="form-label"><strong>First name:</strong></label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" aria-label="First name" autocomplete="off" autofocus>
                                </div>
                                <div class="col">
                                    <label for="lastname" class="form-label"><strong>Last name:</strong></label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" aria-label="Last name" autocomplete="off">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label"><strong>Email:</strong></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" aria-label="Email" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="mobile_number" class="form-label"><strong>Mobile number:</strong></label>
                                <input type="number" class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile number" aria-label="Mobile number" autocomplete="off">
                            </div>
                            <!-- <div class="input-group mb-3">
                                <label for="amount" class="form-label"><strong>Amount:</strong></label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                                    <input type="text" class="form-control format_rupiah" id="amount" name="amount" placeholder="0" aria-label="Amount" autocomplete="off">
                                </div>
                            </div> -->
                            <div class="mb-3">
                                <label class="form-label"><strong>Addresses:</strong></label>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="country" class="form-label">country:</label>
                                            <select class="form-select" id="country" name="country" aria-label="Country">
                                                <option id="Indonesia">Indonesia</option>
                                                <select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="city" class="form-label">City:</label>
                                            <input type="text" class="form-control" id="city" name="city" placeholder="City" aria-label="City" autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                            <label for="complete_address" class="form-label">Complete address:</label>
                                            <textarea class="form-control" id="complete_address" name="complete_address" placeholder="Complete address" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="postal_code" class="form-label">Postal code:</label>
                                            <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Postal code" aria-label="Postal code" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <label class="form-label"><strong>Items:</strong></label>
                                    <button type="button" class="btn btn-primary" id="tambah_item"><i class="fa fa-plus-circle"></i> Item</button>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="item_name" class="form-label">Name:</label>
                                            <input type="text" class="form-control" id="item_name" name="item_name[]" placeholder="Name" aria-label="Name" autocomplete="off">
                                        </div>
                                        <div class="input-group mb-3">
                                            <label for="item_price" class="form-label">Price:</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                <input type="text" class="form-control format_rupiah" id="item_price" name="item_price[]" placeholder="0" aria-label="Item price" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="item_quantity" class="form-label">Quantity:</label>
                                            <input type="number" class="form-control" id="item_quantity" name="item_quantity[]" placeholder="0" aria-label="quantity" autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                            <label for="item_category" class="form-label">Category:</label>
                                            <input type="text" class="form-control" id="item_category" name="item_category[]" placeholder="Category" aria-label="Item category" autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div id="plus_item_card">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-lg btn-primary position-fixed" style="bottom: 5px; left: 50%; transform: translate(-50%, -50%); width: 80%;">Pilih Pembayaran</button>
                </div>
            </div>
        </form>
        <!-- <a href="https://checkout-staging.xendit.co/web/63c0b0f3a3c38a73609bc6b6">Lihat Pembayaran</a> -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        function mantap() {
            var rupiah = document.querySelectorAll('.format_rupiah');

            for (let i = 0; i < rupiah.length; i++) {
                rupiah[i].addEventListener('keyup', function(e) {
                    // tambahkan 'Rp.' pada saat form di ketik
                    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                    rupiah[i].value = formatRupiah(this.value);
                });
            }

            /* Fungsi formatRupiah */
            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
            }
        }

        $(document).ready(function() {

            mantap();

            var counter = 0;
            // Tambah item
            $("#tambah_item").on('click', function(e) {
                e.preventDefault()
                counter++;
                $('#plus_item_card').append(`
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-end">
                            <button type="button" class="btn btn-danger" id="hapus_item"><i class="fa fa-minus-circle"></i> Item</button>
                        </div>
                        <div class="mb-3">
                            <label for="item_name` + counter + `" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="` + counter + `" name="item_name[` + counter + `]" placeholder="Name" aria-label="Name" autocomplete="off">
                        </div>
                        <div class="input-group mb-3">
                            <label for="item_price` + counter + `" class="form-label">Price:</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">Rp. </span>
                                <input type="text" class="form-control format_rupiah" id="item_price` + counter + `" name="item_price[` + counter + `]" placeholder="0" aria-label="Item price" autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="item_quantity` + counter + `" class="form-label">Quantity:</label>
                            <input type="number" class="form-control" id="item_quantity` + counter + `" name="item_quantity[` + counter + `]" placeholder="0" aria-label="quantity" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="item_category` + counter + `" class="form-label">Category:</label>
                            <input type="text" class="form-control" id="item_category` + counter + `" name="item_category[` + counter + `]" placeholder="Category" aria-label="Item category" autocomplete="off">
                        </div>
                    </div>
                </div>`);

                mantap();
            })

            // Hapus item
            $("#plus_item_card").on("click", "#hapus_item", function(e) {
                e.preventDefault()
                counter--;
                $(this).parent().parent().parent().remove();
            })

        })
    </script>
</body>

</html>