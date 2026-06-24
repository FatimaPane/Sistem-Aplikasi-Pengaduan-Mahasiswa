<?php

session_start();

if($_SESSION['login'] != true){
    header("location:../login.php");
}

include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($conn,
"DELETE FROM pengaduan
WHERE id_pengaduan='$id'");

echo "
<script>
alert('Data pengaduan berhasil dihapus!');
window.location='data_pengaduan.php';
</script>
";

?>