<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TAUFIK SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Batasi ukuran gambar menjadi 20px x 20px */
        .card-img-top {
            width: 155px;
            height: 155px;
            object-fit: contain; /* Agar gambar tetap proporsional dalam batasan */
        }
    </style>
</head>
<body>
    <a href="<?= base_url('toko/create'); ?>" class="btn btn-primary">Tambah Barang</a>
    <div class="container mt-4">
        <div class="d-flex flex-row flex-wrap gap-3">
            <?php foreach ($barang as $barang): ?>
                <div class="card" style="width: 10rem;">
                    <img src="<?= base_url('uploads/foto/' . $barang['foto']); ?>" class="card-img-top" alt="Foto <?= $barang['id']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $barang['nama_barang']; ?></h5>
                        <p class="card-text">Rp <?= $barang['harga']; ?></p>
                        <a href="<?= base_url('biodata/create'); ?>" class="btn btn-primary">Detail</a>
                        
                        <form action="/toko/delete/<?= $barang['id'] ?>" method="post" style="display: inline;">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
