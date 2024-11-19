<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Developer Harat Kotabaru</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('gambar/monitor.png') }}">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .navbar-expand-lg {
                flex: 1;
                margin: auto !important;
                display: flex;
                justify-content: space-between;
            }
            #main {
                padding-top: 100px;
            }
            #progDepan {
                border-radius: 2rem 0 0 2rem;
            }
            #progBelakang {
                border-radius: 0 2rem 2rem 0;
            }
            @media only screen and (max-width: 700px) {
                #progDepan {
                    border-radius: 2rem 2rem 0 0;
                }
                #progBelakang {
                    border-radius: 0 0 2rem 2rem;
                }
            }
            @media only screen and (min-width: 700px) {
                .haratTitle {
                    font-size: 3.5em;
                }
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg fixed-top bg-white" id="fixTop">
            <div class="container px-4">
                <a href="#" class="text-decoration-none text-reset">
                    <h1 class="fw-bold mb-0">Dev<span class="text-success">Harat</span></h1>
                    <p class="mb-0 fw-bold">Developer Harat Kotabaru</p>
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @if (Route::has('login'))
                <div class="collapse navbar-collapse flex-row-reverse bg-white" id="navbarNav">
                    <ul class="navbar-nav">
                        @auth
                            <li class="nav-item">
                                {{-- <a class="nav-link active" aria-current="page" href="{{ url('/dashboard') }}">Dashboard</a> --}}
                                <a class="nav-link active" aria-current="page" href="{{ url('/idea') }}">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Log in</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                </div>
                @endif
            </div>
        </nav>
        <main id="main">
            <section class="container p-4">
                <div class="row justify-content-between">
                    <div class="col-lg-6 my-auto">
                        <h1 class="title fw-bold haratTitle">Bangun Masa Depan bersama Developer <span class="text-success">Harat Kotabaru</span></h1>
                        <p class="text-muted">Kirimkan ide kreatif Anda di bidang Teknologi Digital / Aplikasi untuk kemajuan Kabupaten Kotabaru di bidang Teknologi. </p>
                        {{-- <p class="fw-bolder">Batas Pendaftaran: <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="my-auto ms-2 me-1" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path></svg>08 Nov 2023 s/d 14 Nov 2023</p> --}}
                        <div class="d-grid d-md-flex gap-2 gap-md-3">
                            <a class="btn btn-lg btn-danger rounded-1" target="_blank" rel="noopener noreferrer" href="/idea/create">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="me-1 mb-1" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z"></path>
                                </svg>
                                Tuliskan Ide Mu
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 my-auto">
                        <img alt="kotabaru" fetchpriority="high" width="1000" height="1000" decoding="async" data-nimg="1" class="img-fluid rounded-5 mt-2" src="{{ asset('gambar/kotabaru.png') }}">
                    </div>
                </div>
            </section>
            <section class="container p-4">
                <div class="row shadow align-items-center rounded-5">
                    <div class="col-lg-3 py-5 text-center">
                        <h1 class="display-3 fw-bold text-primary"><span>{{ $users }}</span></h1>
                        <span>Total Pendaftar</span>
                    </div>
                    <div class="col-lg-9 bg-primary rounded-5">
                        <div class="row py-5 text-white align-items-center">
                            {{-- <div class="col-lg-4 text-center">
                                <?php
                                    $now = time(); // or your date as well
                                    $your_date = strtotime('2023-11-14 24:00:00');
                                    $datediff =  $your_date - $now;
                                    $days_remaining = floor($datediff/(60*60*24));
                                ?>
                                <h1 class="display-3 fw-bold"><span><?= $days_remaining ?></span></h1>
                                <span>Hari Lagi</span>
                            </div> --}}
                            <div class="col-lg-8 px-5 py-3 border-start border-4 d-none d-lg-block">
                                {{-- <p class="m-0 lh-lg">Dapatkan Uang Apresiasi dari DevHarat Kotabaru dengan Total Rp2.600.000,-</p> --}}
                                <p class="m-0 lh-lg">Tingkatkan ekonomi kabupaten kotabaru dengan Teknologi Digital</p>
                            </div>
                            <div class="col-lg-8 px-5 py-3 d-block d-lg-none">
                                <p class="m-0 lh-lg">Tingkatkan ekonomi kabupaten kotabaru dengan Teknologi Digital</p>
                                {{-- <p class="m-0 lh-lg">Dapatkan Uang Apresiasi dari DevHarat Kotabaru dengan Total Rp2.600.000,-</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="container p-4">
                <div class="row rounded-5">
                    {{-- <div class="col-lg-5 d-flex flex-column align-items-center justify-content-center p-0 rounded-start-5 SectionAbout_border_radius_start__Gy2Mq" style="background: url(https://www.devhandal.id/assets/img/img-programming.png)"> --}}
                    <div class="col-lg-5 d-flex flex-column align-items-center justify-content-center p-0 SectionAbout_border_radius_start__Gy2Mq">
                        <img src="{{ asset('gambar/programmer.jpg') }}" alt="programmer kotabaru" id="progDepan" class="img-fluid">
                    </div>
                    <div id="progBelakang" class="col-lg-7 text-white px-auto px-md-5 d-flex flex-column align-items-start justify-content-center bg-success">
                        <h2 class="title fw-bolder mb-3">Apa itu DevHarat?</h2>
                        <p class="lh-lg"><strong class="badge text-bg-light">Developer Harat</strong> adalah sebuah komunitas developer aplikasi atau kumpulan para programmer yang berada di Kabupaten Kotabaru. Diharapkan dengan adanya komunitas ini akan meningkatkan kemajuan Teknologi Digital di Kabupaten Kotabaru yang kemudian juga akan berdampak pada perkembangan ekonomi daerah.</p>
                        <p class="lh-lg">Pada ajang kali ini <span class="badge text-bg-light">#DevHarat</span> mencari dan mengumpulkan informasi atau ide-ide kreatif dari masyarakat di bidang Teknologi Aplikasi untuk kemudian di realisasikan dan dapat digunakan masyarakat dengan baik dan sesuai kebutuhan.</p>
                    </div>
                </div>
            </section>
            <section class="container py-5 px-4">
                <div class="row justify-content-between">
                    <a class="btn btn-lg btn-danger rounded-1" target="_blank" rel="noopener noreferrer" href="/idea/create">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="me-1 mb-1" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z"></path>
                        </svg>
                        Tuliskan Ide Mu
                    </a>
                    <?php  
  
                        session_start(); 
                        
                        if(isset($_SESSION['views'])) 
                            $_SESSION['views'] = $_SESSION['views']+1; 
                        else
                            $_SESSION['views']=1; 
                            
                        // echo"views = ".$_SESSION['views']; 
                    
                    ?>
                    <div class="col-lg-6 my-5 my-lg-auto">
                        <h2 class="title fw-bolder">Menjadi bagian dari Dev<span class="text-success">Harat</span></h2>
                        <p class="lh-lg">Konsep / ide kreatif mu dapat membuat perubahan yang lebih baik dan tepat guna bagi Kota tercinta kita yaitu Kotabaru. Tuliskan idemu secara detail mulai dari:</p>
                        <div class="d-flex mb-3">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="text-primary me-2 mt-1" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
                            </svg>
                            <p class="my-auto">Judul atau Nama Aplikasi</p>
                        </div>
                        <div class="d-flex mb-3">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="text-primary me-2 mt-1" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
                            </svg>
                            <p class="my-auto">Siapa saja yang menggunakan aplikasi tersebut</p>
                        </div>
                        <div class="d-flex mb-3">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="text-primary me-2 mt-1" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
                            </svg>
                            <p class="my-auto">Alasan kenapa perlu adanya inovasi tersebut</p>
                        </div>
                        <div class="d-flex mb-3">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="text-primary me-2 mt-1" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
                            </svg>
                            <p class="my-auto">Kelebihan dan kekurangan aplikasi tersebut</p>
                        </div>
                    </div>
                    <div class="col-lg-5 my-auto">
                        <img alt="siakrab" fetchpriority="high" width="1000" height="100" decoding="async" data-nimg="1" class="img-fluid" src="{{ asset('gambar/siakrab.png') }}">
                    </div>
                </div>
            </section>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script>
            window.addEventListener('resize', function() {
                if (window.innerWidth < 700) {
                    document.getElementById('progDepan').classList.add('rounded-top-5');
                    document.getElementById('progDepan').classList.remove('rounded-start-5');
                } else {
                    document.getElementById('progDepan').classList.add('rounded-start-5');
                    document.getElementById('progDepan').classList.remove('rounded-top-5');
                }

                if (window.innerWidth < 700) {
                    document.getElementById('progBelakang').classList.add('rounded-bottom-5');
                    document.getElementById('progBelakang').classList.remove('rounded-end-5');
                } else {
                    document.getElementById('progBelakang').classList.add('rounded-end-5');
                    document.getElementById('progBelakang').classList.remove('rounded-bottom-5');
                }
            });

            // When the user scrolls the page, execute myFunction
            window.onscroll = function() {myFunction()};

            // Get the header
            var header = document.getElementById("fixTop");

            // Get the offset position of the navbar
            var sticky = header.offsetTop;

            // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
            function myFunction() {
                if (window.pageYOffset > sticky) {
                    header.classList.add("bg-white", "shadow");
                } else {
                    header.classList.remove("bg-white", "shadow");
                }
            };
        </script>
    </body>
</html>
