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
            </div>
        </nav>
        <main id="main">
            <section class="container p-4">
                <div class="row justify-content-between">
                    <p class="text-muted">Silahkan di isi data sekolah kalian yaa...</p>
                    <div class="mb-3">
                    <label for="school" class="form-label">Sekolah</label>
                    <select name="school_id" id="school" class="form-control">
                        @foreach ($schools as $item)
                            <option value="{{ $item->id }}">{{ $item->school }}</option>
                        @endforeach
                    </select>
                </div>

                    <div class="mb-3">
                        <label for="class" class="form-label">Kelas</label>
                        <input type="text" name="class" class="form-control" id="class">
                        <div class="form-text fst-italic">Contoh: Kelas X - Bahasa Indonesia</div>
                    </div>
                    <div class="col-lg-6 my-auto">
                        <div class="d-grid d-md-flex gap-2 gap-md-3">
                            <button type="button" onclick="store()" class="btn btn-lg btn-danger rounded-1">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="me-1 mb-1" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z"></path>
                                </svg>
                                Selanjutnya
                            </button>
                        </div>
                    </div>
                </div>
            </section>    
        </main>
        <script>
            function store() {
                const school_id = document.getElementById("school").value
                const className = document.getElementById("class").value
                localStorage.setItem("school_id", school_id)
                localStorage.setItem("class", className)
                console.log(className)
                if (className === "") {
                    alert("Data tidak boleh kosong");
                    return false;
                } else {
                    window.location.href = "/quiz/create";
                }
            }
        </script>
    </body>
</html>
