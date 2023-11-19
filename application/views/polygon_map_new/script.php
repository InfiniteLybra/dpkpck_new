<script src="https://unpkg.com/leaflet@latest/dist/leaflet.js"></script>
<script src="assets/js/Control.FullScreen.js"></script>


<script src="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.js"></script>

<!-- <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script> -->

<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script src="assets/js/catiline.js"></script>
<script src="assets/js/leaflet.shpfile.js"></script>
<script>
    var boundary = L.polygon([
        [-8.476526, 112.975311],
        [-7.923313, 112.947845],
        [-7.756714, 112.587792],
        [-7.752253, 112.285789],
        [-8.443661, 112.321731]
    ], {
        color: 'white',
        opacity: 0.0,
        fillColor: 'white',
        fillOpacity: 0.0
    });
    // var map = L.map('map').setView([51.505, -0.09], 13);
    var map = L.map('map', {
        tap: false, // ref https://github.com/Leaflet/Leaflet/issues/7255
        center: new L.LatLng(-8.133063, 112.568680),
        zoom: 15,
        minZoom: 13, // Set zoom level minimum
        maxZoom: 19, // Set zoom level maximum
        maxBounds: boundary.getBounds(),
        fullscreenControl: true,
        fullscreenControlOptions: { // optional
            title: "Show me the fullscreen !",
            titleCancel: "Exit fullscreen mode"
        }
    });

    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        maxZoom: 19,
    }).addTo(map);

    // map.locate({
    //     setView: true,
    //     maxZoom: 22
    // });

    L.control.scale({
        imperial: true,
        metric: true,
        position: 'bottomright'
    }).addTo(map);

    // google street
    googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    googleStreets.addTo(map);

    // google satelite
    googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    googleSat.addTo(map);


    var baseLayers = {
        "Satellite": googleSat,
        "Google Map": googleStreets,
    };


    // map.fullScreen();
    // map.addControl(new L.Control.Fullscreen());
    L.control.layers(baseLayers).addTo(map);

    L.Control.geocoder().addTo(map);

    var polygon = 0;

    function createAreaTooltip(layer) {

        if (layer.areaTooltip) {
            // alert('pp');
            return;
        }

        layer.areaTooltip = L.tooltip({
            permanent: true,
            direction: 'center',
            className: 'area-tooltip'
        });

        layer.on('remove', function(event) {
            layer.areaTooltip.remove();
            // alert('hapus');
            polygon--;
            // alert('remove');
        });

        layer.on('add', function(event) {
            polygon++;
            // alert('created');
            updateAreaTooltip(layer);
            layer.areaTooltip.addTo(map);
            // alert('add');
        });

        if (map.hasLayer(layer)) {
            updateAreaTooltip(layer);
            layer.areaTooltip.addTo(map);
            // alert('??');
        }
    }

    function updateAreaTooltip(layer) {
        var area = L.GeometryUtil.geodesicArea(layer.getLatLngs()[0]);
        var readableArea = L.GeometryUtil.readableArea(area, true);
        var latlng = layer.getCenter();

        let text = layer.getLatLngs().toString();
        let textTanpaLatLng = text.replace(/LatLng\(/g, '');

        let newString = textTanpaLatLng.replace(/\)/g, '<br>');

        layer.areaTooltip
            .setContent(readableArea)
            .setLatLng(latlng);
    }


    function calculateAngle(coordinates, index) {
        const p1 = coordinates[index];
        const p2 = coordinates[(index + 1) % coordinates.length];
        const p3 = coordinates[(index + 2) % coordinates.length];

        const angle = getAngleBetweenThreePoints(p1, p2, p3);
        return angle;
    }

    function getAngleBetweenThreePoints(p1, p2, p3) {
        const bearing1 = getBearing(p1, p2);
        const bearing2 = getBearing(p2, p3);

        let angle = bearing2 - bearing1;
        if (angle < 0) {
            angle += 360;
        }

        return angle;
    }

    function getBearing(p1, p2) {
        const lon1 = p1.lng;
        const lat1 = toRadians(p1.lat);
        const lon2 = p2.lng;
        const lat2 = toRadians(p2.lat);

        const y = Math.sin(lon2 - lon1) * Math.cos(lat2);
        const x = Math.cos(lat1) * Math.sin(lat2) - Math.sin(lat1) * Math.cos(lat2) * Math.cos(lon2 - lon1);
        const bearing = Math.atan2(y, x);

        return toDegrees(bearing);
    }

    function toRadians(degrees) {
        return degrees * (Math.PI / 180);
    }

    function toDegrees(radians) {
        return radians * (180 / Math.PI);
    }


    /**
     * SIMPLE EXAMPLE
     */


    // createAreaTooltip(polygon);

    /**
     * EXAMPLE WITH LEAFLET DRAW CONTROL
     */
    var drawnItems = L.featureGroup().addTo(map);

    map.addControl(new L.Control.Draw({
        edit: {
            featureGroup: drawnItems,
            poly: {
                allowIntersection: false
            }
        },
        draw: {
            marker: false,
            circle: false,
            circlemarker: false,
            rectangle: false,
            polyline: false,
            polygon: {
                allowIntersection: true,
                showArea: true
            }
        }
    }));

    map.on(L.Draw.Event.CREATED, function(event) {

        var layer = event.layer;

        if (layer instanceof L.Polygon) {
            createAreaTooltip(layer);
        }
        drawnItems.addLayer(layer);

        if (layer instanceof L.Polygon) {
            var coordinates = layer.getLatLngs()[0];

            // Fungsi untuk mengonversi desimal ke DMS
            function decimalToDMS(decimal, isLongitude) {
                const degrees = Math.floor(Math.abs(decimal));
                const minutes = Math.floor((Math.abs(decimal) - degrees) * 60);
                const seconds = (Math.abs(decimal) - degrees - minutes / 60) * 3600;
                const direction = isLongitude ? (decimal > 0 ? "E" : "W") : (decimal > 0 ? "N" : "S");
                return `${degrees}° ${minutes}' ${seconds.toFixed(2)}" ${direction}`;
            }

            // Mengonversi koordinat ke format DMS dan menambahkannya sebagai popup
            coordinates.forEach(function(coord, index) {
                var dmsLat = decimalToDMS(coord.lat, false);
                var dmsLng = decimalToDMS(coord.lng, true);
                var popupContent = "Koordinat Titik " + index + ": " + dmsLat + ", " + dmsLng;
                L.marker(coord).bindPopup(popupContent).addTo(map);
            });
        }

    });


    map.on(L.Draw.Event.EDITED, function(event) {
        event.layers.getLayers().forEach(function(layer) {
            if (layer instanceof L.Polygon) {
                updateAreaTooltip(layer);
            }
            // alert('updated');
        })
    });

    // Ambil tombol dan div konten dengan ID
    const reloadButton = document.getElementById('reloadButton');

    // Fungsi yang akan dijalankan saat tombol diklik
    function handleClick() {
        // alert(polygon);
    }

    // Tambahkan event listener untuk mengaktifkan fungsi saat tombol diklik
    reloadButton.addEventListener('click', handleClick);

    document.getElementById('export').addEventListener('click', function() {
       
            var geojson = drawnItems.toGeoJSON();
            var geojsonStr = JSON.stringify(geojson);
            // console.log(geojsonStr);

            // Kirim GeoJSON ke server untuk disimpan sebagai file
            $.post(<?= json_encode(base_url('Map/save_polygon')); ?>, {
                    geojson_data: geojsonStr
                }, function(data) {
                    // Pastikan respons adalah JSON yang valid
                    if (typeof data === 'object') {
                        var shpUrl = data.shp_url;
                        // alert("Polygon telah disimpan. Unduh SHP di: " + shpUrl);

                    } else {
                        console.error("Respons bukan JSON yang valid: ", data);
                    }
                }, "json")
                .fail(function(jqXHR, textStatus, errorThrown) {
                    console.error("Kesalahan: " + textStatus, errorThrown);
                });
            window.location.href = '<?= base_url('Map/polygon_new'); ?>';
            // // Di sini, Anda mengambil tautan ke file ZIP dari session userdata
            // var zipUrl = '<?= base_url() ?>' + '<?php echo $this->session->userdata('converted_file_path'); ?>';

            // // Menginisiasi pengunduhan otomatis
            // var a = document.createElement('a');
            // a.href = zipUrl;
            // a.download = 'map.zip'; // Nama file yang akan diunduh
            // a.style.display = 'none';
            // document.body.appendChild(a);
            // a.click();
            // document.body.removeChild(a);

        }
    
    );

    function exportGeoJSON() {
        var geoJSONData = drawnItems.toGeoJSON();
        var geoJSONStr = JSON.stringify(geoJSONData, null, 2);

        var blob = new Blob([geoJSONStr], {
            type: 'application/json'
        });
        var url = URL.createObjectURL(blob);

        var a = document.createElement('a');
        a.href = url;
        a.download = 'map.geojson';
        a.click();
    }
</script>