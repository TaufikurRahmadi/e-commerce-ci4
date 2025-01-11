<!DOCTYPE html>
<html lang="en">

<head>

    
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Taufik shop</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <h2 style="color: blue; font: calibri">
                        Taufik shop
                    </h2>
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">

                            <!-- Dropdown - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-shopping-cart"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown"
                                style="max-width: 500px; max-height: 400px; overflow-y: auto;">
                                <h6 class="dropdown-header">
                                    Keranjang Belanja
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
                                            <?php foreach ($keranjang as $index => $cartItem): ?>
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
            <form action="<?= base_url('toko/deletefromcart/' . $cartItem['barang_id']); ?>" method="post">
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
                                        <a href="<?= base_url('/toko/pesan'); ?>"
                                            class="btn btn-primary btn-sm">Checkout</a>
                                    </div>
                                <?php else: ?>
                                    <p class="text-center text-muted mt-3">Keranjang kosong.</p>
                                <?php endif; ?>
                            </div>
                        </li>

                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
            <?= user() ? user()->username : 'Guest'; ?>
        </span>
        <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <?php if (user()): ?>
            <!-- Jika pengguna login -->
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= base_url('logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
        <?php else: ?>
            <!-- Jika pengguna belum login -->
            <a class="dropdown-item" href="<?= base_url('/toko'); ?>">
                <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Login
            </a>
        <?php endif; ?>
    </div>
</li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

            </div>
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href=" <?= base_url('logout');?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
            <!-- End of Main Content -->
            <div class="d-flex flex-wrap gap-3 justify-content-start">
                <?php foreach ($barang as $item): ?>
                    <div class="card"
                        style="width: 12rem; height: 100%; display: flex; flex-direction: column; justify-content: space-between;">
                        <img src="<?= base_url('uploads/foto/' . $item['foto']); ?>" class="card-img-top"
                            alt="<?= $item['nama_barang']; ?>" style="object-fit: cover; height: 8rem;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-truncate" title="<?= $item['nama_barang']; ?>">
                                <?= $item['nama_barang']; ?>
                            </h5>
                            <p class="card-text">Rp <?= number_format($item['harga'], 0, ',', '.'); ?></p>
                            <form action="toko/addToCart/<?= $item['barang_id'] ?>" method="post" class="mt-auto">
                                <?= csrf_field() ?>
                                <div class="mb-2">
                                    <label for="jumlah_<?= $item['barang_id'] ?>" class="form-label">Jumlah</label>
                                    <input type="number" name="jumlah" id="jumlah_<?= $item['barang_id'] ?>"
                                        class="form-control" value="1" min="1" required>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <!-- Tombol Detail -->
                                    <a href="<?= base_url('/toko/detail/' . $item['barang_id']); ?>" class="btn btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <!-- Tombol Tambah ke Keranjang -->
                                    <button type="<?= base_url('/toko'); ?>" class="btn btn-success">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>
    <script src="<?= base_url(); ?>/js/scriptstampilan.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>