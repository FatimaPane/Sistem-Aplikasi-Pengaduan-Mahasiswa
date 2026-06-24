<?php
session_start();

if($_SESSION['login'] != true){
    header("location:../login.php");
}

include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM pengaduan
WHERE id_pengaduan='$id'");

$d = mysqli_fetch_array($data);


if(isset($_POST['submit'])){

    $status = $_POST['status'];

    mysqli_query($conn,
    "UPDATE pengaduan
    SET status='$status'
    WHERE id_pengaduan='$id'");

    echo "
    <script>
    alert('Status berhasil diupdate!');
    window.location='data_pengaduan.php';
    </script>
    ";
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Status</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background: #f4f6f9;
        }

        .container-box{
            width: 500px;
            margin: 60px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

    </style>

</head>
<body>

<div class="container-box">

    <h3 class="mb-4">
        Update Status Pengaduan
    </h3>

    <form method="POST">

        <div class="mb-3">

            <label class="form-label">
                Judul Pengaduan
            </label>

            <input type="text"
                   class="form-control"
                   value="<?php echo $d['judul_pengaduan']; ?>"
                   readonly>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Status
            </label>

            <select name="status"
                    class="form-control"
                    required>

                <option value="Menunggu">
                    Menunggu
                </option>

                <option value="Diproses">
                    Diproses
                </option>

                <option value="Selesai">
                    Selesai
                </option>

            </select>

        </div>

        <button type="submit"
                name="submit"
                class="btn btn-primary">

            Update Status

        </button>

        <a href="data_pengaduan.php"
           class="btn btn-secondary">

           Kembali

        </a>

    </form>

</div>

</body>
</html>