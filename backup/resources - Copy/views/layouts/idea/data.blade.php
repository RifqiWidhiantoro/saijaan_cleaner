<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Ide') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (Auth::user()->phone == '0')
                        <div class="bg-orange-500 mb-3 p-2 rounded-lg text-white">
                            Whatsapp Anda {{ Auth::user()->phone }}. Silahkan update nomor Whatsapp di menu Data User atau klik tombol berikut <a href="/user/{{ Auth::user()->id }}" class='bg-white px-2.5 py-0.5 rounded text-gray-800'>Data User</a>
                        </div>
                    @endif
                    <a href="/idea/create" class="rounded-md text-white px-3 py-1.5 bg-blue-600">Tambahkan Ide</a>
                    {{-- You're logged in! --}}
                    <div class="table-responsive">
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr class="whitespace-nowrap ...">
                                    <th>No</th>
                                    <th>Nama Aplikasi</th>
                                    <th colspan="2">Deskripsi Aplikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($ide ?? '' as $key => $data) --}}
                                @foreach ($ide as $key => $data)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $data->app_name }}</td>
                                    <td>{{ Str::limit($data->description, 150, '...') }}</td>
                                    <td>
                                        <a href="idea/{{ $data->id }}" class="rounded-md text-white px-3 py-1.5 bg-green-600">Lihat</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
