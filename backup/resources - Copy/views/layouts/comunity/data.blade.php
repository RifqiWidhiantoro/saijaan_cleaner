<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Member Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto">
                        <thead>
                            <tr class="bg-slate-50">
                                <th class="border p-2">No</th>
                                <th class="border p-2">Full Name</th>
                                <th class="border p-2">Email</th>
                                <th class="border p-2">Whatsapp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($member as $key => $data)
                            <tr>
                                <td class="border p-2 text-center">{{ $key+1 }}</td>
                                <td class="border p-2">{{ $data->name }}</td>
                                <td class="border p-2">{{ $data->email }}</td>
                                <td class="border p-2">{{ $data->phone }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
