<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown"
                                style="max-width: 500px; max-height: 400px; overflow-y: auto;">
                                <h6 class="dropdown-header">
                                    PESANAN
                                </h6>
                                <?php if (!empty($keranjang)): ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th style="width: 10%;">No</th>
                                                    <th style="width: 20%;">Gambar</th>
                                                    <th style="width: 30%;">Nama Barang</th>
                                                    <th style="width: 15%;">Harga</th>
                                                    <th style="width: 10%;">Jumlah</th>
                                                    <th style="width: 15%;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
    $totalBelanja = 0; // Variabel untuk menghitung total belanja
    foreach ($keranjang as $index => $cartItem): 
        $totalBelanja += $cartItem['harga'] * $cartItem['jumlah']; // Mengakumulasi total belanja
    ?>
                                                    <tr>
                                                        <td><?= $index + 1 ?></td>
                                                        <td>
                                                            <img src="<?= base_url('uploads/foto/' . $cartItem['foto']); ?>"
                                                                alt="<?= $cartItem['nama_barang'] ?>"
                                                                style="width: 50px; height: 50px; object-fit: cover;">
                                                        </td>
                                                        <td><?= $cartItem['nama_barang'] ?></td>
                                                        <td>Rp <?= number_format($cartItem['harga'], 0, ',', '.') ?></td>
                                                        <td><?= $cartItem['jumlah'] ?></td>
                                                        <td>
                                                            <form
                                                                action="<?= base_url('toko/deletefromcart/' . $cartItem['order_id']); ?>"
                                                                method="post">
                                                                <?= csrf_field() ?>
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Hapus barang ini?')">Hapus</button>
                                                            </form>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-center mt-3">
                                    <h4>Total Belanja: Rp <?= number_format($totalBelanja, 0, ',', '.') ?></h4>
                                    <form action="<?= base_url('checkout'); ?>" method="post">
    <?= csrf_field() ?>
    <button type="submit" class="btn btn-primary">Checkout</button>
</form>

                                    </div>
                                <?php else: ?>
                                    <p class="text-center text-muted mt-3">BELUM ADA PESANAN</p>
                                <?php endif; ?>
                            </div>