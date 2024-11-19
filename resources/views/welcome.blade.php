<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Saijaan Cleaner</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            background: url('/path/to/your/background-image.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }
        .welcome-container {
            text-align: center;
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 8px;
            max-width: 90%;
            width: 100%;
            margin: 0 20px;
        }
        .welcome-logo {
            width: 150px;
            margin-bottom: 15px;
        }
        .welcome-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .welcome-description {
            font-size: 16px;
            margin-bottom: 25px;
            line-height: 1.6;
        }
        .welcome-buttons .btn {
            margin: 5px;
            width: 100%;
        }
        @media (min-width: 768px) {
            .welcome-buttons .btn {
                width: auto;
            }
        }
    </style>
</head>
<body>

<div class="welcome-container">
    <!-- Logo Siakrab -->
    <img src="/public/gambar/siakrab.png" alt="Logo Siakrab" class="welcome-logo">

    <!-- Penjelasan Singkat, Motto, Visi, Misi -->
    <div class="welcome-title">Selamat Datang di Saijaan Cleaner</div>
    <div class="welcome-description">
        <p><strong>Motto:</strong> Bersih untuk Kesehatan, Rapi untuk Kenyamanan</p>
        <p><strong>Visi:</strong> Menjadi platform penggerak kebersihan lingkungan yang responsif dan transparan.</p>
        <p><strong>Misi:</strong> Mewujudkan kota yang bersih dengan memberdayakan masyarakat untuk melaporkan titik sampah, serta mendukung tim kebersihan dalam menyelesaikan setiap laporan dengan cepat.</p>
    </div>

    <!-- Tombol Login dan Register -->
    <div class="welcome-buttons">
        <a href="/login" class="btn btn-primary">Login</a>
        <a href="/register" class="btn btn-secondary">Register</a>
    </div>
</div>

</body>
</html>
