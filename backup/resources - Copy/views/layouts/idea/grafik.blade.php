<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grafik Bidang') }}
        </h2>
    </x-slot>

    <div class="p-6">
        <div class="container-fluid">
            <div class="row">
                <!-- Chart Column -->
                <div class="col-md-6">
                    <div class="max-w-md mx-auto bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-4">
                            <div class="mb-3">
                                <label for="school" class="form-label">Sekolah</label>
                                <select name="school_id" id="school" class="form-control">
                                    @foreach ($school as $item)
                                        <option value="{{ $item->id }}" 
                                        {{ request('school_id') == $item->id ? 'selected' : '' }}>{{ $item->school }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <canvas id="myChart" style="max-width: 100%;"></canvas>
                            </div>

                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

                            <script>
                                const ctx = document.getElementById('myChart');
                                new Chart(ctx, {
                                    type: 'pie',
                                    data: {
                                        labels: <?= $labelsString ?>,
                                        datasets: [{
                                            label: '# of Votes',
                                            data: <?= $dataPointsString ?>,
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        maintainAspectRatio: false,
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });

                            $(document).ready(function() {
                               $('#school').change(function() {var schoolId = $(this).val();
                               window.location.href = '?school_id=' + schoolId; 
                           });
                         });
                            </script>
                        </div>
                    </div>
                </div>

                         <!-- Table Column -->
                         <div class="col-md-6">
                    <div class="max-w-md mx-auto bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-4">
                            <h2>Bordered Table</h2>
                            <p>The .table-bordered class adds borders to a table:</p>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>john@example.com</td>
                                    </tr>
                                    <tr>
                                        <td>Mary</td>
                                        <td>Moe</td>
                                        <td>mary@example.com</td>
                                    </tr>
                                    <tr>
                                        <td>July</td>
                                        <td>Dooley</td>
                                        <td>july@example.com</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
