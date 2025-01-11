<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pesanan</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css'); ?>">
</head>
<body>
    <div class="container mt-5">
        <h1>Kelola Pesanan</h1>

        <!-- Pesan Sukses -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <!-- Pesan Error -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pelanggan</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($orders) && count($orders) > 0): ?>
                    <?php foreach ($orders as $index => $order): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $order['user_id'] ?></td>
                            <td><?= $order['id'] ?></td>
                            <td>Rp <?= number_format($order['total_harga'], 0, ',', '.') ?></td>
                            <td><?= $order['status'] ?></td>
                            <td>
                                <form action="<?= base_url('admin/orders/update/' . $order['id']); ?>" method="post">
                                    <?= csrf_field() ?>
                                    <select name="status" class="form-control mb-2">
                                        <option value="Belum Diproses" <?= $order['status'] === 'Belum Diproses' ? 'selected' : '' ?>>Belum Diproses</option>
                                        <option value="Diproses" <?= $order['status'] === 'Diproses' ? 'selected' : '' ?>>Diproses</option>
                                        <option value="Selesai" <?= $order['status'] === 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </form>
                                <form action="<?= base_url('admin/orders/delete/' . $order['id']); ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">Belum ada pesanan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
