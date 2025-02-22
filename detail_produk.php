<?php
session_start();

include 'koneksi/koneksi.php';

$id_produk = $_GET['idproduk'];

// Ambil data produk berdasarkan id_produk
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$produk = $ambil->fetch_assoc();

$produkfoto = array();
$ambil = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$id_produk'");
while($pecah = $ambil->fetch_assoc()) {
    $produkfoto[] = $pecah;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Produk</title>
    <!-- Custom fonts for this example -->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
    <?php include 'include/navbar.php';?>

    <section class="page-produk">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.php">Beranda</a></li>
                <li>Detail Produk</li>
            </ul>

            <div class="row">
                <div class="col-md-3">
                    <?php include 'include/sidebar.php';?>
                </div>

                <div class="col-md-9 detail-produk">
                    <div class="row">
                        <div class="col-6">
                            <div id="owl-nav"></div>
                            <div class="owl-carousel owl-theme">
                               <?php foreach ($produkfoto as $value): ?>
                                    <div class="item">
                                        <img src="assets/foto_produk/<?php echo $value['nama_produk_foto']; ?>" alt="Produk Foto">
                                    </div>
                                <?php endforeach; ?>                            
                            </div>
                        </div>

                        <div class="col-6 detail-form">
                            <form method="post">
                                <div class="card">
                                    <div class="card-body">
                                        <h3><?php echo $produk['nama_produk']; ?></h3>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Jumlah:</label>
                                            <div class="col-sm-9">
                                                <input type="number" name="jumlah" class="form-control" value="1" min="1" max="<?php echo $produk['stok_produk']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Stok:</label>
                                            <div class="col-sm-9">
                                                <input disabled class="form-control" value="<?php echo $produk['stok_produk']; ?>">
                                            </div>
                                        </div>
                                        <h5>Rp<?php echo number_format($produk['harga_produk']); ?></h5>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button name="beli" class="btn btn-success">
                                            <i class="fas fa-shopping-cart"></i> Keranjang
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card detail">
                        <div class="card-body">
                            <h2>Detail Produk</h2>
                            <p>
                                <?php echo $produk['deskripsi_produk']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    
    if(isset($_POST['beli']))
    {
        $jumlah = $_POST['jumlah'];
        
        $_SESSION['keranjang_belanja'][$id_produk] = $jumlah;
        
        echo "<script>alert('produk berhasil masuk ke keranjang');</script>";
        echo "<script>location='keranjang.php';</script>";
    }

    ?>

    <?php include 'include/footer.php';?>
    
    <!-- Bootstrap core JavaScript -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript -->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages -->
    <script src="assets/js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- Custom scripts for the menu button -->
    <script src="assets/js/main.js"></script>
</body>
</html>
