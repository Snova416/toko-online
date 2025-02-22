<?php
session_start();
include '../koneksi/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin - Login</title>
    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
<br><br>
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form method="post" class="user">
                                    <div class="form-group">
                                        <input type="text" name="user" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="pass" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                                    </div>                            
                                    <button name="login" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="../assets/js/sb-admin-2.min.js"></script>
</body>
</html>

<?php
if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = sha1($_POST['pass']);

    $ambil = $koneksi->query("SELECT * FROM admin WHERE username='$user' AND password='$pass'");
    $akun = $ambil->num_rows;

    if ($akun == 1) {
        $_SESSION['admin'] = $ambil->fetch_assoc();
        echo "<script>alert('Login Berhasil');</script>";
        echo "<script>location = 'index.php';</script>";
    } else {
        echo "<script>alert('Username atau Password Salah');</script>";
        echo "<script>location = 'login.php';</script>";
    }
}
?>
