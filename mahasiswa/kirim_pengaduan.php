<?php
session_start();

if($_SESSION['login'] != true){
    header("location:../login.php");
}

include '../koneksi.php';

if(isset($_POST['submit'])){

    $id_mahasiswa = $_SESSION['id_mahasiswa'];
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $isi = $_POST['isi'];

    mysqli_query($conn,
    "INSERT INTO pengaduan
    VALUES(
    '',
    '$id_mahasiswa',
    '$judul',
    '$kategori',
    '$isi',
    'Menunggu',
    NOW()
    )");

    echo "
    <script>
    alert('Pengaduan berhasil dikirim!');
    window.location='status_pengaduan.php';
    </script>
    ";
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Pengaduan</title>

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

        .card-form{
            background: white;
            border-radius: 15px;
            padding: 30px;
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
        Kirim Pengaduan
    </h3>

    <div class="card-form">

        <form method="POST">

            <div class="mb-3">

                <label class="form-label">
                    Judul Pengaduan
                </label>

                <input type="text"
                       name="judul"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Kategori
                </label>

                <select name="kategori"
                        class="form-control"
                        required>

                    <option value="">
                        -- Pilih Kategori --
                    </option>

                    <option>
                        Akademik
                    </option>

                    <option>
                        Fasilitas
                    </option>

                    <option>
                        Pelayanan
                    </option>

                    <option>
                        Lainnya
                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Isi Pengaduan
                </label>

                <textarea name="isi"
                          rows="6"
                          class="form-control"
                          required></textarea>

            </div>

            <button type="submit"
                    name="submit"
                    class="btn btn-primary">

                <i class="bi bi-send-fill"></i>
                Kirim Pengaduan

            </button>

        </form>

    </div>

</div>

</body>
</html>