<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/user/{{ $user->id }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="leading-6 font-semibold text-gray-900">Full Name</label>
                            <div class="mt-2">
                                <p class="form-control-plaintext">{{ $user->name }}</p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="staticEmail" class="leading-6 font-semibold text-gray-900">Email</label>
                            <div class="mt-2">
                                <p class="form-control-plaintext">{{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="leading-6 font-semibold text-gray-900">Whatsapp</label>
                            <div class="mt-2">
                                <input type="phone" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <input type="submit" value="Update" class="rounded-md text-white px-3 py-1.5 bg-blue-600">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
