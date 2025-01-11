<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <style>
        .card-img-top {
            max-width: 200px;
            max-height: 200px;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="container mt-4">
        <h1>Detail Produk</h1>
        <a href="<?= base_url('/toko'); ?>" class="btn btn-info">
            <i class="fa fa-solid fa-arrow-left"> Kembali</i>
        </a>
        <hr>
        <form action="addToCart/<?= $barang['barang_id'] ?>" method="post" class="mt-auto">
            <?= csrf_field() ?>
            <div class="container-fluid pb-5">
                <div class="row px-xl-5">
                    <div class="col-lg-5 mb-30">
                        <div id="product-carousel">
                            <div class="carousel-inner bg-light">

                                <img src="<?= base_url('uploads/foto/' . $barang['foto']); ?>" class="w-100 h-100"
                                    alt="<?= $barang['nama_barang']; ?>">

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 h-auto mb-30">
                        <div class="h-100 bg-light p-30">
                            <h3><?= $barang['nama_barang'] ?></h3>
                            <h3 class="font-weight-semi-bold mb-4">Rp
                                <?= number_format($barang['harga'], 0, ',', '.') ?>
                            </h3>
                            <p class="mb-4"><?= $barang['tentang'] ?></p>
                            <div class="mb-2">
                                <label for="jumlah_<?= $barang['barang_id'] ?>" class="form-label"></label>
                                <input type="number" name="jumlah" id="jumlah_<?= $barang['barang_id'] ?>" class=""
                                    value="1" min="1" required>
                                <button type="<?= base_url('/toko'); ?>" class="btn btn-success">
                                    <i class="fas fa-shopping-cart"> Add To Cart</i>
                                </button>
                            </div>

                            <!-- untuk menambahkan size -->
                            <!-- <div class="d-flex mb-3">
                            <strong class="text-dark mr-3">Sizes:</strong>
                            <form>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-1" name="size">
                                    <label class="custom-control-label" for="size-1">XS</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-2" name="size">
                                    <label class="custom-control-label" for="size-2">S</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-3" name="size">
                                    <label class="custom-control-label" for="size-3">M</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-4" name="size">
                                    <label class="custom-control-label" for="size-4">L</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-5" name="size">
                                    <label class="custom-control-label" for="size-5">XL</label>
                                </div>
                            </form>
                        </div> -->

                        </div>
                    </div>
                </div>
            </div>
        </form>



    </div>
    </div>
</body>
<script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>
<script src="<?= base_url(); ?>/js/scriptstampilan.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>