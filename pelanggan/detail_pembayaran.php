<div class="shadow bg-white p-3 mb-3 rounded">
    <h5><strong>Detail Pembayaran</strong></h5>
</div>

<?php

$id_pembelian = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pembayaran 
    JOIN pembelian ON pembayaran.id_pembelian = pembelian.id_pembelian 
    WHERE pembayaran.id_pembelian = '$id_pembelian'");

$pecah = $ambil->fetch_assoc();
//jka pelanggan belum melakukan pembayaran 
if(empty($pecah))
{
    echo "<script>alert('Belum ada data pembayaran');</script>";
    echo "<script>location='index.php?page=pesanan';</script>";
}
//jika data pembayaran tidak sesuai dengan yg bayar atau yang login
if($_SESSION['pelanggan']['id_pelanggan']!==$pecah['id_pelanggan'])
{
    echo "<script>alert('session tidak ditemukkan');</script>";
    echo "<script>location='index.php?page=pesanan';</script>";
}

?>

<div class="alert alert-primary shadow text-dark">
    Total Tagihan Anda: <b>Rp.<?php echo number_format($pecah['total_pembelian']);?></b>
</div>

<div class="shadow bg-white p-3 mb-3 rounded">
    <div class="row">
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td><?php echo $pecah['nama'];?></td>
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <td><?php echo $pecah['bank'];?></td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>Rp.<?php echo number_format($pecah['jumlah']);?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?php echo date("d F Y", strtotime($pecah['tanggal']));?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <img src="../assets/foto_bukti/<?php echo $pecah['bukti'];?>" width="250" class="img-thumbnail img-responsive">
        </div>
    </div>
</div>
