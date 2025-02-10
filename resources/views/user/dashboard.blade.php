<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Saijaan Cleaner</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        
        /* Styling dasar untuk layout dan responsivitas */
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        /* Default sidebar styling for dark mode */
        .sidebar {
            background-color: #1a1a2e;
            color: #fff;
            width: 250px;
            height: 100vh;
            position: fixed;
            padding: 20px;
            transition: background-color 0.3s, color 0.3s;
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

        /* Light mode styling */
        .light-mode .sidebar {
            background-color: #f1f1f1;
            color: #333;
        }

        .light-mode .sidebar a {
            color: #333;
        }

        .light-mode .sidebar a:hover {
            color: #000;
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
        .profile-dropdown-content a, .profile-dropdown-content form button {
            color: #fff;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            background: none;
            border: none;
            width: 100%;
            text-align: left;
        }
        .profile-dropdown-content a:hover, .profile-dropdown-content form button:hover {
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
                :root {
            --bg-color: #f7f9fc;
            --text-color: #333;
            --card-bg-color: #f1f1f1;
            --btn-primary-color: #007bff;
            --btn-primary-border: #007bff;
        }

        /* Dark mode */
        .dark-mode {
            --bg-color: #1a1a1a;
            --text-color: #ffffff;
            --card-bg-color: #1a1a2e;
            --btn-primary-color: #333;
            --btn-primary-border: #333;
        }

        /* Style umum */
        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            transition: background-color 0.3s, color 0.3s;
            font-family: Arial, sans-serif;
        }

        .content {
            padding: 20px;
        }

        .btn-primary {
            background-color: var(--btn-primary-color);
            border-color: var(--btn-primary-border);
            color: #fff;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: darken(var(--btn-primary-color), 10%);
        }

        /* Sidebar styling */
        .sidebar {
            width: 250px;
            background-color: var(--card-bg-color); /* Menggunakan variabel warna */
            padding: 20px;
            position: fixed;
            height: 100%;
            color: var(--text-color); /* Menggunakan variabel warna */
            border-right: 1px solid #ddd;
            transition: background-color 0.3s, color 0.3s;
        }
        /* Styling untuk header sidebar */
        .sidebar-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px; /* Jarak antara header dan link pertama */
            text-decoration: none;
        }
        /* Judul sidebar styling */
        .sidebar h2 {
            font-size: 1.5em;
            color: var(--text-color); /* Menggunakan variabel warna */
            margin: 0;
        }
        /* Link di sidebar */
        .sidebar a {
            color: var(--text-color); /* Menggunakan variabel warna */
            text-decoration: none;
            display: block;
            margin: 10px 0;
            padding: 10px;
            font-size: 1em;
            transition: background-color 0.3s, color 0.3s;
        }
        /* Hover effect untuk link */
        .sidebar a:hover {
            background-color: #ddd;
            color: #000;
            border-radius: 5px;
        }
        /* Mengatur ukuran logo agar setinggi h2 */
        .sidebar .logo {
            height: 1.5em;
            width: auto;
            margin-right: 10px; /* Memberi jarak antara logo dan teks */
        }
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .report-preview {
            margin-top: 20px;
            background-color: var(--card-bg-color);
            padding: 15px;
            border-radius: 8px;
            color: var(--text-color);
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
        /* Popup Styling */
        .popup-message {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 15px;
            border-radius: 8px;
            font-size: 16px;
            z-index: 1050;
            transition: background-color 0.3s, color 0.3s;
            opacity: 0;
            visibility: hidden;
            animation: fadeInOut 3s forwards;
        }
        .light-mode .popup-message {
            background-color: #f1f1f1;
            color: #333;
        }
        .dark-mode .popup-message {
            background-color: #333;
            color: #fff;
        }
        /* Fade in and out animation */
        @keyframes fadeInOut {
            0%, 100% {
                opacity: 0;
                visibility: hidden;
            }
            10%, 90% {
                opacity: 1;
                visibility: visible;
            }
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

        .profile-dropdown {
            position: relative;
            margin-left: 20px;
        }

        .profile-dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: var(--card-bg-color);
            min-width: 160px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .profile-dropdown:hover .profile-dropdown-content {
            display: block;
        }

        .profile-dropdown-content a, .profile-dropdown-content form button {
            padding: 10px;
            text-decoration: none;
            display: block;
            color: var(--text-color);
            background-color: transparent;
            border: none;
            text-align: left;
            width: 100%;
        }

        .profile-dropdown-content a:hover, .profile-dropdown-content form button:hover {
            background-color: #f1f1f1;
        }
        /* Loading overlay styling */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9); /* Warna latar belakang */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 2000; /* Pastikan overlay berada di atas konten */
        }

        /* Loading spinner styling */
        .loading-spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #ddd;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        /* Text styling */
        .loading-text {
            margin-top: 10px;
            font-size: 18px;
            color: #555;
            font-family: Arial, sans-serif;
        }

        /* Animation keyframes for spinner */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Responsive adjustments for mobile */
        @media (max-width: 768px) {
            .loading-spinner {
                width: 30px;
                height: 30px;
            }
            .loading-text {
                font-size: 14px;
            }
        }

    </style>
</head>
<body>

<!-- Loading Animation -->
<div id="loadingAnimation" class="loading-overlay">
    <div class="loading-spinner"></div>
    <p class="loading-text">Loading...</p>
</div>

<!-- Sidebar -->
<div class="sidebar">
    <a href="dashboard" class="sidebar-header">
        <img src="path/to/siakrab-logo.png" alt="Siakrab Logo" class="logo">
        <h2>Saijaan Cleaner</h2>
    </a>
    <a href="#">My Reports</a>
    <a href="#">Statistics</a>
    <a href="#">Notification</a>
    <a href="#">Support</a>
    <a href="#">About</a>
</div>

<!-- Main Content -->
<div class="content">
    <div class="dashboard-header">
        <h3>Dashboard</h3>
        <div class="d-flex align-items-center">
            <a href="/create-report" class="btn btn-primary">Buat Laporan</a>
            <div class="profile-dropdown">
                <img src="/path/to/profile-image.jpg" alt="Profile" style="width:40px; height:40px; border-radius:50%; cursor:pointer;">
                <div class="profile-dropdown-content">
                    <a href="#"><i class="fas fa-cog"></i> Settings</a>
                    <a href="#" id="toggle-theme"><i class="fas fa-moon"></i> Light Mode</a>
                    <a href="#"><i class="fas fa-user"></i> View Profile</a>
                    <!-- Form untuk Logout -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"><i class="fas fa-sign-out-alt"></i> Logout</button>
                    </form>
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

    <!-- HTML - welcome message pop up -->
<div class="popup-message" id="welcomeMessage">
    <!-- Pesan akan diisi oleh JavaScript -->
</div>

<!-- Optional: Tambahkan JavaScript Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const toggleThemeButton = document.getElementById("toggle-theme");

        // Theme toggle
        if (localStorage.getItem("theme") === "dark") {
            document.body.classList.add("dark-mode");
            toggleThemeButton.innerHTML = '<i class="fas fa-moon"></i> Dark Mode';
        } else {
            document.body.classList.add("light-mode");
            toggleThemeButton.innerHTML = '<i class="fas fa-sun"></i> Light Mode';
        }

        toggleThemeButton.addEventListener("click", () => {
            document.body.classList.toggle("dark-mode");
            document.body.classList.toggle("light-mode");
            const isDarkMode = document.body.classList.contains("dark-mode");

            if (isDarkMode) {
                localStorage.setItem("theme", "dark");
                toggleThemeButton.innerHTML = '<i class="fas fa-moon"></i> Dark Mode';
            } else {
                localStorage.setItem("theme", "light");
                toggleThemeButton.innerHTML = '<i class="fas fa-sun"></i> Light Mode';
            }
        });

        // Welcome Message Logic
        const welcomeMessage = document.getElementById('welcomeMessage');

        // Check if the user is new or returning
        if (!localStorage.getItem('hasVisitedDashboard')) {
            // User baru
            welcomeMessage.textContent = "Selamat datang di website Saijaan Cleaner 🙏";
            localStorage.setItem('hasVisitedDashboard', 'true');
        } else {
            // User lama
            welcomeMessage.textContent = "Selamat datang Kembali 🙏";
        }

        // Show and auto-hide the welcome message
        welcomeMessage.style.opacity = '1';
        welcomeMessage.style.visibility = 'visible';

        setTimeout(() => {
            welcomeMessage.style.opacity = '0';
            welcomeMessage.style.visibility = 'hidden';
        }, 3000); // Hide after 3 seconds

        // Loading event
        window.addEventListener("load", function() {
        const loadingAnimation = document.getElementById("loadingAnimation");
        loadingAnimation.style.transition = "opacity 0.5s";
        loadingAnimation.style.opacity = "0";
        
        // Menghilangkan elemen loading setelah transisi selesai
        setTimeout(() => {
            loadingAnimation.style.display = "none";
        }, 500); // Sesuaikan waktu sesuai dengan durasi transisi (0.5 detik)
        });
    });
</script>
</body>
</html>