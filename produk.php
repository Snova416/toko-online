<?php
session_start();

include 'koneksi/koneksi.php';

$produk = array();

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $cariproduk = array();
    $ambil = $koneksi->query("SELECT * FROM produk 
        WHERE nama_produk LIKE '%$keyword%' 
        OR deskripsi_produk LIKE '%$keyword%'");
    while ($pecah = $ambil->fetch_assoc()) {
        $cariproduk[] = $pecah;
    }
    $produk = $cariproduk;
} elseif (isset($_GET['id_kategori'])) {
    $id_kategori = $_GET['id_kategori'];
    $ambil = $koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE produk.id_kategori='$id_kategori'");
    while ($pecah = $ambil->fetch_assoc()) {
        $produk[] = $pecah;
    }
} else {
    $ambil = $koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori");
    while ($pecah = $ambil->fetch_assoc()) {
        $produk[] = $pecah;
    }
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
    
    <!-- Navbar -->
    <?php include 'include/navbar.php';?>

    <section class="page-produk">
        <div class="container">
            <!-- Breadcrumb -->
            <ul class="breadcrumb">
                <li><a href="index.php">Beranda</a></li>
                <li>Produk</li>
                <?php if(isset($keyword)): ?>
                    <li><?php echo htmlspecialchars($keyword); ?></li>
                <?php endif; ?>    
            </ul>

            <div class="row">
                <div class="col-md-3">
                    <!-- Sidebar -->
                    <?php include 'include/sidebar.php';?>
                </div>

                <div class="col-md-9">
                    <div class="card box">
                        <div class="card-body">
                            <h2>Produk Kami</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident 
                                quo expedita sunt rerum veniam, facere laudantium labore aliquam illo 
                                praesentium maxime ex obcaecati ducimus nisi commodi, et voluptate? Labore, natus.
                            </p>
                        </div>
                    </div>

                    <div class="row produk">
                        <?php if (!empty($produk)): ?>
                            <?php foreach ($produk as $key => $value): ?>
                                <div class="col-md-4 card-produk">
                                    <div class="card">
                                        <img src="assets/foto_produk/<?php echo $value['foto_produk']; ?>" alt="<?php echo htmlspecialchars($value['nama_produk']); ?>">
                                        <div class="card-body content">
                                            <h5><?php echo htmlspecialchars($value['nama_produk']); ?></h5>
                                            <p>Rp<?php echo number_format($value['harga_produk']); ?></p>
                                            <a href="beli.php?idproduk=<?php echo $value['id_produk']; ?>" class="btn btn-success">
                                                <i class="fas fa-shopping-cart"></i> Keranjang
                                            </a>
                                            <a href="detail_produk.php?idproduk=<?php echo $value['id_produk']; ?>" class="btn btn-success">
                                                <i class="fas fa-eye"></i> Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-md-12">
                                <div class="alert alert-danger shadow">
                                    <p>Pencarian Produk Tidak Ditemukan</p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="pagination justify-content-center">
                        <!-- Pagination links here -->
                        <li class="page-item prev disabled">
                            <a href="#" class="page-link">Prev</a>
                        </li>

                        <li class="page-item halaman">
                            <a href="#" class="page-link active">1</a>
                        </li>

                        <li class="page-item dots">
                            <a href="#" class="page-link">...</a>
                        </li>

                        <li class="page-item halaman">
                            <a href="#" class="page-link">5</a>
                        </li>

                        <li class="page-item halaman">
                            <a href="#" class="page-link">6</a>
                        </li>
                        
                        <li class="page-item dots">
                            <a href="#" class="page-link">...</a>
                        </li>

                        <li class="page-item halaman">
                            <a href="#" class="page-link">10</a>
                        </li>

                        <li class="page-item next">
                            <a href="#" class="page-link">Next</a>
                        </li>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
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
