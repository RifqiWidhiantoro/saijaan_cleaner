<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="/idea" class="btn btn-primary">Tambahkan Ide</a>
                    {{-- You're logged in! --}}
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul / Nama Aplikasi</th>
                                <th>Deskripsi Aplikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>TukarJual</td>
                                <td>Aplikasi marketplace khusus Kabupaten Kotabaru</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
