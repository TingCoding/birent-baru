<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Tracker</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 280px;
            background: linear-gradient(135deg, #c53030, #e53e3e);
            color: white;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }

        .header {
            padding: 20px;
            background: rgba(0,0,0,0.2);
        }

        .back-button {
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .back-button a {
            text-decoration: none;
            color: white;
            font-size: 30px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .search-bar {
            width: 100%;
            padding: 12px 15px;
            border: none;
            border-radius: 25px;
            background: rgba(0,0,0,0.3);
            color: white;
            font-size: 14px;
        }

        .search-bar::placeholder {
            color: rgba(255,255,255,0.7);
        }

        .vehicle-list {
            padding: 0 15px 20px;
        }

        .vehicle-card {
            background: white;
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 15px;
            color: #333;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.2s ease;
        }

        .vehicle-card:hover {
            transform: translateY(-2px);
        }

        .vehicle-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .vehicle-name {
            font-weight: bold;
            font-size: 16px;
        }

        .vehicle-status {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #48bb78;
        }

        .vehicle-image {
            width: 100%;
            height: 80px;
            object-fit: contain;
            margin: 10px 0;
            background: #f7fafc;
            border-radius: 8px;
        }

        .vehicle-info {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #666;
            margin-bottom: 10px;
        }

        .tracking-button {
            width: 100%;
            padding: 8px;
            background: #742a2a;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 12px;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .tracking-button:hover {
            background: #553c9a;
        }

        .map-container {
            flex: 1;
            position: relative;
        }

        #map {
            width: 100%;
            height: 100%;
        }

        .custom-marker {
            background: #e53e3e;
            color: white;
            border: 3px solid white;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .location-popup {
            font-weight: bold;
            text-align: center;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: absolute;
                z-index: 1000;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .menu-toggle {
                position: absolute;
                top: 20px;
                left: 20px;
                z-index: 1001;
                background: #e53e3e;
                color: white;
                border: none;
                padding: 10px;
                border-radius: 5px;
                cursor: pointer;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
        
        <div class="sidebar" id="sidebar">
            <div class="header">
                <button class="back-button" onclick="goBack()"><a href="/view-all-cars">←</a></button>
                <div class="title">E-TRACKER</div>
                <input type="text" class="search-bar" placeholder="Search vehicle ID" id="searchInput">
            </div>

            <div class="vehicle-list">
                <div class="vehicle-card" onclick="selectVehicle('avanza')">
                    <div class="vehicle-header">
                        <span class="vehicle-name">Toyota Avanza</span>
                        <div class="vehicle-status"></div>
                    </div>
                    <img src='images/Toyota avanza gray.jpeg' alt="Toyota Avanza" class="vehicle-image">
                    <div class="vehicle-info">
                        <span>Vehicle ID: B 1910 OCT</span>
                        <span>Online</span>
                    </div>
                    <button class="tracking-button">Tracking</button>
                </div>

                <div class="vehicle-card" onclick="selectVehicle('hiace')">
                    <div class="vehicle-header">
                        <span class="vehicle-name">Toyota HIACE</span>
                        <div class="vehicle-status"></div>
                    </div>
                    <img src='images/Toyota hiace.jpeg' alt="Toyota Avanza" class="vehicle-image">
                    <div class="vehicle-info">
                        <span>Vehicle ID: D 1876 DU</span>
                        <span>Online</span>
                    </div>
                    <button class="tracking-button">Tracking</button>
                </div>

                <div class="vehicle-card" onclick="selectVehicle('civic')">
                    <div class="vehicle-header">
                        <span class="vehicle-name">Honda Civic</span>
                        <div class="vehicle-status"></div>
                    </div>
                    <img src='images/honda civic gray.jpeg' alt="Toyota Avanza" class="vehicle-image">
                    <div class="vehicle-info">
                        <span>Vehicle ID: B 2428 BW</span>
                        <span>Online</span>
                    </div>
                    <button class="tracking-button">Tracking</button>
                </div>
            </div>
        </div>

        <div class="map-container">
            <div id="map"></div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Initialize map centered on Jakarta
        const map = L.map('map').setView([-6.2088, 106.8456], 13);

        // Add tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Vehicle locations data
        const vehicleLocations = {
            avanza: {
                lat: -6.1951,
                lng: 106.8265,
                name: 'Toyota Avanza',
                id: 'B 1910 OCT',
                location: 'AZKO Permata Hijau'
            },
            hiace: {
                lat: -6.2297,
                lng: 106.8235,
                name: 'Toyota HIACE',
                id: 'D 1876 DU',
                location: 'AZKO Gandaria City'
            },
            civic: {
                lat: -6.2146,
                lng: 106.8451,
                name: 'Honda Civic',
                id: 'B 2428 BW',
                location: 'Pasar Mayestik'
            }
        };

        // Add markers for all vehicles
        const markers = {};
        Object.keys(vehicleLocations).forEach(vehicleKey => {
            const vehicle = vehicleLocations[vehicleKey];
            
            // Create custom marker
            const customIcon = L.divIcon({
                className: 'custom-marker',
                html: 'V',
                iconSize: [30, 30],
                iconAnchor: [15, 15]
            });

            const marker = L.marker([vehicle.lat, vehicle.lng], { icon: customIcon })
                .addTo(map)
                .bindPopup(`
                    <div class="location-popup">
                        <strong>${vehicle.name}</strong><br>
                        ${vehicle.id}<br>
                        📍 ${vehicle.location}
                    </div>
                `);
            
            markers[vehicleKey] = marker;
        });

        // Add some landmark markers
        const landmarks = [
            { name: 'Senayan Park', lat: -6.2114, lng: 106.8034 },
            { name: 'GBK Arena', lat: -6.2182, lng: 106.8025 },
            { name: 'Pacific Place Mall', lat: -6.2001, lng: 106.8203 },
            { name: 'Fumo Chicken Joint Melawai', lat: -6.2425, lng: 106.8089 }
        ];

        landmarks.forEach(landmark => {
            const landmarkIcon = L.divIcon({
                className: 'custom-marker',
                html: '📍',
                iconSize: [25, 25],
                iconAnchor: [12, 12]
            });

            L.marker([landmark.lat, landmark.lng], { icon: landmarkIcon })
                .addTo(map)
                .bindPopup(`<strong>${landmark.name}</strong>`);
        });

        // Vehicle selection function
        function selectVehicle(vehicleKey) {
            const vehicle = vehicleLocations[vehicleKey];
            if (vehicle) {
                map.setView([vehicle.lat, vehicle.lng], 16);
                markers[vehicleKey].openPopup();
            }
        }

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const vehicleCards = document.querySelectorAll('.vehicle-card');
            
            vehicleCards.forEach(card => {
                const vehicleName = card.querySelector('.vehicle-name').textContent.toLowerCase();
                const vehicleId = card.querySelector('.vehicle-info span').textContent.toLowerCase();
                
                if (vehicleName.includes(searchTerm) || vehicleId.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Mobile menu toggle
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
        }

        // Back button function
        function goBack() {
            // You can implement navigation logic here
            console.log('Going back...');
        }

        // Close sidebar when clicking on map (mobile)
        map.on('click', function() {
            if (window.innerWidth <= 768) {
                document.getElementById('sidebar').classList.remove('open');
            }
        });
    </script>
</body>
</html>