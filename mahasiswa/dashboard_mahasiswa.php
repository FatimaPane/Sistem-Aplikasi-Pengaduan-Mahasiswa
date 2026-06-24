<?php
session_start();

if($_SESSION['login'] != true){
    header("location:../login.php");
}

include '../koneksi.php';

$id_mahasiswa = $_SESSION['id_mahasiswa'];


// TOTAL PENGADUAN

$total = mysqli_query($conn,
"SELECT * FROM pengaduan 
WHERE id_mahasiswa='$id_mahasiswa'");

$total_pengaduan = mysqli_num_rows($total);


// STATUS MENUNGGU

$menunggu = mysqli_query($conn,
"SELECT * FROM pengaduan 
WHERE status='Menunggu'
AND id_mahasiswa='$id_mahasiswa'");

$total_menunggu = mysqli_num_rows($menunggu);


// STATUS DIPROSES

$diproses = mysqli_query($conn,
"SELECT * FROM pengaduan 
WHERE status='Diproses'
AND id_mahasiswa='$id_mahasiswa'");

$total_diproses = mysqli_num_rows($diproses);


// STATUS SELESAI

$selesai = mysqli_query($conn,
"SELECT * FROM pengaduan 
WHERE status='Selesai'
AND id_mahasiswa='$id_mahasiswa'");

$total_selesai = mysqli_num_rows($selesai);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            background: #f4f6f9;
        }

        .sidebar{
            width: 250px;
            height: 100vh;
            background: #0d1b52;
            position: fixed;
            color: white;
        }

        .sidebar h4{
            padding: 20px;
        }

        .sidebar a{
            display: block;
            color: white;
            text-decoration: none;
            padding: 15px 20px;
            transition: 0.3s;
        }

        .sidebar a:hover{
            background: #0b5ed7;
        }

        .content{
            margin-left: 250px;
            padding: 30px;
        }

        .card-box{
            border-radius: 15px;
            padding: 20px;
            color: white;
        }

        .bg1{
            background: #0d6efd;
        }

        .bg2{
            background: #ffc107;
        }

        .bg3{
            background: #198754;
        }

        .bg4{
            background: #6f42c1;
        }

    </style>

</head>
<body>

<!-- SIDEBAR -->

<div class="sidebar">

    <h4>
        <i class="bi bi-shield-fill"></i>
        Pengaduan
    </h4>

    <a href="dashboard_mahasiswa.php">
        <i class="bi bi-house-door-fill"></i>
        Dashboard
    </a>

    <a href="kirim_pengaduan.php">
        <i class="bi bi-pencil-square"></i>
        Kirim Pengaduan
    </a>

    <a href="status_pengaduan.php">
        <i class="bi bi-clipboard-check-fill"></i>
        Status Pengaduan
    </a>

    <a href="../logout.php">
        <i class="bi bi-box-arrow-left"></i>
        Logout
    </a>

</div>


<!-- CONTENT -->

<div class="content">

    <h3 class="mb-4">
        Dashboard
    </h3>

    <p>
        Selamat datang,
        <b><?php echo $_SESSION['nama']; ?></b>
    </p>

    <div class="row mt-4">

        <div class="col-md-3">

            <div class="card-box bg1">

                <h2>
                    <?php echo $total_pengaduan; ?>
                </h2>

                <p>Total Pengaduan</p>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card-box bg2">

                <h2>
                    <?php echo $total_menunggu; ?>
                </h2>

                <p>Menunggu</p>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card-box bg3">

                <h2>
                    <?php echo $total_diproses; ?>
                </h2>

                <p>Diproses</p>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card-box bg4">

                <h2>
                    <?php echo $total_selesai; ?>
                </h2>

                <p>Selesai</p>

            </div>

        </div>

    </div>

</div>

</body>
</html>