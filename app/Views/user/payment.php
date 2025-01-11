<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="YOUR_CLIENT_KEY"></script>
</head>
<body>
    <h1>Payment</h1>
    <button id="pay-button">Bayar Sekarang</button>

    <script>
        document.getElementById('pay-button').onclick = function () {
            snap.pay('<?= $snapToken ?>', {
                onSuccess: function(result) {
                    alert('Pembayaran berhasil!');
                    // Redirect atau lakukan sesuatu setelah pembayaran berhasil
                },
                onPending: function(result) {
                    alert('Pembayaran sedang diproses!');
                    // Redirect atau lakukan sesuatu setelah pembayaran pending
                },
                onError: function(result) {
                    alert('Pembayaran gagal!');
                    // Redirect atau lakukan sesuatu setelah pembayaran gagal
                }
            });
        };
    </script>
</body>
</html>