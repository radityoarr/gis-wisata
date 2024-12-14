<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIS Pariwisata Kota Batu</title>
    <!-- Leaflet Core -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Leaflet Search -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-search/3.0.0/leaflet-search.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-search/3.0.0/leaflet-search.min.js"></script>

    <!-- Leaflet Routing Machine -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <style>
        .hero-section {
            background-image: url('/images/landing.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
        }
    
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1; 
        }
    
        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
        }
        .hero-content h1 {
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7); 
        }

        .hero-content p {
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
        }
    
        nav {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        nav.scrolled {
            background-color: #2563eb; 
            color: white; 
        }
        #map-section {
            height: 480px; 
            width: 90%;   
            max-width: 1200px; 
            margin: 0 auto; 
            position: relative; 
            z-index: 1; 
        }
        .leaflet-control-search .search-button::before {
            content: '\f002'; 
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            font-size: 16px;
            color: black;
            position: relative; 
            top: 3px;
            left: 2px;
        }
        .leaflet-control-search .search-button {
            background: none;
            border: none;
            padding-left: 4px; 
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
    <nav class="bg-grey-400 text-white py-4 fixed top-0 left-0 w-full shadow-md z-10">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-xl font-bold">Wisata Batu</a>
            <ul class="flex space-x-4">
                <li><a href="/" class="hover:underline">Home</a></li>
                <li><a href="/data-wisata" class="hover:underline">Data Wisata</a></li>
            </ul>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <header class="hero-section text-white h-screen flex flex-col justify-center items-center">
        <div class="hero-content">
            <h1 class="text-4xl font-bold mb-4">Sistem Informasi Geografis Pariwisata</h1>
            <p class="text-lg mb-6">Temukan berbagai destinasi wisata menarik di Kota Batu</p>
            <a href="#map" class="mt-8 px-6 py-3 bg-gray-100 text-slate-600 font-semibold rounded-lg shadow-lg hover:bg-gray-200">Lihat Peta</a>
        </div>
    </header>
    

    <!-- Map Section -->
    <section id="map" class="pt-12 px-6">
        <h2 class="text-3xl font-bold text-center mb-6 mt-6">Peta Wisata Kota Batu</h2>
        <div id="map-section" class="map-section"></div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white py-4 mt-48">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Wisata Batu. All rights reserved.</p>
        </div>
    </footer>

    <script>
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) { 
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled'); 
            }
        });
        // Initialize the map
        var map = L.map('map-section').setView([-7.840100, 112.523903], 12);

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href=\"https://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Create a LayerGroup for markers
        var markersLayer = new L.LayerGroup();
        map.addLayer(markersLayer);

        // Define a routing control (will be added dynamically later)
        let routingControl = null;

        // Fetch and display locations from API
        fetch('/api/locations')
            .then(response => response.json())
            .then(locations => {
                locations.forEach(location => {
                    var marker = L.marker([location.latitude, location.longitude]).addTo(map);

                    let thumbnail = location.thumbnail ? `<img src="${location.thumbnail}" alt="${location.nama}" style="width:100px;height:auto;margin-right:10px;">` : '';

                    marker.bindPopup(`
                        <div style="display: flex; align-items: center;">
                            ${thumbnail}
                            <div>
                                <strong>${location.nama}</strong><br>
                                ${location.alamat || 'Tidak ada deskripsi.'}<br>
                                <a href="/detail-wisata/${location.id}" target="_blank">Lihat Detail</a><br>
                                <button class="btn-rute bg-blue-500 text-white px-4 py-2 rounded mt-2 hover:bg-blue-700" 
                                onclick="showRoute(${location.latitude}, ${location.longitude})">Preview Rute</button>
                            </div>
                        </div>
                    `);
                    markersLayer.addLayer(marker);
                    // marker.bindTooltip(location.nama);
                    marker.options.title = location.nama;
                });
                
                var searchControl = new L.Control.Search({
                    layer: markersLayer, 
                    initial: false,   
                    propertyName: 'title',   
                    zoom: 15,  
                    marker: false,                  
                    moveToLocation: function(latlng, title, map) {
                        map.setView(latlng, 16);  
                    }
                });
                map.addControl(searchControl);
            })
            .catch(error => console.error('Error loading locations:', error));

        function showRoute(lat, lng) {
            if (routingControl) {
                map.removeControl(routingControl); 
            }

            navigator.geolocation.getCurrentPosition(
                position => {
                    const userLat = position.coords.latitude;
                    const userLng = position.coords.longitude;

                    // Add routing control
                    routingControl = L.Routing.control({
                        waypoints: [
                            L.latLng(userLat, userLng), 
                            L.latLng(lat, lng)    
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
                    // Add event listener for segment selection
                    routingControl.on('routesfound', function (e) {
                        const routes = e.routes;

                        routingControl.on('routeselected', function (event) {
                            const selectedRoute = event.route;

                            const firstSegment = selectedRoute.coordinates[0];
                            map.setView([firstSegment.lat, firstSegment.lng], 16); 
                        });
                    });
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
