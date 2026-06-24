<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pengaduan Mahasiswa</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            background: #f4f6f9;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        .login-card{
            width: 420px;
            background: white;
            border-radius: 15px;
            padding: 35px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .logo{
            width: 100px;
        }

        .title-unp{
            color: #0d6efd;
            font-weight: bold;
            font-size: 22px;
        }

        .btn-login{
            background: #0d6efd;
            border: none;
            height: 45px;
            font-weight: bold;
        }

        .btn-login:hover{
            background: #0b5ed7;
        }

        .footer-text{
            font-size: 13px;
            color: gray;
        }

    </style>

</head>
<body>

<div class="login-card">

    <div class="text-center mb-4">

        <img src="assets/logo_unp.png" class="logo mb-3">

        <h5 class="title-unp">
            UNIVERSITAS NEGERI PADANG
        </h5>

        <h3 class="fw-bold mt-3">
            Sistem Pengaduan Mahasiswa
        </h3>

        <p class="text-muted">
            Silakan masuk untuk melanjutkan
        </p>

    </div>

    <form action="proses_login.php" method="POST">

        <div class="mb-3">

            <div class="input-group">

                <span class="input-group-text">
                    <i class="bi bi-person-fill"></i>
                </span>

                <input type="text"
                       name="username"
                       class="form-control"
                       placeholder="Username atau Email"
                       required>

            </div>

        </div>

        <div class="mb-3">

            <div class="input-group">

                <span class="input-group-text">
                    <i class="bi bi-lock-fill"></i>
                </span>

                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Password"
                       required>

            </div>

        </div>

        <button type="submit" class="btn btn-primary w-100 btn-login">
            <i class="bi bi-box-arrow-in-right"></i>
            Login
        </button>

    </form>

    <div class="text-center mt-4 footer-text">
        © 2025 Universitas Negeri Padang
    </div>

</div>

</body>
</html>