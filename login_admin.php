<!DOCTYPE htmL>

<html Lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Login Admin Aplikasi Perpustakaan Digital Sekolah</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>


<body class="bg-light">
    <div class="vh-100 row justify-content-center align-items-center">
        <form method="post" action="#" class="col-md-3 border p-4 bg-white rounded-4">
            <h4 class="text-center">Login Admin</h4>
            <h5 cLass="text-center mb-3">Aplikasi Perpustakaan Digital Sekolah</h5>
            <input name="username" class="form-control mb-3" placeholder="Username">
            <input name="password" type="password" class="form-control mb-3" placeholder="Password">
            <button type="submit" name="tombol" cLass="btn btn-success w-100 mb-2">Login</button>
            <a href="login_anggota.php" cLass="text-decoration-none">Login sebagai Anggota Perpustakaan..?</a>
        </form>
    </div>


</body>

</html>
<?php
if (isset($_POST['tombol'])) {
    include 'koneksi.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT*FROM admin WHERE username='$username'AND password='$password'";
    $data = mysqli_query($koneksi, $query);
    if (mysqli_num_rows($data) > 0) {
        $data = mysqli_fetch_array($data);
        session_start();
        $_SESSION['id_admin']    = $data['id_admin'];
        $_SESSION['nama_admin']  = $data['nama_admin'];
        $_SESSION['username']    = $data['username'];
        header("Location: admin/dashboard.php");
    } else {
        echo "<script>alert('Login Gagal,Username /Password Salah')</script>";
    }
}
?>