<?php
session_start();

if($_SESSION['login'] != true){
    header("location:../login.php");
}

include '../koneksi.php';

$id_mahasiswa = $_SESSION['id_mahasiswa'];

$data = mysqli_query($conn,
"SELECT * FROM pengaduan
WHERE id_mahasiswa='$id_mahasiswa'
ORDER BY id_pengaduan DESC");

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pengaduan</title>

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

        .table-box{
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
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
        Status Pengaduan
    </h3>

    <div class="table-box">

        <table class="table table-bordered table-hover">

            <thead class="table-primary">

                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>

            </thead>

            <tbody>

                <?php
                $no = 1;

                while($d = mysqli_fetch_array($data)){
                ?>

                <tr>

                    <td><?php echo $no++; ?></td>

                    <td>
                        <?php echo $d['judul_pengaduan']; ?>
                    </td>

                    <td>
                        <?php echo $d['kategori']; ?>
                    </td>

                    <td>

                        <?php
                        if($d['status'] == "Menunggu"){
                            echo "<span class='badge bg-warning'>Menunggu</span>";
                        }
                        elseif($d['status'] == "Diproses"){
                            echo "<span class='badge bg-primary'>Diproses</span>";
                        }
                        else{
                            echo "<span class='badge bg-success'>Selesai</span>";
                        }
                        ?>

                    </td>

                    <td>
                        <?php echo $d['tanggal']; ?>
                    </td>

                </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>