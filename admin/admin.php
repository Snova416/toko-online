<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Admin</b></h5>
</div>

<?php

$id_admin = $_SESSION['admin']['id_admin'];

$ambil = $koneksi->query("SELECT * FROM admin 
    WHERE id_admin='$id_admin'");
$admin = $ambil->fetch_assoc();

?>


<div class="card shadow bg-white mt-3">
    <div class="card-body">
     <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-9">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama :</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" class="form-control"value="<?php echo $admin['nama_lengkap'];?>">
                    </div> 
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Username:</label>
                    <div class="col-sm-9">
                        <input type="text" name="user" class="form-control"value="<?php echo $admin['username'];?>">
                    </div> 
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Password:</label>
                    <div class="col-sm-9">
                        <input type="text" name="pass" class="form-control" placeholder="Kosongkan Password Jika tidak Diubah!">
                        <small class="text-danger">Kosongkan Password Jika tidak Diubah!</small>
                    </div> 
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                       <button name="update" class="btn btn-sm btn-primary">Update</button>
                    </div> 
                </div>
            </div>

            <div class="col-md-3">
                <img src="../assets/foto_admin/<?php echo $admin['foto_admin'];?>" width="250" class="img-thumbnail img-responsive" >
                <input type="file" name="foto" class="form-control">
            </div>
        </div>
     </form>
    </div>
</div>

<?php

if(isset($_POST['update']))
{
    $nama = $_POST['nama'];
    $user = $_POST['user'];
    
    $nama_foto = $_FILES['foto']['name'];
    $lokasi_foto = $_FILES['foto']['tmp_name'];

    if(!empty($lokasi_foto) OR !empty($_POST['pass']))
    {
        $pass = sha1($_POST['pass']);
        move_uploaded_file($lokasi_foto, "../assets/foto_admin/".$nama_foto);

        $koneksi->query("UPDATE admin SET 
        username='$user',
        password='$pass',
        nama_lengkap='$nama',
        foto_admin='$nama_foto'
        WHERE id_admin='$id_admin'");
    }
    else
    {
        $koneksi->query("UPDATE admin SET 
        username='$user',
        nama_lengkap='$nama'
        WHERE id_admin='$id_admin'");
    }
    echo "<script>alert('data berhasil diupdate');</script>";
    echo "<script>location='index.php?halaman=admin';</script>";
}

?>