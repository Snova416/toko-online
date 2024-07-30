<?php
session_start();

include 'koneksi/koneksi.php';

$produk = array();

$ambil =  $koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori LIMIT 8");

while($pecah = $ambil->fetch_assoc())
{
    $produk[]=$pecah;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online</title>
    <!--custom fonts for this example-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!--carousel-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <!--css-->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Navbar start -->
    <?php include 'include/navbar.php'?>
    <!-- Navbar end -->

    <div class="container">

         <!-- Hero section start -->
        <section class="hero">
            <div id="owl-nav"></div>
            <div class="owl-carousel owl-theme">

                <div class="item">
                    <img src="assets/foto/banner2.jpg">
                    <main class="content">
                        <h1>Ok <span>Komputer</span></h1>
                        <p>Solusi Untuk Semua Komputer Kamu Ada Disini</p>
                        <a href="#" class="btn btn-primary">Beli Sekarang</a>
                    </main>
                </div>

                <div class="item">
                    <img src="assets/foto/banner1.jpg">
                    <main class="content">
                        <h1>Ok <span>Komputer</span></h1>
                        <p>Solusi Untuk Semua Komputer Kamu Ada Disini</p>
                        <a href="#" class="btn btn-primary">Beli Sekarang</a>
                    </main>
                </div>

                <div class="item">
                    <img src="assets/foto/banner3.jpg">
                    <main class="content">
                        <h1>Ok <span>Komputer</span></h1>
                        <p>Solusi Untuk Semua Komputer Kamu Ada Disini</p>
                        <a href="#" class="btn btn-primary">Beli Sekarang</a>
                    </main>
                </div>
            </div>
        </section>
        <!-- Hero section end -->

        <!--about section start-->
        <section class="about">
            <div class="row">
                <div class="col-md-6 about-img">
                    <img src="assets/foto/banner1.jpg">
                </div>
                <div class="col-md-6 content">
                    <h3>Kenapa Memilih Produk Kami?</h3>
                    <p>Selamat datang di OkKomputer, pusat belanja untuk semua kebutuhan komputer dan perangkat teknologi Anda. </p>
                    <p>Kami menawarkan berbagai pilihan komputer desktop dan laptop dari merek-merek terkemuka.
                    Kami juga menyediakan solusi penyimpanan yang andal dan cepat, dari SSD internal hingga hard drive eksternal, dengan garansi yang terpercaya </p>
                </div>
            </div>
        </section>
        <!--about section end-->

        <!--produk section start-->
        <section class="produk">
           <div class="produk-box">
                <h2><span>Produk</span> Kami</h2>
           </div>
            <div class="row">

                <?php foreach ($produk as $key => $value):?>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="assets/foto_produk/<?php echo $value['foto_produk'];?>">
                                <div class="card-body content">
                                    <h5><?php echo $value['nama_produk'];?></h5>
                                    <p>Rp<?php echo number_format($value['harga_produk']);?></p>
                                    <a href="beli.php?idproduk=<?php echo $value ['id_produk'];?>" class="btn btn-success">
                                        <i class="fas fa-shopping-cart"></i>Keranjang
                                    </a>
                                    <a href="detail_produk.php?idproduk=<?php echo $value ['id_produk'];?>" class="btn btn-success">
                                        <i class="fas fa-eye"></i>Detail
                                    </a>
                                </div>
                        </div>
                    </div>
                    <?php endforeach?>

            
            </div>
        </section>
        <!--produk section end-->

        <!--kontak section start-->
        <div class="kontak">
            <h2 class="judul"><span>Kontak</span> Kami</h2>
            <div class="row">

                <div class="col-md-6 kontak-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.
                    9561927572154!2d98.67410617587798!3d3.597513696376614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.
                    1!3m3!1m2!1s0x303131c27e4e156f%3A0xe38d39cc24a23675!2sJl.%20Putri%20Merak%20Jingga%2C%20Kesawan%2C%20Kec.
                    %20Medan%20Bar.%2C%20Kota%20Medan%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1718286226188!5m2!1sid!2sid" 
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6 kontak-form">
                   <form method="post">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group row">
                                 <label class="col-sm-4 col-form-label">Nama Lengkap :</label>
                                <div class="col-sm-8">
                                   <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                 <label class="col-sm-4 col-form-label">Email :</label>
                                <div class="col-sm-8">
                                   <input type="email" name="email" class="form-control" placeholder="Masukkan Email Anda" required>
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                 <label class="col-sm-4 col-form-label">No Whatsapps :</label>
                                <div class="col-sm-8">
                                   <input type="text" name="telepon" class="form-control" placeholder="Masukkan No Whatsapps Anda" required>
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                 <label class="col-sm-4 col-form-label">Pesan :</label>
                                <div class="col-sm-8">
                                   <textarea type="text" name="pesan" class="form-control" placeholder="Masukkan Pesan Anda" required></textarea>
                                </div>
                            </div>

                           <div class="text-right">
                                <button name="kirim" class="btn btn-success">Kirim</button>
                           </div>

                        </div>
                    </div>
                   </form>
                </div>

            </div>
        </div>
        <!--kontak section end-->


    </div>

    <?php
    
    if(isset($_POST['kirim']))
    {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];
        $pesan = $_POST['pesan'];

        $koneksi->query("INSERT INTO pesan
        (nama,email,telepon,isi_pesan) VALUES
        ('$nama','$email','$telepon','$isi_pesan')");

        echo "<script>alert('pesan terkirim');</script>";
        echo "<script>location='kontak.php';</script>";
    }
    
    ?>

    <?php include 'include/footer.php';?>

    <!-- Content here -->

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
    <!--owl carousel js-->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- Custom scripts for the menu button -->
    <script src="assets/js/main.js"></script>
</body>
</html>
