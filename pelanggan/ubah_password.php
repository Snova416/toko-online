<?php
session_start(); // Memastikan sesi sudah dimulai

if (isset($_SESSION['pelanggan']['id_pelanggan'])) {
    $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
} else {
    // Jika id_pelanggan tidak ditemukan di sesi, arahkan pengguna ke halaman login
    echo "<script>alert('Anda belum login, silakan login terlebih dahulu');</script>";
    echo "<script>location='../login.php';</script>";
    exit();
}
?>

<div class="p-3 mb-3 shadow rounded">
    <h4>Update Password</h4>
</div>

<div class="p-3 mb-3 shadow rounded">
    <form method="post">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Password Lama:</label>
            <div class="col-sm-9">
                <input type="password" name="pass_lama" class="form-control" placeholder="Masukkan Password Lama anda">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Password Baru:</label>
            <div class="col-sm-9">
                <input type="password" name="pass_baru" class="form-control" placeholder="Masukkan Password Baru anda">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
                <button name="update" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>

<?php
if (isset($_POST['update'])) {
    $pass_lama = sha1($_POST['pass_lama']);
    $pass_baru = sha1($_POST['pass_baru']);

    $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan' AND password_pelanggan='$pass_lama'");
    $pass = $ambil->num_rows;
    if ($pass == 1) {
        $koneksi->query("UPDATE pelanggan SET password_pelanggan='$pass_baru' WHERE id_pelanggan='$id_pelanggan'");
        echo "<script>alert('Password berhasil diupdate');</script>";
        echo "<script>location='../login.php';</script>";
    } else {
        echo "<script>alert('Password Salah');</script>";
        echo "<script>location='index.php?page=ubah_password';</script>";
    }
}
?>
