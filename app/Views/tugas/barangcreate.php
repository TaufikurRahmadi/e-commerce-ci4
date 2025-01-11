<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Biodata</title>
</head>
<body>
    <h1 >Tambah Biodata</h1>
    <form action="<?= base_url('toko/store'); ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <label>Nama Barang:</label>
        <input type="text" name="nama_barang" required><br>
        <label>Harga:</label>
        <input type="text" name="harga" required><br>
        <label>Foto:</label>
        <input type="file" name="foto" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
