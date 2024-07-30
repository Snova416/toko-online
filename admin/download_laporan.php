<?php
// Require composer autoload
require_once '../koneksi/koneksi.php';
require_once '../vendor/autoload.php';

// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

$tgl_mulai = $_GET['tglm'];
$tgl_selesai = $_GET['tgls'];
$status = $_GET['status'];

$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan
    WHERE status='$status' AND tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai'");

while($pecah = $ambil->fetch_assoc()) {
    $semuadata[] = $pecah;
}

$html = '
<h2 style="text-align: center;">Data Laporan Pembelian</h2>
<div style="border: 2px solid black; margin: 0 500px 0;"></div>
<table border="1" style="border: 1px solid #f2f2f2; color: #232323; width: 100%; text-align: center; margin-top: 20px;">
    <tr style="background: #35a9db; color: #fff;">
        <th>No</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Jumlah</th>
    </tr>';

$total = 0;
foreach($semuadata as $key => $value):
    $total += $value['total_pembelian'];
    $html .= '
    <tr>
        <td>'.($key+1).'</td>
        <td>'.$value['nama_pelanggan'].'</td>
        <td>'.date ("d F Y", strtotime($value['tanggal_pembelian'])).'</td>
        <td>'.$value['status'].'</td>
        <td>Rp. '.number_format($value['total_pembelian'], 0, ',', '.').'</td>
    </tr>';
endforeach; 

$html .= '
    <tr>
        <th colspan="4">Total</th>
        <th>Rp. '.number_format($total, 0, ',', '.').'</th>
    </tr>
</table>';

// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
?>
