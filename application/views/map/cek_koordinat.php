<!DOCTYPE html>
<html>

<head>
    <title>Map with Coordinates Input</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
        }
    </style>
</head>

<body>
    <div id="map"></div>
    <button onclick="clearInputs()">Hapus Semua Input Koordinat</button>
    <div id="list_input"></div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([0, 0], 2);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        var coordinatesList = document.getElementById('list_input');
        var marker;
        noIdInput = 1;

        map.on('click', function(e) {
            var lat = e.latlng.lat.toFixed(6);
            var lng = e.latlng.lng.toFixed(6);

            var inputFields = `
                <div>
                    <label>Latitude:</label>
                    <input type="text" value="${lat}" readonly name="lat_${noIdInput}">
                    <label>Longitude:</label>
                    <input type="text" value="${lng}" readonly name="lng_${noIdInput}">
                </div>
            `;

            coordinatesList.insertAdjacentHTML('beforeend', inputFields);

            if (marker) {
                map.removeLayer(marker);
            }

            marker = L.marker(e.latlng).addTo(map);
            noIdInput++;
        });

        function clearInputs() {
            coordinatesList.innerHTML = '';
            noIdInput = 1;
        }
    </script>
</body>

</html>