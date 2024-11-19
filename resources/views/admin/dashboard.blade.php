<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Saijaan Cleaner</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Styling dasar untuk layout dan responsivitas */
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            background-color: #1a1a2e;
            color: #fff;
            width: 250px;
            height: 100vh;
            position: fixed;
            padding: 20px;
        }
        .sidebar a {
            color: #b5b5b5;
            text-decoration: none;
            display: block;
            margin: 15px 0;
        }
        .sidebar a:hover {
            color: #fff;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }
        .profile-dropdown {
            position: relative;
            display: inline-block;
        }
        .profile-dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #333;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .profile-dropdown-content a {
            color: #fff;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .profile-dropdown-content a:hover {
            background-color: #555;
        }
        .profile-dropdown:hover .profile-dropdown-content {
            display: block;
        }
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .dashboard-header .btn {
            margin-left: 15px;
        }
        .report-preview {
            margin-top: 20px;
            background-color: #1a1a2e;
            padding: 15px;
            border-radius: 8px;
            color: #fff;
        }
        .report-preview img {
            width: 100%;
            border-radius: 8px;
        }
        .report-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }
        /* Responsif untuk mobile */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h2>Saijaan Cleaner</h2>
    <a href="#">Dashboard</a>
    <a href="#">Reports</a>
    <a href="#">Statistics</a>
    <a href="#">Settings</a>
    <a href="#">Notifications</a>
    <a href="#">Support</a>
</div>

<!-- Main Content -->
<div class="content">
    <div class="dashboard-header">
        <h3>Dashboard</h3>
        <div class="d-flex align-items-center">
            <a href="/create-report" class="btn btn-primary">Buat Laporan</a>
            <div class="profile-dropdown">
                <img src="/path/to/profile-image.jpg" alt="Profile" style="width:40px; height:40px; border-radius:50%;">
                <div class="profile-dropdown-content">
                    <a href="#"><i class="fas fa-cog"></i> Settings</a>
                    <a href="#"><i class="fas fa-moon"></i> Dark Mode</a>
                    <a href="#"><i class="fas fa-user"></i> View Profile</a>
                    <a href="/welcome"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Report Preview -->
    <div class="report-preview">
        <div class="report-details">
            <div class="d-flex align-items-center">
                <img src="/path/to/reporter-image.jpg" alt="Reporter" style="width:50px; height:50px; border-radius:50%; margin-right:15px;">
                <div>
                    <h6>Pelapor: John Doe</h6>
                    <p>Lokasi: Jl. Kebersihan No.1</p>
                </div>
            </div>
            <div>
                <p>Dibuat: 12 Nov 2024</p>
                <p>Selesai: 13 Nov 2024</p>
            </div>
        </div>
        <img src="/path/to/cleaning-image.jpg" alt="Cleaning Completed">
    </div>
</div>

<!-- Optional: Tambahkan JavaScript Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
