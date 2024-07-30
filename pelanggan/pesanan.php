<div class="shadow bg-white p-3 mb-3 rounded">
    <h5><strong> Pesanan Saya</strong></h5>
</div>

<?php

$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];

$pembelian = array();
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan
WHERE pembelian.id_pelanggan='$id_pelanggan'");

while($pecah = $ambil->fetch_assoc())
{
    $pembelian[]=$pecah;
}

?>

<div class="card shadow">
    <div class="card-body">
        <table class="table table-bordered table-hover table-strong">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($pembelian as $key => $value): ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td>
                        <?php echo date("d F Y", strtotime($value['tanggal_pembelian'])); ?>
                    </td>
                    <td>
                        Rp<?php echo number_format($value['total_pembelian']); ?>
                    </td>
                    <td class="text-center <?php echo ($value['status'] == 'pending') ? 'text-danger' : 'text-success'; ?>">
                        <?php echo $value['status']; ?><br>
                        <!-- jika resi pengiriman tidak kosong -->
                        <?php if(!empty($value['resi_pengiriman'])): ?>
                            <?php echo $value['resi_pengiriman']; ?>
                        <?php endif; ?>
                    </td>
                    <td class="text-center" width="250">
                        <a href="index.php?page=detail_pembelian&id=<?php echo $value['id_pembelian']; ?>" class="btn btn-primary">Nota</a>
                        <?php if($value['status'] == 'pending'): ?>
                            <a href="index.php?page=pembayaran&id=<?php echo $value['id_pembelian']; ?>" class="btn btn-success">Input Pembayaran</a>
                        <?php else: ?>
                            <a href="index.php?page=detail_pembayaran&id=<?php echo $value['id_pembelian']; ?>" class="btn btn-info">Lihat Pembayaran</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>    
            </tbody>
        </table>
    </div>
</div>
