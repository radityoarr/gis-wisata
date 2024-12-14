<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Wisata</title>
    <!-- Leaflet Core -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Leaflet Routing Machine -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        #map-section {
            height: 400px;
            width: 100%;
            position: relative; 
            z-index: 1; 
        }
        .leaflet-routing-container {
            position: relative;
        }

        .leaflet-routing-container div[style*="✖"] {
            font-weight: bold;
        }

    </style>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-blue-600 text-white py-4 fixed top-0 left-0 w-full shadow-md z-10">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-xl font-bold">Wisata Batu</a>
            <ul class="flex space-x-4">
                <li><a href="/" class="hover:underline">Home</a></li>
                <li><a href="/data-wisata" class="hover:underline">Data Wisata</a></li>
            </ul>
        </div>
    </nav>
    <!-- Title Section -->
    <section class="pt-24 px-6 text-center">
        <h1 class="text-4xl font-bold">Detail Wisata {{ $location->nama }}</h1>
    </section>

    <!-- Detail Section -->
    <section class="pt-12 px-8 flex justify-center">
        <div class="w-1/2">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <tbody>
                    <tr>
                        <td class="border border-gray-300 p-2 font-bold">Alamat</td>
                        <td class="border border-gray-300 p-2">{{ $location->alamat }}</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-2 font-bold">Deskripsi</td>
                        <td class="border border-gray-300 p-2">{{ $location->deskripsi ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-2 font-bold">Jam Operasional</td>
                        <td class="border border-gray-300 p-2">{{ $location->jam_operasional ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-2 font-bold">Fasilitas</td>
                        <td class="border border-gray-300 p-2">{{ $location->fasilitas ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-2 font-bold">Harga Tiket</td>
                        <td class="border border-gray-300 p-2">{{ $location->harga_tiket ?? '-'}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="w-1/2">
            <div id="map-section" class="h-full w-full"></div>
        </div>
    </section>
    

    <!-- Footer -->
    <footer class="bg-blue-600 text-white py-4 mt-48">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Wisata Batu. All rights reserved.</p>
        </div>
    </footer>

    <script>
        var map = L.map('map-section').setView([{{ $location->latitude }}, {{ $location->longitude }}], 17);
    
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    
        var marker = L.marker([{{ $location->latitude }}, {{ $location->longitude }}]).addTo(map);
    
        marker.bindPopup(`
            <div style="display: flex; align-items: center;">
                @if ($location->thumbnail)
                    @if (filter_var($location->thumbnail, FILTER_VALIDATE_URL))
                        <img src="{{ $location->thumbnail }}" alt="{{ $location->nama }}" style="width:100px;height:auto;margin-right:10px;">
                    @else
                        <img src="{{ asset('storage/' . $location->thumbnail) }}" alt="{{ $location->nama }}" style="width:100px;height:auto;margin-right:10px;">
                    @endif
                @else
                    <span>No Image</span>
                @endif
                <div>
                    <strong>{{ $location->nama }}</strong><br>
                    {{ $location->alamat }}<br><br>                  
                    <a class="bg-blue-500 px-4 py-2 rounded mt-2 hover:bg-blue-700" href="https://www.google.com/maps/search/?api=1&query={{ $location->latitude }},{{ $location->longitude }}" target="_blank">
                        <span class="text-white">Lihat di Google Maps</span>
                    </a>
                </div>
            </div>
        `);
    
        var routingControl;
    
        function showRoute(destinationLat, destinationLng) {
            if (routingControl) {
                map.removeControl(routingControl);
            }
    
            navigator.geolocation.getCurrentPosition(
                position => {
                    const userLat = position.coords.latitude;
                    const userLng = position.coords.longitude;
    
                    routingControl = L.Routing.control({
                        waypoints: [
                            L.latLng(userLat, userLng),
                            L.latLng(destinationLat, destinationLng)
                        ],
                        routeWhileDragging: true,
                        showAlternatives: true,
                        createMarker: function() { return null; },
                        lineOptions: {
                            styles: [{ color: 'blue', weight: 5, opacity: 0.7 }]
                        },
                        fitSelectedRoutes: true,
                        collapsible: true 
                    }).addTo(map);
    
                    routingControl.on('routesfound', function (e) {
                        const route = e.routes[0];
                        const bounds = L.latLngBounds(route.coordinates);
    
                        map.fitBounds(bounds);
                        setTimeout(() => {
                            const center = bounds.getCenter();
                            map.setView([center.lat, center.lng + 0.3]); 
                        }, 500); 
                    });
                    // routingControl.on('routeselected', function (event) {
                    //     const selectedRoute = event.route;
                    //     const firstSegment = selectedRoute.coordinates[0];
                    //     map.setView([firstSegment.lat, firstSegment.lng], 16); 
                    // });

                    const container = document.querySelector('.leaflet-routing-container');
                    if (container) {
                        const closeButton = document.createElement('div');
                        closeButton.innerHTML = '✖';
                        closeButton.style.cursor = 'pointer';
                        closeButton.style.fontSize = '16px';
                        closeButton.style.position = 'absolute';
                        closeButton.style.top = '5px';
                        closeButton.style.right = '15px';
                        closeButton.style.color = '#ff0000';

                        closeButton.addEventListener('click', () => {
                            if (routingControl) {
                                map.removeControl(routingControl);
                                routingControl = null;
                            }
                        });

                        container.appendChild(closeButton);
                    }
                },
                error => {
                    let message = '';
                    switch (error.code) {
                        case error.PERMISSION_DENIED:
                            message = 'Akses lokasi ditolak. Silakan aktifkan izin lokasi di browser Anda.';
                            break;
                        case error.POSITION_UNAVAILABLE:
                            message = 'Informasi lokasi tidak tersedia.';
                            break;
                        case error.TIMEOUT:
                            message = 'Permintaan lokasi memakan waktu terlalu lama.';
                            break;
                        default:
                            message = 'Terjadi kesalahan saat mendapatkan lokasi.';
                    }
                    alert(message);
                }
            );
        }
    </script>
    
    
    
</body>
</html>
