<!DOCTYPE html>
<html>
<head>
    <title>Peta Kota Batu</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<body>
    <h1>Peta Kota Batu</h1>
    <div id="map" style="height: 600px;"></div>

    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([112.5845989,-7.9131827], 11); // Ganti koordinat ke lokasi Mojokerto

        // Tambahkan tile OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Load file GeoJSON
        fetch('/geojson/batu.geojson')
            .then(response => response.json())
            .then(data => {
                L.geoJSON(data, {
                    style: function (feature) {
                        return { color: '#ff7800', weight: 2 };
                    },
                    onEachFeature: function (feature, layer) {
                        if (feature.properties && feature.properties.name) {
                            layer.bindPopup(feature.properties.name);
                        }
                    }
                }).addTo(map);
            })
            .catch(error => console.log('Error loading GeoJSON:', error));
    </script>
</body>
</html>
