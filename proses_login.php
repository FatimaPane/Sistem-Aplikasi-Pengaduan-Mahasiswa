<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];


// ================= LOGIN ADMIN =================

$query_admin = mysqli_query($conn,
"SELECT * FROM admin
WHERE username='$username'
AND password='$password'");

$data_admin = mysqli_num_rows($query_admin);

if($data_admin > 0){

    $_SESSION['login'] = true;
    $_SESSION['role'] = "admin";

    header("Location: admin/dashboard_admin.php");
    exit;
}


// ================= LOGIN MAHASISWA =================

$query_mahasiswa = mysqli_query($conn,
"SELECT * FROM mahasiswa
WHERE email='$username'
AND password='$password'");

$data_mahasiswa = mysqli_num_rows($query_mahasiswa);

if($data_mahasiswa > 0){

    $mhs = mysqli_fetch_assoc($query_mahasiswa);

    $_SESSION['login'] = true;
    $_SESSION['role'] = "mahasiswa";

    $_SESSION['id_mahasiswa'] = $mhs['id_mahasiswa'];
    $_SESSION['nama'] = $mhs['nama'];

    header("Location: mahasiswa/dashboard_mahasiswa.php");
    exit;
}


// ================= LOGIN GAGAL =================

echo "
<script>
alert('Username atau Password salah!');
window.location='login.php';
</script>
";

?>