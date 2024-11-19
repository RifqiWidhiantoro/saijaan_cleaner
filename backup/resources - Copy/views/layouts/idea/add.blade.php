<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambahkan Ide') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/idea" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="app_name" class="form-label">Judul / Nama Aplikasi</label>
                                    <input type="text" class="form-control" name="app_name" id="app_name" placeholder="Nama aplikasi kamu" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi Aplikasi</label>
                                    <textarea name="description" id="description" class="form-control border-secondary rounded-0" cols="30" rows="5" placeholder="Tuliskan deskripsi dengan detail" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="excellence" class="form-label">Kelebihan / Manfa'at Aplikasi</label>
                                    <textarea name="excellence" id="excellence" class="form-control border-secondary rounded-0" cols="30" rows="5" placeholder="Tuliskan detail manfaat ide aplikasi" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="app_user" class="form-label">Pengguna Aplikasi</label>
                                    <input type="text" class="form-control" id="app_user" name="app_user" placeholder="Siapa yang menggunakan aplikasi" required>
                                    <div id="app_user" class="form-text">Contoh: Dinas Pariwisata, pedagang pasar.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="feature" class="form-label">Fitur - Fitur Aplikasi</label>
                                    <textarea name="feature" id="feature" class="form-control border-secondary rounded-0" cols="30" rows="5" placeholder="Tuliskan fitur apa aja yang bisa dibuat" required></textarea>
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="file" class="form-label">File Pendukung</label>
                                    <input type="file" name="file" id="file" class="form-control">
                                    <div id="app_user" class="form-text">Contoh: Logo, Desain atau Prototype.</div>
                                </div> --}}
                                <div class="btn-group float-end">
                                    <a href="/idea" class="btn btn-warning">Batal</a>
                                    {{-- <button onclick="history.back()" class="btn btn-warning">Batal</button> --}}
                                    <button type="submit" class="btn btn-primary bg-primary">Kirim</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
