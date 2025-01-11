<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Biodata</title>
</head>
<body>
    <h1>Tambah Biodata</h1>
    <form action="<?= base_url('biodata/store'); ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <label>Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" required><br>
        <label>NIM:</label>
        <input type="text" name="nim" required><br>
        <label>Program Studi:</label>
        <input type="text" name="program_studi" required><br>
        <label>Alamat:</label>
        <textarea name="alamat" required></textarea><br>
        <label>No. Telepon:</label>
        <input type="text" name="no_telepon" required><br>
        <label>Foto:</label>
        <input type="file" name="foto" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
