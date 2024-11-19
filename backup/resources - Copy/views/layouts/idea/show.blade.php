<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Ide') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-3">
                        <label for="app_name" class="leading-6 font-semibold text-gray-900">Judul / Nama Aplikasi</label>
                        <p class="mt-1 text-sm leading-6 text-gray-600">{{ $ide->app_name }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="leading-6 font-semibold text-gray-900">Deskripsi Aplikasi</label>
                        <p class="mt-1 text-sm leading-6 text-gray-600">{{ $ide->description }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="excellence" class="leading-6 font-semibold text-gray-900">Kelebihan / Manfa'at Aplikasi</label>
                        <p class="mt-1 text-sm leading-6 text-gray-600">{{ $ide->excellence }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="app_user" class="leading-6 font-semibold text-gray-900">Pengguna Aplikasi</label>
                        <p class="mt-1 text-sm leading-6 text-gray-600">{{ $ide->app_user }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="feature" class="leading-6 font-semibold text-gray-900">Fitur - Fitur Aplikasi</label>
                        <p class="mt-1 text-sm leading-6 text-gray-600">{{ $ide->feature }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
