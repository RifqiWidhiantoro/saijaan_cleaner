@extends('layouts.quiz.quiz')
@section('content')
    <main id="main">
        <section class="container p-4">
            <div class="row justify-content-between">
                <div class="col-lg-6 my-auto">
                    <p class="text-muted">Untuk memilih silahkan adik - adik klik subsektor yang paling diminati yaa...</p>
                    <p class="fw-bolder mb-0">17 Subsektor Ekonomi Kreatif</p>
                    <div class="table-responsive" style="max-height: 300px">
                        <table class="table table-hover table-bordered" id="tableDivisi">
                            @foreach ($communities as $key => $data)
                                <tr data-id="{{ $data->id }}" class="selectable-row">
                                    <td>{{ $data->community }}</td>
                                    <td onclick="selectData(this)"><span class="badge text-bg-success" style="cursor: pointer">Pilih</span></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <p class="fw-bolder mb-0">Subsektor pilihan Anda</p>
                    <table class="table table-bordered" id="tablePilihan">
                        <tr></tr>
                        @foreach ($choice as $item)
                            <tr data-id="{{ $item->id }}" class="selectable-row selected-row">
                                <td>{{ $item->community->community }}</td>
                                <td onclick="removeData(this)"><span class="badge text-bg-danger" style="cursor: pointer">Delete</span></td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="col-lg-6 my-auto">
                        <div class="d-grid d-md-flex gap-2 gap-md-3">
                            <button type="button" onclick="finish()" class="btn btn-lg btn-danger rounded-1">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="me-1 mb-1" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z"></path>
                                </svg>
                                Selesai
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> --}}
    <script>
        if (localStorage.getItem("class") == null) {
            window.location.href = "/quiz/school"
        } else {
            function selectData(cell) {
                const selectedTable = document.getElementById('tablePilihan');
                const selectedRows = selectedTable.getElementsByTagName('tr');

                const row = cell.closest('tr');
                const id = row.dataset.id;

                // Memeriksa apakah data sudah ada di tabel Pilihan
                var isAlreadySelected = Array.from(selectedRows).some(function (row) {
                    return row.dataset.id === cell.parentNode.dataset.id;
                });

                if (selectedRows.length <= 3 && !isAlreadySelected) {
                    axios.post('/quiz', {
                        community_id: id,
                        school_id: localStorage.getItem("school_id"),
                        class: localStorage.getItem("class")
                    })

                    // var selectedRow = cell.parentNode;
                    // var clonedRow = selectedRow.cloneNode(true);
                    // clonedRow.innerHTML += '<td onclick="removeData(this)"><span class="badge text-bg-danger">Delete</span></td>';
                    // clonedRow.innerHTML = '<td>' + clonedRow.cells[0].innerHTML + '</td><td onclick="removeData(this)"><span class="badge text-bg-danger">Delete</span></td>';
                    // selectedTable.querySelector('tbody').appendChild(clonedRow);

                    location.reload();
                }
            }

            function removeData(element) {
                var selectedTable = document.getElementById('tableDivisi');
                var selectedRow = element.parentNode

                selectedRow.parentNode.removeChild(selectedRow);
                let idDel = selectedRow.dataset.id
                axios.delete('/quiz/'+idDel)
            }

            function finish() {
                Swal.fire({
                    title: 'Terimakasih!',
                    text: 'Gerakan Ekonomi Kreatif Kotabaru',
                    icon: 'success',
                    confirmButtonText: 'Oke'
                }).then((result) => {
                    localStorage.clear()
                    window.location.href = "/"
                })
            }
        }
    </script>
@endsection