<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data All Idea ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-fixed">
                        <thead>
                            <tr class="whitespace-nowrap ...">
                                <th class="border p-2">No</th>
                                <th class="border p-2">Full Name</th>
                                <th class="border p-2">Email</th>
                                <th class="border p-2">Whatsapp</th>
                                <th class="border p-2">Nama Aplikasi</th>
                                <th class="border p-2">Deskripsi Aplikasi</th>
                                <th class="border p-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ideal as $key => $data)
                            <tr>
                                <td class="border p-2">{{ $key+1 }}</td>
                                <td class="border p-2">{{ $data->user->name }}</td>
                                <td class="border p-2">{{ $data->user->email }}</td>
                                <td class="border p-2">{{ $data->user->phone }}</td>
                                <td class="border p-2">{{ $data->app_name }}</td>
                                <td class="border p-2">{{ Str::limit($data->description, 150, '...') }}</td>
                                <td class="border p-2">
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
</x-app-layout>