<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
            {{ __('Sekolah') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Formulir input di atas tabel -->
            <div class="mt-4">
                <form action="{{ route('school.store') }}" method="post" id="schoolForm">
                    @csrf
                    <div class="mb-3">
                        <label for="school" class="form-label">Tambahkan Sekolah Baru</label>
                        <input type="text" name="school" id="school" class="form-control" required>
                        <input type="hidden" name="school_id" id="school_id">
                    </div>
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2 opacity-100" onclick="submitSchoolForm()">
                        Tambah Sekolah
                    </button>
                    <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-2" onclick="cancelForm()">
                        Cancel
                    </button>
                </form>
            </div>

            <!-- tabel yang menampilkan daftar sekolah -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
                <div id="statusMessage" class="mt-2"></div>

                @if ($schools && count($schools) > 0)
                    <table class="table-auto mt-2">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">No</th>
                                <th class="px-4 py-2">Nama Sekolah</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schools as $schoolItem)
                                <tr id="row{{ $schoolItem->id }}">
                                    <td class="border p-2">{{ $schoolItem->id }}</td>
                                    <td class="border p-2">{{ $schoolItem->school }}</td>
                                    <td class="border p-2">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input flexSwitchCheck" type="checkbox" id="flexSwitchCheck{{ $schoolItem->id }}" {{ $schoolItem->status === 1 ? 'checked' : '' }} onclick="toggleStatus({{ $schoolItem->id }})">
                                            <label class="form-check-label" for="flexSwitchCheck{{ $schoolItem->id }}"></label>
                                        </div>
                                    </td>
                                    <td class="border p-2">
                                        <!-- Tombol "Ubah" hanya muncul jika tombol "Tambah Sekolah" diklik -->
                                        <button type="button" class="btn btn-primary" onclick="editSchool({{ $schoolItem->id }}, '{{ $schoolItem->school }}')">Ubah</button>
                                        <button type="button" class="btn btn-danger" onclick="deleteSchool({{ $schoolItem->id }})">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No schools found.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function toggleStatus(schoolId) {
        fetch(`{{ route('school.toggleStatus', ['id' => ':id']) }}`.replace(':id', schoolId), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);

            // Handle the response or update UI as needed
            const checkbox = document.getElementById(`flexSwitchCheck${schoolId}`);
            if (data.status === 1) {
                // The school is enabled
                // Update UI accordingly, e.g., toggle checkbox state or change background color
                checkbox.checked = true;
            } else {
                // The school is disabled
                // Update UI accordingly
                checkbox.checked = false;
            }

            // Display status message
            document.getElementById('statusMessage').innerText = data.message;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    // Function to handle edit button click
    function editSchool(schoolId, schoolName) {
    // Set form input values
        document.getElementById('school').value = schoolName;
        document.getElementById('school_id').value = schoolId;
        document.querySelector('button[type="submit"]').innerText = 'Edit Sekolah';
    
    // Update form URL and method for editing
        document.getElementById('schoolForm').action = `{{ route('school.update', ['school' => ':id']) }}`.replace(':id', schoolId);
        document.getElementById('schoolForm').method = 'POST';
        document.getElementById('school').setAttribute('data-edit-id', schoolId);
}

    // Function to handle cancel button click
    function cancelForm() {
        // Reset form input
        document.getElementById('school').value = '';
        document.getElementById('school_id').value = '';
        document.getElementById('schoolForm').action = '{{ route('school.store') }}';  // Reset action to add school
        document.getElementById('schoolForm').method = 'POST';  // Reset method to POST
        document.getElementById('school').removeAttribute('data-edit-id');

        // Reset button text to "Tambah Sekolah"
        document.querySelector('button[type="submit"]').innerText = 'Tambah Sekolah';
    }

    function deleteSchool(schoolId) {
        // Confirmation before deletion
        const confirmDelete = confirm('Apakah Anda yakin ingin menghapus sekolah ini?');

        if (confirmDelete) {
            // Send DELETE request to the backend
            fetch(`{{ route('school.delete', ['id' => ':id']) }}`.replace(':id', schoolId), {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);

                // Handle the response or update UI as needed
                if (data.status === 'success') {
                    // Reset form input after successful deletion
                    document.getElementById('school').value = '';
                    document.getElementById('school').removeAttribute('data-edit-id');

                    // Remove table row from UI after successful deletion
                    const rowToDelete = document.getElementById(`row${schoolId}`);
                    if (rowToDelete) {
                        rowToDelete.remove();
                    } else {
                        alert('Baris tabel tidak ditemukan.');
                    }

                    // Reset button text to "Tambah Sekolah"
                    document.querySelector('button[type="submit"]').innerText = 'Tambah Sekolah';
                } else {
                    alert('Gagal menghapus sekolah.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    }

    function submitSchoolForm() {
    event.preventDefault();
    const schoolId = document.getElementById('school').getAttribute('data-edit-id');
    const actionUrl = schoolId ? `{{ route('school.update', ['school' => ':id']) }}`.replace(':id', schoolId) : `{{ route('school.store') }}`;

    // Determine the method based on whether it's an edit or add operation
    const method = schoolId ? 'PUT' : 'POST';

    // Send POST or PUT request to the backend
    fetch(actionUrl, {
        method: method,
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({
            school: document.getElementById('school').value,
        }),
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);

        // Handle the response or update UI as needed
        if (data.status === 'success') {
            // Reset form input after successful addition/update
            document.getElementById('school').value = '';
            document.getElementById('school').removeAttribute('data-edit-id');

            // Refresh the page after successful addition/update
            location.reload();
        } else {
            alert('Gagal menambah/mengubah sekolah.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>
