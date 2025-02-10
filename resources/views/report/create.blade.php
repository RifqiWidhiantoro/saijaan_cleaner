<!DOCTYPE html>
<html lang="en">
<head>
    <title>Buat Laporan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
</head>
<body>
    <div id="app" class="container mt-5">
        <h2>Buat Laporan</h2>
        <form @submit.prevent="submitForm" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Laporan</label>
                <input type="text" id="judul" class="form-control" v-model="judul" maxlength="30" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea id="deskripsi" class="form-control" v-model="deskripsi" maxlength="255" required></textarea>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Lokasi</label>
                <div id="map" style="height: 300px;"></div>
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" id="latitude" class="form-control" v-model="latitude" readonly required>
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" id="longitude" class="form-control" v-model="longitude" readonly required>
            </div>
            <div class="mb-3">
                <label for="photos" class="form-label">Upload Foto</label>
                <input type="file" id="photos" class="form-control" @change="validateFiles" multiple accept="image/jpeg,image/png,image/jpg" required>
                <small>Max 4 images, 5 MB each</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap" async defer></script>
<script src="{{ asset('js/report.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</html>
