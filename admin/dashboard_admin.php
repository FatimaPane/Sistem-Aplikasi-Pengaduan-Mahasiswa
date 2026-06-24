<?php
session_start();

if($_SESSION['login'] != true){
    header("location:../login.php");
}

include '../koneksi.php';


// TOTAL PENGADUAN

$total = mysqli_query($conn,
"SELECT * FROM pengaduan");

$total_pengaduan = mysqli_num_rows($total);


// MENUNGGU

$menunggu = mysqli_query($conn,
"SELECT * FROM pengaduan
WHERE status='Menunggu'");

$total_menunggu = mysqli_num_rows($menunggu);


// DIPROSES

$diproses = mysqli_query($conn,
"SELECT * FROM pengaduan
WHERE status='Diproses'");

$total_diproses = mysqli_num_rows($diproses);


// SELESAI

$selesai = mysqli_query($conn,
"SELECT * FROM pengaduan
WHERE status='Selesai'");

$total_selesai = mysqli_num_rows($selesai);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

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
        <i class="bi bi-person-workspace"></i>
        Admin Panel
    </h4>

    <a href="dashboard_admin.php">
        <i class="bi bi-house-door-fill"></i>
        Dashboard
    </a>

    <a href="data_pengaduan.php">
        <i class="bi bi-table"></i>
        Data Pengaduan
    </a>

    <a href="../logout.php">
        <i class="bi bi-box-arrow-left"></i>
        Logout
    </a>

</div>


<!-- CONTENT -->

<div class="content">

    <h3 class="mb-4">
        Dashboard Admin
    </h3>

    <p>
        Selamat datang, <b>Admin</b>
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