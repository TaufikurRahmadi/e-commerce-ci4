<div class="d-flex flex-row flex-wrap gap-3">
        <?php foreach ($barang as $item): ?>
            <div class="card" style="width: 12rem;">
                <img src="<?= base_url('uploads/foto/' . $item['foto']); ?>" class="card-img-top" alt="<?= $item['nama_barang']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $item['nama_barang']; ?></h5>
                    <p class="card-text">Rp <?= number_format($item['harga'], 0, ',', '.'); ?></p>
                    <form action="../toko/addToCart/<?= $item['barang_id'] ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="mb-2">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah_<?= $item['barang_id'] ?>" class="form-control" value="1" min="1" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <!-- Tombol Detail -->
                            <a href="<?= base_url('/toko/detail/' . $item['barang_id']); ?>" class="btn btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <!-- Tombol Tambah ke Keranjang -->
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    