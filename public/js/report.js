var app = new Vue({
    el: '#app',
    data: {
        judul: '',
        deskripsi: '',
        latitude: '',
        longitude: '',
        files: []
    },
    methods: {
        initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 8,
                center: { lat: -6.200000, lng: 106.816666 },
            });

            map.addListener("click", (event) => {
                this.latitude = event.latLng.lat();
                this.longitude = event.latLng.lng();
            });

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition((position) => {
                    this.latitude = position.coords.latitude;
                    this.longitude = position.coords.longitude;
                    map.setCenter({ lat: this.latitude, lng: this.longitude });
                });
            }
        },
        validateFiles(event) {
            const files = Array.from(event.target.files);
            if (files.length > 4) {
                alert("Max 4 images allowed");
                event.target.value = '';
                return;
            }

            files.forEach(file => {
                if (!['image/jpeg', 'image/png', 'image/jpg'].includes(file.type) || file.size > 5 * 1024 * 1024) {
                    alert("Invalid file format or size exceeds 5MB");
                    event.target.value = '';
                    return;
                }
            });

            this.files = files;
        },
        submitForm() {
            // Process the form submission with Axios or FormData
        }
    },
    mounted() {
        this.initMap();
    }
});
